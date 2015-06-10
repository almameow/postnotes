<html>
<head>
	<title>Post Notes</title>
	<!-- Skeleton CSS -->
	<link rel="stylesheet" type="text/css" href="/../assets/normalize.css">
	<link rel="stylesheet" type="text/css" href="/../assets/skeleton.css">
	<!-- Non-Skeleton CSS -->
	<link rel="stylesheet" href="/../assets/style.css">
	<!-- Icons -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="/../assets/favicon.ico" type="image/x-icon" />
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		$(document).ready(function(){
			var count = -1;
			var paletteArray = ["(153,182,160)", "(54,136,121)", "(42,117,149)", "(130,131,115)", "(81,65,89)"];

			// All notes loaded when form is submitted
			$(document).on("submit", "form", function(){ 
				var randomNum = Math.floor(Math.random() * 5);
				var randomColor = "rgb" + paletteArray[randomNum];

				$("#randomColor").val(randomColor);

				$.post($(this).attr('action'), $(this).serialize(), function(res){
					$("#textarea").val("");
					$("#notes").html(res);
				});
			return false;
			});

			// Force submit form on load
			$('form').submit();
			
		});
	</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="nine columns">
			<div id="notes">
			</div>
		</div>

		<div class="three columns">
			<h1>Post a note:</h1>
			<form action="/posts/add_note" method="post">
				<label>
					<input type="text" name="description" id="textarea" class="u-full-width" maxlength="200">
					<input type="hidden" name="color" id="randomColor">
				</label>
				<p><small>*200 character limit</small></p>
				<input class="button-primary" type="submit" value="Go">
			</form>
		</div>
	</div>
</div>
</body>
</html>