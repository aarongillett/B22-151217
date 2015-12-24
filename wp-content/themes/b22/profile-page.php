<?php
/*
Template Name: profile page template
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<!-- Hide featured image

<div class="header">
	<img src="<?php echo $feat_img_src; ?>" class="responsive" />
</div>

-->

<div id="page_wrap" class="container home">

	<div class="row">
		<div id="profile_description">

			<div class="col-md-10 col-md-offset-1"> <!-- 10 column, offset by 1 -->
	        	<div class="h2">
	        		<?php the_content(); ?>
	        	</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6"> <!-- Half-width column -->
			<!-- blank -->
		</div>

		<div class="col-sm-6"> <!-- Half-width column -->
			<?php the_field('profile_details'); ?> <!-- get profile_details text --><?php?>
		</div>
	</div>

</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>

<br class="clear" />

<?php get_footer(); ?>