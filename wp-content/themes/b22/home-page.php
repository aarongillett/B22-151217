<?php
/*
Template Name: home page template
*/
?>

<?php get_header(); ?>


<div id="page_wrap" class="container home">

	<div id="tax_cloud">

<!--	<p><a class="view_all" href="#">All Projects</a></p>
-->



	<p>

	<?php
	$args = array(
	  'public'   => true,
	  '_builtin' => false
	);
	$output = 'objects'; // or names
	$operator = 'and'; // 'and' or 'or'
	$taxonomies = get_taxonomies( $args, $output, $operator );

//	$taxonomies_objects = get_object_taxonomies( 'post', 'objects' );
//	print_r($taxonomies_objects);

//	global $post;
//	$taxonomies_objects_2 = get_object_taxonomies($post, 'objects');
//	print_r($taxonomies_objects_2);
//
	echo '<!-- tax open -->';

	if ( $taxonomies ) {
	  foreach ( $taxonomies  as $single_taxonomy ) {

		$taxonomy_name = $single_taxonomy->labels->name;
		$taxonomy_singular_name = $single_taxonomy->labels->singular_name;

		// print_r($single_taxonomy->labels);
		$taxonomy = $single_taxonomy->rewrite[slug];

	  	echo "\n\n\n\n";
//	    echo '<strong>' . _x($taxonomy_singular_name,'taxonomy general name') . '/' . _x($taxonomy_name,'taxonomy singular name') . '</strong> ';
	    echo '<strong>' . _x($taxonomy_singular_name,'taxonomy general name') . '</strong> ';

		$args = array(
		    'orderby'           => 'name',
		    'order'             => 'ASC',
			'hide_empty'        => true,
		    'exclude'           => array(),
		    'exclude_tree'      => array(),
		    'include'           => array(),
		    'number'            => '',
		    'fields'            => 'all',
		    'slug'              => '',
		    'parent'            => '',
		    'hierarchical'      => true,
		    'child_of'          => 0,
		    'childless'         => false,
		    'get'               => '',
		    'name__like'        => '',
		    'description__like' => '',
		    'pad_counts'        => false,
		    'offset'            => '',
		    'search'            => '',
		    'cache_domain'      => 'core'
		);

		$terms = get_terms($taxonomy, $args);

	//	print_r($terms);

		foreach ($terms as $term) {

			${"arr_" . $term->slug . "_related"}[] = '';

			// get posts by term

			// query
			$posts_in_term = new WP_Query(
				array(
					'post_type' => 'post',
					'tax_query' => array(
						array(
						  'taxonomy' => $term->taxonomy,
						  'field' => 'slug',
						  'terms' => $term->slug
						)
					)
				)
			);

			// loop
			if ( $posts_in_term->have_posts() ) {
				$posts_in_term_count = $posts_in_term->post_count;
				$i = 0;
				while ( $posts_in_term->have_posts() ) {
					$i++;
					$posts_in_term->the_post();

					foreach ($posts_in_term as $post_in_term) {

						// print_r($post_in_term);

						if($post_in_term->ID){

						//	echo "\n\n\n".'post: '.$post_in_term->ID.' '.$post_in_term->post_name.' <br />'."\n\n";

							// get terms for posts

							// get customs taxonomies array
							$global_taxonomies_list = get_taxonomies();
							// remove non custom taxonomies
							unset($global_taxonomies_list[category], $global_taxonomies_list[post_tag], $global_taxonomies_list[nav_menu], $global_taxonomies_list[link_category], $global_taxonomies_list[post_format]);
							// var_dump($global_taxonomies_list);
						//	print_r($global_taxonomies_list);

							// list vales for this post
						//	echo "\n".'list values for this post: ';
							foreach ($global_taxonomies_list as $global_taxonomy) {
								$values_list = wp_get_post_terms($post_in_term->ID, $global_taxonomy, array('fields' => 'all'));
								foreach($values_list as $value) {
								//	echo("\n\n\n".$value->slug."\n\n");
						//		//	echo '<br />- '.$global_taxonomy.': '.$value->name; //do something here
									array_push(${"arr_" . $term->slug . "_related"}, $value->slug);
								}
							}

						}
					}
				}
			} else {
				// no posts found
			}
			// reset
			wp_reset_postdata();

			unset(${"arr_" . $term->slug . "_related"}[0]);
			${"arr_" . $term->slug . "_related"} = array_unique(${"arr_" . $term->slug . "_related"});

			if(!get_field('taxonomy_term_hidden',$taxonomy.'_'.$term->term_id)){

				echo '<a id="'.$term->slug.'" href="'.get_bloginfo('url').'/'.$term->taxonomy.'/'.$term->slug.'/" class="tax_term ';
				foreach (${"arr_" . $term->slug . "_related"} as $the_term) {
					echo ' '.$the_term.' ';
				}
				echo '">';
				echo $term->name.'<span class="tax_term_count">'.$term->count.'</span></a> ';

			}

			unset(${"arr_" . $term->slug . "_related"});

		}

		?>
		<!-- close .single_tax -->
	<?php
	  }

	}
	?>

	</p>
	</div><!-- close #tax_cloud -->



	<?php

	// query
	$posts_query = new WP_Query(
		array(
			'post_type' => 'post',
		)
	);

	// loop
	if ( $posts_query->have_posts() ) { ?>

	<div id="home-posts">

		<?php
			$posts_query_count = $posts_query->post_count;
			$i = 0;
			while ( $posts_query->have_posts() ) {
				$i++;
				$posts_query->the_post();

				if (has_post_thumbnail( $post->ID ) ){
					$feat_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
					$feat_img_src = $feat_img[0];
				}else{
					$feat_img_src = "http://placehold.it/1024x768/";
				}

			?>
			<article class="home-post col-sm-6 <?php echo custom_taxonomies_terms_links(); ?>">
				<a href="<?php echo get_the_permalink(); ?>">
					<img src="<?php echo $feat_img_src; ?>" class="responsive" />
				</a>
				<h1>
					<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
				</h1>
				<!--<h2><?php echo get_the_excerpt(); ?></h2>-->
			</article>

			<?php
			}
			echo '<!-- end list items -->';
		} else {
			// no posts found
		}

		// reset
		wp_reset_postdata();
		?>

	</div> <!-- / #home-posts -->

</div>


<?php get_footer(); ?>
