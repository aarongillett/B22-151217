<?php
/*
Template Name: Archivio
*/
?>

<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 main-content home-posts posts">

		<?php if (have_posts()) : ?>

	 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	 	  <?php /* If this is a category archive */ if (is_category()) { ?>
			<h2 class="page-title">Archivio per la categoria <?php single_cat_title(); ?></h2>
	 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2 class="page-title">Post taggati <?php single_tag_title(); ?></h2>
	 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="page-title">Archivio di <?php the_time('j F Y'); ?></h2>
	 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="page-title">Archivio di <?php the_time('F, Y'); ?></h2>
	 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="page-title">Archivio di <?php the_time('Y'); ?></h2>
		  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="page-title">Archivio autori</h2>
	 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="page-title">Archivi del blog</h2>
	 	  <?php } ?>

			<?php if (have_posts()) : ?>
			<?php $i=1; ?>
			<?php while (have_posts()) : the_post(); ?>

				<article class="post">

					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
					<a href="<?php echo get_the_permalink(); ?>" class="custom-bg" style=" background-image: url('<?php echo $image[0]; ?>')"></a>
					<?php endif; ?>

					<h1><?php echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>' ?></h1>
			        <p class="meta"><span class="date"><?php echo get_the_date(); ?></span> di

			        <?php

						global $cpt_onomy;
						$terms = wp_get_object_terms( $post->ID, 'autori' );
						if ( $terms && !is_wp_error( $terms ) ) {
						   foreach ( $terms as $term ) {
						//	echo '<a href="' . $cpt_onomy->get_term_link( $term, $term->taxonomy ) . '">' . $term->name . '</a> ';
							echo '<a href="/autori/' . $term->slug . '/">' . $term->name . '</a> ';
						   }
						}

					?>

					</p>
			        <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
			        <p class="more"><a href="<?php echo get_the_permalink(); ?>">continua »</a></p>

				</article>

				<?php $i++; ?>
			
			<?php endwhile; ?>
	    
	            <div class="navigation"> 
	                <span class="previous-entries"><?php next_posts_link('precedenti') ?></span>
	                <span class="next-entries"><?php previous_posts_link('successivi') ?></span> 
	            </div>
	    
	        <?php else : ?>
	    
	            <h2>Non ci sono post, spiacente.</h2>
	    
	        <?php endif; ?>
		
		<?php else :

			if ( is_category() ) { // If this is a category archive
				printf("<h2 class='center'>Spiacenti, non ci sono post nella categoria %s.</h2>", single_cat_title('',false));
			} else if ( is_date() ) { // If this is a date archive
				echo("<h2>Spiacenti, non ci sono post per questa data</h2>");
			} else if ( is_author() ) { // If this is a category archive
				$userdata = get_userdatabylogin(get_query_var('author_name'));
				printf("<h2 class='center'>Spiacenti, non ci sono ancora post di %s.</h2>", $userdata->display_name);
			} else {
				echo("<h2 class='center'>Nessun post trovato.</h2>");
			}
			get_search_form();

		endif;
		?>

		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<!-- sidebar -->
			<?php get_sidebar(); ?>	

		</div>

	</div>

</div><!-- /.container -->

<br class="clear" />

<?php get_footer(); ?>
