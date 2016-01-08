<?php
/*
Template Name: cover page template
*/
?>

<?php get_header( 'cover' ); ?>

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>


<!-- get page content -->

<div class="cover_nav">
	<div id="page_wrap" class="container home">
		<div class="row">
			<div class="col-md-10">
				<div class="intro">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="language">
					<?php do_action('wpml_add_language_selector'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- language switcher -->



<?php /* ?>
<div class="cover_nav">

<!-- get architecture cover image -->

<?php if( get_field('architecture') ): ?>

	<img src="<?php the_field('architecture'); ?>" />

<?php endif; ?>

<!-- display interior cover image -->

<?php if( get_field('interior') ): ?>

	<img src="<?php the_field('interior'); ?>" />

<?php endif; ?>

<!-- get urban cover image -->

<?php if( get_field('urban') ): ?>

	<img src="<?php the_field('urban'); ?>" />

<?php endif; ?>

<!-- get landscape cover image -->

<?php if( get_field('landscape') ): ?>

	<img src="<?php the_field('landscape'); ?>" />

<?php endif; ?>

<!-- get public cover image -->

<?php if( get_field('public') ): ?>

	<img src="<?php the_field('public'); ?>" />

<?php endif; ?>

<!-- get private cover image -->

<?php if( get_field('private') ): ?>

	<img src="<?php the_field('private'); ?>" />

<?php endif; ?>

</div>
<?php // */ ?>

<!-- END -->

<?php endwhile; endif; ?>





<!-- Add JS from footer -->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='<?php bloginfo('template_directory') ?>/_/js/jquery-1.5.1.min.js'>\x3C/script>")</script>
<script src="<?php bloginfo('template_directory') ?>/_/js/bootstrap.min.js"></script>

<script src="<?php bloginfo('template_directory') ?>/_/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/_/js/isotope.pkgd.min.js"></script>
<!-- <script src="<?php bloginfo('template_directory') ?>/_/js/B22.js"></script> -->


<script>


	/*!
	 * Change background image on hover
	 */


	// remap jQuery to $
	(function($){})(window.jQuery);

	//	Preload Images
	//  $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-1.jpg').load(function(){
	//      $('body').append($(this));
	//  });
	//  $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-2.jpg').load(function(){
	//      $('body').append($(this));
	//  });
	//  $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-3.jpg').load(function(){
	//      $('body').append($(this));
	//  });
	//  $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-4.jpg').load(function(){
	//      $('body').append($(this));
	//  });
	//  $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/12/B22-8.jpg').load(function(){
	//      $('body').append($(this));
	//  });
	//  $('<img/>').hide().attr('src', 'http://www.b22.it/web/wp-content/uploads/2015/11/018PR_8297FR-LQ.jpg').load(function(){
	//      $('body').append($(this));
	//  });







	/*
	################################################################################################################################
	PRELOAD IMAGES
	################################################################################################################################
	*/


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
	// echo '// tax open';

	if ( $taxonomies ) {
	  foreach ( $taxonomies  as $single_taxonomy ) {

		$taxonomy_name = $single_taxonomy->labels->name;
		$taxonomy_singular_name = $single_taxonomy->labels->singular_name;

		// print_r($single_taxonomy->labels);
		$taxonomy = $single_taxonomy->rewrite[slug];

//	    echo '<strong>' . _x($taxonomy_singular_name,'taxonomy general name') . '/' . _x($taxonomy_name,'taxonomy singular name') . '</strong> ';
//	    echo "\n\n"."\t\t".'// >> ' . $taxonomy . ' << '."\n";

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

			// if(!get_field('taxonomy_term_hidden',$taxonomy.'_'.$term->term_id)){

				// echo "\n"."\t\t\t\t".'// '.$term->slug.'('.$term->count.')'."\n\n";

				$taxonomy_term_image_arr = get_field('taxonomy_term_image',$taxonomy.'_'.$term->term_id );
				if($taxonomy_term_image_arr){
				echo "

		    $('<img/>').hide().attr('src', '".$taxonomy_term_image_arr[url]."').load(function(){
		        $('body').append($(this));
		    });

				";
				}

			// }

			unset(${"arr_" . $term->slug . "_related"});

		}

	  }

	}
	?>


	/*
	################################################################################################################################
	################################################################################################################################
	*/











	//Define Variables
	var $item = $('.item');

	var $intro = $('.intro');
	var $body = $('.body');
	var $first = $('#first');
	var $two = $('#second');
	var $three = $('#third');
	var $four = $('#fourth');
	var $five = $('#fifth');
	var $six = $('.six');


	//  Hide everything but item hovered
	//  $item.on({
	//      mouseenter:function(){
	//          $intro.css({opacity:0});
	//          $item.not(this).css({opacity:0});
	//          $first.css({opacity:1})
	//      },
	//      mouseleave:function(){
	//          $intro.css({opacity:1}).removeAttr('style');
	//          $item.css({opacity:1}).removeAttr('style');
	//      }
	//  });


	/*
	################################################################################################################################
	NEW DYNAMIC LIST OF TERMS WITH BACKGROUND
	################################################################################################################################
	*/


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
	echo '// tax open

	';

	if ( $taxonomies ) {
	  foreach ( $taxonomies  as $single_taxonomy ) {

		$taxonomy_name = $single_taxonomy->labels->name;
		$taxonomy_singular_name = $single_taxonomy->labels->singular_name;

		// print_r($single_taxonomy->labels);
		$taxonomy = $single_taxonomy->rewrite[slug];

//	    echo '<strong>' . _x($taxonomy_singular_name,'taxonomy general name') . '/' . _x($taxonomy_name,'taxonomy singular name') . '</strong> ';
	    echo "\n\n"."\t\t".'// >> ' . $taxonomy . ' << '."\n";

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

			// if(!get_field('taxonomy_term_hidden',$taxonomy.'_'.$term->term_id)){

				// echo "\n"."\t\t\t\t".'// '.$term->slug.'('.$term->count.')'."\n\n";

				$taxonomy_term_image_arr = get_field('taxonomy_term_image',$taxonomy.'_'.$term->term_id );
				if($taxonomy_term_image_arr){
				echo "

		    $('.container.home .intro .".$term->slug."').hover(function() {
		        $('body').css('background-image', 'url(".$taxonomy_term_image_arr[url].")');
		        $('body').css('background-size', 'cover');
		        $('body').css('background-position', 'center', 'center');
		    }, function() {
		        $('body').css('background', '');
		    });
				";
				}

			// }

			unset(${"arr_" . $term->slug . "_related"});

		}

	  }

	}
	?>


	/*
	################################################################################################################################
	################################################################################################################################
	*/


	//Tag cloud animation
	//Define variables

	    var $term = $("#tax_cloud a.tax_term");
	    var $tax_cloud = $("#tax_cloud");
	    var $all_projects = $("#navbar li.current_page_item a");

	//Click taxonomy to add "margin_10" class to #tag_cloud

	$term.on({
	    click:function(){
	        $tax_cloud.addClass( "margin_10" );
	    },
	});

	//Click "All Projects" to remove "margin_10" class from #tag_cloud

	$all_projects.on({
	    click:function(){
	        $tax_cloud.removeClass( "margin_10" );
	    },
	});







</script>


<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory') ?>/_/js/functions.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.

<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->

</body>
</html>