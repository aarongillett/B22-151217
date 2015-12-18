<?php
/*
Template Name: generic page template
*/
?>

<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
<div class="single-header" style=" background-image: url('<?php echo $image[0]; ?>')"></div>
<?php endif; ?>

<div class="container">

	<div class="row">

		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 posts single">

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

				<div class="post">

					<h2 class="page-title"><?php the_title(); ?></h2>

					<div class="entry">
						<?php the_content('leggi tutto'); ?>
					</div>
					
					<br class="clear" />
					
				</div>

				<?php endwhile; ?>

			<?php else : ?>

				<h2>Errore.</h2>
				<p>Spiacenti, ma la pagina che stai cercando non esite</p>

			<?php endif; ?>

		</div>


		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<!-- sidebar -->
			<?php get_sidebar(); ?>	

		</div>

	</div>

</div><!-- /.container -->

<br class="clear" />

<?php get_footer(); ?>
