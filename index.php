<?php  

require_once('models/db.php');

$db = new DataBase;

$cols = [['`username`', "VARCHAR(64)", "NOT NULL"], ["`password`", "VARCHAR(30)", "NOT NULL"], ["`email`", "VARCHAR(30)", "NOT NULL"] , ['`last_project`', "VARCHAR(64)"]];

$db->create_table('users', $cols);

$cols = [
	['`project_name`', 'VARCHAR(64)', "NOT NULL"],
	['content', 'TEXT', 'NOT NULL'],
	['`user_id`', 'INT(6)', 'NOT NULL']
];

$db->create_table('projects', $cols);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Editor</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="controllers/init.js"></script>
	<script src="controllers/hide_tools.js"></script>
	<script src="controllers/input_limit.js"></script>
	<script src="controllers/color_preview.js"></script>
	<script src="controllers/bg_group.js"></script>
	<script src="controllers/settings_btn.js"></script>
	<script src="controllers/container_group.js"></script>
	<script src="controllers/settings_dnd.js"></script>
	<script src="controllers/dnd.js"></script>
	<script src="controllers/hover.js"></script>
	<script src="controllers/save_settings.js"></script>
	<script src="controllers/text_group.js"></script>
	<script src="controllers/show_and_hide_form.js"></script>
	<script src="controllers/show_modal.js"></script>
	<script src="controllers/hide_modal.js"></script>
	<script src="controllers/registration.js"></script>
	<script src="controllers/login.js"></script>
	<script src="controllers/log_out.js"></script>
	<script src="controllers/show_project_menu.js"></script>
	<script src="controllers/rename.js"></script>
</head>
<body>
	<div class="main">
		<input type="hidden" class="cur-email">
		<section class="tools">
			<div class="tools-btn">
				<button class="bg-group tools-group">Background</button>
				<button class="container-group tools-group">Container</button>
				<button class="txt-group tools-group">Text</button>
			</div>
			<div class="settings-field">
				<div class="bg-color settings-item">
					<div class="color-preview">
						<input class="color-picker" type="color">
					</div>
					<div class="alpha-block">
						<input type="number" max="100" min="0" step="1" value="100" class="alpha-input">
					</div>
				</div>
				<div class="text settings-item">
					<div class="text-field">
						<label for="text-area" class="text-label">Text:</label>
						<textarea id="text-area" cols="20" rows="10"></textarea>
					</div>
					<label for="font-size">Size:</label>
					<input disabled type="number" max="999" min="1" value="16" id="font-size"><br/>
					<label for="fsize-box">Custom size:</label>
					<input type="checkbox" id="fsize-box">
					<select class="text-type">
						<option value="header" class="header">Header</option>
						<option value="main-text" class="main-text">Main text</option>
					</select>
					<select class="header-lvl">
						<option value="h1" class="h1">H1</option>
						<option value="h2" class="h2">H2</option>
						<option value="h3" class="h3">H3</option>
						<option value="h4" class="h4">H4</option>
						<option value="h5" class="h5">H5</option>
						<option value="h6" class="h6">H6</option>
					</select>
				</div>
				<div class="buttons-settings">
					<button class="close-settings btn-tools">Close</button>
					<button class="save-settings btn-tools">Save</button>
				</div>
			</div>
			<div class="dnd-field">
				<div class="container-blocks dnd-group">
					<div draggable="true" class="col-1 column dnd-item"></div>
					<div draggable="true" class="col-2 column dnd-item">
						<div class="col-items">
							<div class="col-item"></div>
							<div class="col-item"></div>
						</div>
					</div>
					<div draggable="true" class="col-3 column dnd-item">
						<div class="col-items">
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
						</div>
					</div>
					<div draggable="true" class="col-4 column dnd-item">
						<div class="col-items">
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
						</div>
					</div>
					<div draggable="true" class="col-5 column dnd-item">
						<div class="col-items">
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
						</div>
					</div>
					<div draggable="true" class="col-6 column dnd-item">
						<div class="col-items">
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
							<div class="col-item"></div>
						</div>
					</div>
					<div class="buttons-dnd">
						<button class="close-dnd btn-tools">Close</button>
					</div>
				</div>
				<div class="text-blocks dnd-group">
					<div draggable=true class="text-block dnd-item">
						<h1 class="text-sample">TEXT</h1>
					</div>
				</div>
				<div class="dnd-area"></div>
			</div>
		</section>
		<section class="working-area">
			<div class="container wa-element" id="basic-container">
			</div>
		</section>
		<section class="top-panel">
			<div class="prof-btn-div">
				<button class="log-in prof-btn">Login</button>
				<button class="register prof-btn">Register Now</button>
			</div>
			<div class="projects-field">
				<button class="project-name">Unnamed-project</button>
				<div class="project-props">
					<div class="rename">
						<input type="text" class="rename-input" placeholder="Rename">
						<button class="set-name">Set</button>
					</div>
					<button class="other-projects">Other projects</button>
				</div>
			</div>
			<h1 class="prof-name"></h1>
			<button class="log-out prof-btn">Log out</button>
		</section>
		<div class="modal-window log-in-window">
			<div class="log-in-form">
				<h2>Log in</h2>
				<hr>
				<div class="form-inner">
					<div class="labels">
						<label for="">Email:</label>
						<label for="">Password:</label>
					</div>
					<div class="inputs">
						<input placeholder="Email" type="email" class="log-email">
						<input placeholder="Password" type="password" class="log-password">
					</div>
				</div>
				<hr>
				<div class="buttons">
					<button class="send-data">Send</button>
					<button class="close">Close</button>
				</div>
			</div>
		</div>
		<div class="modal-window register-window">
			<div class="log-in-form">
				<h2>Register</h2>
				<hr>
				<div class="form-inner">
					<div class="labels">
						<label for="">Username:</label>
						<label for="">Email:</label>
						<label for="">Password:</label>
						<label for="">Repeat password:</label>
					</div>
					<div class="inputs">
						<input placeholder="Username" type="text" class="reg-username">
						<input placeholder="Email" type="email" class="reg-email">
						<input placeholder="Password" type="password" class="reg-password">
						<input placeholder="Repeat password" type="password" class="reg-repeat-password">
					</div>
				</div>
				<hr>
				<div class="buttons">
					<button class="send-data">Send</button>
					<button class="close">Close</button>
				</div>
			</div>
		</div>
	</div>
	<button class="hide-tools">Hide tools</button>
	<script src="controllers/main.js"></script>
	<script src="controllers/global_vars.js"></script>
</body>
</html>