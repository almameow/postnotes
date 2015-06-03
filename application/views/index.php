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
			var paletteArray = ["(202,253,249)", "(169,249,255)", "(210,240,255)", "(153,238,236)", "(108,229,255)", "(208,255,242)", "(186,237,238)", "(187,190,242)", "(213,175,253)", "(221,173,242)", , "(255,218,240)", "(253,173,233)", "(255,130,187)", "(251,102,200)", "(251,73,144)", "(246,161,146)", "(246,176,146)", "(246,196,146)", "(246,207,146)", "(246,217,146)"];

			// All notes loaded when form is submitted
			$(document).on("submit", "form", function(){ 
				var randomColor = "";
				if(count < paletteArray.length){
					randomColor = "rgb" + paletteArray[count];
					count++;
				} else{
					count = 0;
					randomColor = "rgb" + paletteArray[count];
					count++;
				}

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
			<h1>Post Notes:</h1>
			<div id="notes">
			</div>
		</div>

		<div class="three columns">
			<form action="/posts/add_note" method="post">
				<label><h3>Add a note:</h3>
					<input type="text" name="description" id="textarea" class="u-full-width">
					<input type="hidden" name="color" id="randomColor">
				</label>
				<input class="button-primary" type="submit" value="Post it!">
			</form>
		</div>
	</div>
</div>
</body>
</html>