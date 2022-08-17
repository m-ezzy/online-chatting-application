<?php
	include 'src/php/server.php';

	if (!isset($_SESSION['user_id'])) {
   		header('location: src/php/authentication.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!--
	<script>
		let cookie = JSON.parse(document.cookie);
		if(cookie.user_id == null) {
	   		header('location: src/php/authentication.php');
		}
	</script>
	-->

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> skyland-php! </title>

	<!--<link rel="icon" href="../../media/images/icon2.ico">-->

	<!--<link type="text/css" rel="stylesheet" href="authentication.css">-->

	<link type="text/css" rel="stylesheet" href="src/css/variables.css">
	<link type="text/css" rel="stylesheet" href="src/css/animations.css">
	<link type="text/css" rel="stylesheet" href="src/css/style.css">

	<link type="text/css" rel="stylesheet" href="src/css/menu_bar.css">
	<link type="text/css" rel="stylesheet" href="src/css/content.css">

	<link type="text/css" rel="stylesheet" href="src/css/calls.css">

	<link type="text/css" rel="stylesheet" href="src/css/common.css">
	<link type="text/css" rel="stylesheet" href="src/css/chats_groups.css">
	<link type="text/css" rel="stylesheet" href="src/css/chats.css">
	<link type="text/css" rel="stylesheet" href="src/css/groups.css">
	<link type="text/css" rel="stylesheet" href="src/css/channels.css">

	<link type="text/css" rel="stylesheet" href="src/css/games.css">

	<link type="text/css" rel="stylesheet" href="src/css/profiles.css">

	<!--<link type="text/css" rel="stylesheet" href="src/css/responsive_design.css">-->

	<script>
		let resources = 1; //change to 1 when you work on localhost or when have your own domain

		console.log(document.cookie);
	</script>
</head>
<body>
	<div class="col-10" id='container'>
		<div class="col-1" id='menu_bar'>
			<!-- all of this can be div tags instead of input button -->
			<!--<button onclick='load_home()' value='home'>-->
			<!--<input type="button" onclick='load_frequent()' value='frequent'>-->

			<div class='col-8 button' onclick='calls.clicked(this)'> calls </div>
			<div class='col-8 button' onclick='chats.clicked(this)'> chats </div>
			<div class='col-8 button' onclick='groups.clicked(this)'> groups </div>
			<div class='col-8 button' onclick='channels.clicked(this)'> channels </div>
			<div class='col-8 button' onclick='games.clicked(this)'> games </div>
			<div class='col-8 button' onclick='profiles.clicked(this)'> profiles </div>

			<div class='col-8 button' id='button_theme' onclick='toggle_theme(this)'> theme </div>
		</div>
		
		<div class='col-9 content' id='calls'></div>
		<div class='col-9 content' id='chats'></div>
		<div class='col-9 content' id='groups'></div>
		<div class='col-9 content' id='channels'></div>
		<div class='col-9 content' id='games'></div>
		<div class='col-9 content' id='profiles'></div>





		<div class='button back' onclick='Content.current.hide_search_results()'> back </div>
		<input type='text' class='col-1 text search' placeholder='type here to search' oninput='Content.current.search()'>
		<div class='button search' onclick='Content.current.search()'> search </div>

		<!--
		<script>
			let media_types = ['images', 'videos', 'audios', 'document', 'location'];

			for (let i = 0 ; i < 5 ; i++) {
				let div = document.createElement("div");
				div.className = 'sending ' + media_types[i];
				document.body.appendChild(s);
				i++;
			}
		</script>
		-->

		<div class='sending'>
			<div class='button close_sending' onclick='close_images()'> + </div>
			<input type='file' name='select_images' class='select_images' accept='.jpg, .jpeg, .png'>
			<div class='button send' onclick='Content.current.send_images()'> send </div>
		</div>

		<div class='sending'>
			<div class='button close_sending' onclick='close_videos()'> + </div>
			<input type='file' name='select_videos' class='select_videos'>
			<div class='button send' onclick='Content.current.send_videos()'> send </div>
		</div>

		<div class='sending'>
			<div class='button close_sending' onclick='close_audios()'> + </div>
			<input type='file' name='select_audios' class='select_audios'>
			<div class='button send' onclick='Content.current.send_audios()'> send </div>
		</div>

		<div class='sending'>
			<div class='button close_sending' onclick='close_documents()'> + </div>
			<input type='file' name='select_documents' class='select_documents'>
			<div class='button send' onclick='Content.current.send_documents()'> send </div>
		</div>

		<div class='sending'>
			<div class='button close_sending' onclick='close_location()'> + </div>
			<input type='file' name='select_location' class='select_location'>
			<div class='button send' onclick='Content.current.send_location()'> send </div>
		</div>

		<div class='col-6 send_new_media'>
			<!--<label for='file'> image </label>-->

			<div class='button images' onclick='Content.current.select_images()'> images </div>
			<div class='button videos' onclick='Content.current.select_videos()'> videos </div>
			<div class='button audios' onclick='Content.current.select_audios()'> audios </div>
			<div class='button documents' onclick='Content.current.select_documents()'> documents </div>
			<div class='button location' onclick='Content.current.select_location()'> location </div>

			<input class='text message' type='text' placeholder='type a new message' value='hola' onfocus='Content.current.add_enter_event()' onblur='Content.current.remove_enter_event()'>
			<div class='button message' onclick='Content.current.send_message()'> send </div>
		</div>



		<div class='ba' id='ba1'></div>
		<div class='ba' id='ba2'></div>
		<div class='ba' id='ba3'></div>
		<div class='ba' id='ba4'></div>
		<div class='ba' id='ba5'></div>
	</div>

	<!--<script>
		function append_js_script_files() {
			let xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					let files = new Array();
					files = JSON.parse(this.responseText);

					console.log(files);

					let i = 0;
					while (i < files.length) {
						if(files[i] == "../js/a.js") {
							i++;
							continue;
						}
						let s = document.createElement("script");
						s.src = files[i];
						document.body.appendChild(s);
						i++;
					}
				}
			};
			xhr.open("GET", "src/php/directory_js.php", true);
			xhr.send();
		}
		append_js_script_files();
	</script>-->

	<script src="src/js/content/class.js"></script>

	<script src="src/js/calls/class.js"></script>

	<script src="src/js/common/class.js"></script>
	<script src="src/js/chats_groups/class.js"></script>
	<script src="src/js/chats/class.js"></script>
	<script src="src/js/groups/class.js"></script>
	<script src="src/js/channels/class.js"></script>

	<script src="src/js/games/class.js"></script>

	<script src="src/js/profiles/class.js"></script>

	<script src="src/js/main.js"></script>
	<script src="src/js/others.js"></script>
	<script src="src/js/privacy.js"></script>

	<!--
	<script src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
	-->
	<script src="libraries/peerjs.min.js"></script>

	<script src="src/js/script_calls.js"></script>
</body>
</html>
