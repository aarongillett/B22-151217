<?php get_header( 'single' ); ?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<?php
if (has_post_thumbnail( $post->ID ) ){
	$feat_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$feat_img_src = $feat_img[0];
}else{
	$feat_img_src = "http://placehold.it/1024x768/";
}
?>


<!-- Set featured image as background -->


<div class="header">
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="single-cover" style="background-image: url('<?php echo $image[0]; ?>')"></div>
	<?php endif; ?>
</div>


<div id="page_wrap" class="container single_page">

	<div class="row">

		<div class="col-xs-12">

			<div class="single-title"><h2 class="page-title"><?php echo get_the_title(); ?></h2></div>

			<!--<p class="meta"><span class="date"><?php echo get_the_date(); ?></span></p>-->

		</div>

		<div class="col-sm-6 project_specifications">

			<?php the_field('project_specifications'); ?>

			<?php
		//	$args = array(
		//	    //default to current post
		//	    'post' => 0,
		//	    'before' => '<ul>',
		//	    //this is the default
		//	    'sep' => ' ',
		//	    'after' => '</ul>',
		//	    //this is the default
		//	    'template' => '<li>%s: %l.</li>'
		//	);
		//	the_taxonomies( $args );
			?>


		</div>

		<div class="col-sm-6">

			<?php /* echo '
				<!--
				<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h2>
				<div class="postMetaTop">
				<span class="autor">Scritto da  <strong><?php the_author(); ?></strong> </span>
				<span class="date">il <?php the_time('j F Y') ?></span> in
				<span class="category"> <?php the_category(', '); ?></span>
				</div>
				<div class="entry">
				  <?php the_content('[leggi tutto]'); ?>
				</div>
				<br class="clear" />
				<div class="postMeta">
				<span class="tag">TAG: <?php the_tags(' ',', '); ?></span>
				<span class="comments"> <?php comments_popup_link('0 commenti', '1 commento', '% commenti'); ?></span>
				</div>
				-->'; */ ?>

				<article class="post single single-post">

					<!-- ADD THIS SHARE BUTTONS
					<div class="addthis">
					    <div class="addthis_toolbox addthis_default_style ">
					    <p id="condividi_article_bt">condividi »</p>
					    <a class="addthis_button_facebook at00b" title="Facebook" href="#"><span class="at16nc at300bs at15nc at15t_facebook at32t_facebook">

					    		<span class="el-icon-facebook"></span>
							</span>
						</a>
					    <a class="addthis_button_twitter at300b" title="Tweet" href="#"><span class="at16nc at300bs at15nc at15t_twitter at16t_twitter">

					    	<span class="el-icon-twitter"></span>
					    </span></a>
					    <a class="addthis_button_email at300b" title="Email" href="#"><span class="at16nc at300bs at15nc at15t_email at16t_email">
					    	<span class="el-icon-envelope"></span>
					    </span></a>
					    <a class="addthis_button_google_plusone" g:plusone:count="false"></a>
					    </div>
					    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=aiutareibambini"></script>
					</div>
					-->
			        <div class="entry">
			        	<?php the_content(); ?>
			    	</div>

				</article>

		</div>

		<div class="col-xs-12 post_attached_images">

		<?php
				$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post->ID,
					'exclude'     => get_post_thumbnail_id()
				) );

				if ( $attachments ) {
					echo "<ul>";
					foreach ( $attachments as $attachment ) {
						$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
						$thumbimg = wp_get_attachment_image_src( $attachment->ID, 'original', true );
						echo '<li class="' . $class . ' data-design-thumbnail"><img class="responsive" src="' . $thumbimg[0] . '" /></li>';
					}
					echo "</ul>";

				}

		?>

		</div>

	</div>

</div><!-- /.container -->

<?php endwhile; ?>

<?php else : ?>

<h2>There are no posts. Go to the <a href="http://www.B22.it">index</a>.</h2>

<?php endif; ?>

<br class="clear" />

<?php get_footer(); ?>