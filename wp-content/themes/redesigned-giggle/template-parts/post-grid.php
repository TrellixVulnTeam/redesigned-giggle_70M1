<?php 

$postsToShow = $postsToShow ? $postsToShow : '';
$postType = $postType ? $postType : '';

$postsPerRow = ($postsToShow < 4 && $postsToShow !== -1) ? $postsToShow : 3;

$posts = get_posts(array(
	'posts_per_page'	=> $postsToShow,
	'post_type'			=> $postType
));

if( $posts ): ?>
	<?php global $post; ?>
	
	<ul class="grid">
		
	<?php foreach( $posts as $post ): 
		
		
		?>
		<li class="col colspan-<?php echo 12 / $postsPerRow; ?>">
            <?php require get_template_directory() . '/template-parts/post-card.php'; ?>
		</li>
	
	<?php endforeach; ?>
	
	</ul>

<?php endif; ?>