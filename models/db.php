<?php 

const DB_CFG = [
	'HOST' => 'localhost',
	'USERNAME' => 'root',
	'PASSWORD' => '',
	'MAIN_DB_NAME' => 'main'
];

class DataBase
{

	function __construct()
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

		$this->con = mysqli_connect(DB_CFG['HOST'], DB_CFG['USERNAME'], DB_CFG['PASSWORD']);

		$sql = "CREATE DATABASE IF NOT EXISTS " . DB_CFG['MAIN_DB_NAME'];

		$res = mysqli_query($this->con, $sql);

		$this->con = mysqli_connect(DB_CFG['HOST'], DB_CFG['USERNAME'], DB_CFG['PASSWORD'], DB_CFG['MAIN_DB_NAME']);
		if (!$this->con) {
			die("Data base connection error: " . mysqli_error($this->con));
		}

	}

	function create_table($table_name, $cols)
	{
		$sql = "CREATE TABLE IF NOT EXISTS {$table_name} (`id` INT(6) NOT NULL AUTO_INCREMENT, ";

		for ($i=0; $i < count($cols) ; $i++) { 
			$sql = $sql . $cols[$i][0] . ' ';
			for ($j = 1; $j < count($cols[$i]); $j++) {
				$sql = $sql . $cols[$i][$j] . ' ';
			}
			$sql = $sql . ", ";
		}

		$sql = $sql . "PRIMARY KEY (`id`))";

		mysqli_query($this->con, $sql);
	}

	function insert_rec($table_name, $data)
	{

		$sql = "INSERT INTO " . $table_name . " (";
		$values = "";

		for ($i=0; $i < count($data); $i++) { 
			$sql = $sql . $data[$i][0] . ',';
			if (gettype($data[$i][1]) == "integer") {
				$values = $values . $data[$i][1] . ',';
			} elseif (gettype($data[$i][1]) == "string") {
				$values = $values . "'" . $data[$i][1] . "',";
			}
		}


		$sql = substr($sql, 0, iconv_strlen($sql) - 1);
		$values = substr($values, 0, iconv_strlen($values) - 1);

		$sql = $sql . ") VALUES (" . $values . ")";

		mysqli_query($this->con, $sql);
		
	}

	function update($from, $values, $where='') {

		$sql = "UPDATE {$from} SET {$values} WHERE {$where}";

		mysqli_query($this->con, $sql);

	}

	function find($from, $cols, $where) {
		$sql = "SELECT {$cols} FROM {$from} WHERE {$where}";
		$res = mysqli_query($this->con, $sql);

		$result_array = [];

		while ($rec = mysqli_fetch_array($res, MYSQLI_NUM)) {
			array_push($result_array, $rec);
		}

		return $result_array;
	}

	function get_table($table_name) {
		$sql = "SELECT * FROM {$table_name}";
		$res = mysqli_query($this->con, $sql);

		$result_array = [];

		while ($res = mysqli_fetch_array($res, MYSQLI_NUM)) {
			array_push($result_array, $rec);
		}

		return $result_array;
	}
}

?>