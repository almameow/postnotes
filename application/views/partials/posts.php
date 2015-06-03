<?php  
	foreach($posts as $post)
	{
?>
	<div class="post" style="background-color:<?= $post['color'] ?>">
		<div class="row">
			<div class="two columns offset-by-ten columns">
				<form class="delete_note" action="/posts/delete_note/<?= $post['id'] ?>" method="post">
					<button class="deleteBtn" type="submit"><span class="fa fa-times fa-lg"></span></button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="twelve columns">
				<?= $post['description'] ?>
			</div>
		</div>
	</div>
<?php
	}
?>