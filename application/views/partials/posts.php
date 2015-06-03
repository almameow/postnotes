<?php  
	foreach($posts as $post)
	{
?>
	<div class="post">
		<a href="/posts/delete_note/<?= $post['id'] ?>">
		<?= $post['description'] ?>
		</a>
	</div>
<?php
	}
?>