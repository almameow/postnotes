<html>
<head>
	<title>Ajax Posts</title>
	<!-- Skeleton CSS -->
	<link rel="stylesheet" type="text/css" href="/../assets/normalize.css">
	<link rel="stylesheet" type="text/css" href="/../assets/skeleton.css">
	<!-- Non-Skeleton CSS -->
	<link rel="stylesheet" href="/../assets/style.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		$(document).ready(function(){
			//pull all posts
			$.get('/posts/index_html', function(res){
				$('#notes').html(res);
			});
			//when user clicks button, add note
			$('form').submit(function(){
				$.post('/posts/add_note', $(this).serialize(), function(res){
					$('#notes').html(res);
				});
				return false;
			});
		});
	</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="nine columns">
			<h1>My Posts:</h1>
			<div id="notes">
			</div>
		</div>

		<div class="three columns">
			<form action="/posts/add_note" method="post">
				<label><h2>Add a note:</h2>
					<input type="text" name="description" id="textarea" class="u-full-width">
				</label>
				<input class="button-primary" type="submit" value="Post it!">
			</form>
		</div>
	</div>
</div>
</body>
</html>