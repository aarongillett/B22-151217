<?php
/*
Template Name: Search
*/
?>

<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 posts single">

		<?php

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( isset($_GET['cerca']) && ($_GET['cerca'])!='' ):
			$search = $_GET['cerca'];
			$search_args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				's' => $search,
				'paged' => $paged
			);
			$search_query = new WP_Query( $search_args);
		//	$wp_query->posts = $search_query;
		//	$wp_query->post_count = count( $wp_query->posts );


		?>

		<h2 class="page-title search">Risultati di ricerca per: <span><?php echo $search; ?></span></h2>

		<?php if( $search_query->have_posts() ): ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		
		<?php while( $search_query->have_posts() ): $search_query->the_post(); ?>
			
		<article class="post">

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
			<div class="custom-bg" style=" background-image: url('<?php echo $image[0]; ?>')"></div>
			<?php endif; ?>

			<h1><?php echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>' ?></h1>
	        <p class="meta"><span class="date"><?php echo get_the_date(); ?></span> di

	        <?php
				global $cpt_onomy;
				$terms = wp_get_object_terms( $post->ID, 'autori' );
				if ( $terms && !is_wp_error( $terms ) ) {
				   foreach ( $terms as $term ) {
				      echo '<a href="' . $cpt_onomy->get_term_link( $term, $term->taxonomy ) . '">' . $term->name . '</a> ';
				   }
				}

			?>

			</p>
	        <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
	        <p class="more"><a href="<?php echo get_the_permalink(); ?>">continua »</a></p>

		</article>

		<?php endwhile; ?>

		<div class="navigation"> 
		<span class="previous-entries"><?php next_posts_link('precedenti') ?></span>
		<span class="next-entries"><?php previous_posts_link('successivi') ?></span> 
		</div>

		<?php else : ?>

		    <h2>Non ci sono post, spiacente.</h2>

		<?php endif; ?>

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
