<?php

	add_filter('body_class', 'append_language_class');
	function append_language_class($classes){
		$classes[] = 'lang_'.ICL_LANGUAGE_CODE;  //or however you want to name your class based on the language code
		return $classes;
	}

	add_theme_support( 'post-thumbnails' );

	/* Change the post excerpt length */
//	add_filter('excerpt_length', 'my_excerpt_length');
//	function my_excerpt_length($length) {
//	return 30; }

	/* Disable the Admin Bar. */
	add_filter( 'show_admin_bar', '__return_false' ); 

	/**
	 * Register Multiple Taxonomies
	 *
	 * @author Bill Erickson
	 * @link http://www.billerickson.net/code/register-multiple-taxonomies/
	 */
	function be_register_taxonomies() {

		$taxonomies = array(
	
		array(
			'slug'         => 'field',
			'single_name'  => 'Field',
			'plural_name'  => 'Fields',
			'description'  => 'Campo',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'field' ),
		),
		array(
			'slug'         => 'programme',
			'single_name'  => 'Programme',
			'plural_name'  => 'Programme',
			'description'  => 'Programma',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'programme' ),
		),
		array(
			'slug'         => 'people',
			'single_name'  => 'People',
			'plural_name'  => 'People',
			'description'  => 'Gente',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'people' ),
		),
		array(
			'slug'         => 'size',
			'single_name'  => 'Size',
			'plural_name'  => 'Size',
			'description'  => 'Dimensione',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'size' ),
		),
		
		array(
			'slug'         => 'location',
			'single_name'  => 'Location',
			'plural_name'  => 'Locations',
			'description'  => 'Location',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'location' ),
		),
		
		array(
			'slug'         => 'client',
			'single_name'  => 'Client',
			'plural_name'  => 'Clients',
			'description'  => 'Clienti',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'client' ),
		),
		
		array(
			'slug'         => 'award',
			'single_name'  => 'Award',
			'plural_name'  => 'Awards',
			'description'  => 'Premi',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'award' ),
		),
			
		array(
			'slug'         => 'Date',
			'single_name'  => 'Date',
			'plural_name'  => 'Date',
			'description'  => 'Data',
			'post_type'    => 'post',
			'rewrite'      => array( 'slug' => 'date' ),
		),
			
		);
		foreach( $taxonomies as $taxonomy ) {
			$labels = array(
				'name'				=> _x ( $taxonomy['plural_name'],'taxonomy general name'),
				'singular_name' 	=> _x ( $taxonomy['single_name'],'taxonomy singular name'),
				'description'		=> __ ( $taxonomy['description']),
				'search_items'		=> __ ( 'Search ' . $taxonomy['plural_name'] ),
				'all_items'			=> __ ( 'All ' . $taxonomy['plural_name'] ),
				'parent_item'		=> __ ( 'Parent ' . $taxonomy['single_name'] ),
				'parent_item_colon' => __ ( 'Parent ' . $taxonomy['single_name'] . ':' ),
				'edit_item'			=> __ ( 'Edit ' . $taxonomy['single_name'] ),
				'update_item'		=> __ ( 'Update ' . $taxonomy['single_name'] ),
				'add_new_item'		=> __ ( 'Add New ' . $taxonomy['single_name'] ),
				'new_item_name'		=> __ ( 'New ' . $taxonomy['single_name'] . ' Name' ),
				'menu_name'			=> __ ( $taxonomy['plural_name'])
			);
			
			$rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
			$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
		
			register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
		        'labels' => $labels,
		        'public' => true,
		        'show_in_nav_menus' => true,
		        'show_ui' => true,
		        'show_tagcloud' => true,
		        'hierarchical' => true,
		        'rewrite' => true,
		        'query_var' => true,
		        'rewrite' => array( 'slug' => __( $taxonomy['slug'], 'URL slug', 'text-domain' ) )
			));
		}
		
	}
	add_action( 'init', 'be_register_taxonomies' );





	// get taxonomies terms links
	function custom_taxonomies_terms_links(){
	  // get post by post id
	  $post = get_post( $post->ID );

	  // get post type by post
	  $post_type = $post->post_type;

	  // get post type taxonomies
	  $taxonomies = get_object_taxonomies( $post_type, 'objects' );

	  $out = array();
	  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

	    // get the terms related to post
	    $terms = get_the_terms( $post->ID, $taxonomy_slug );

	    if ( !empty( $terms ) ) {
	//	  $out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
	      foreach ( $terms as $term ) {
	        $out[] = $term->slug.' ';
//	          '  <li><a href="'
//	        .    get_term_link( $term->slug, $taxonomy_slug )
//	        .'">'
//	        .    $term->name
//	        . "</a></li>\n";
	      }
//		  $out[] = "</ul>\n";
	    }
	  }

	  return implode('', $out );
	}





	// $genre_labels = array(

	// 	'name'              => _x( 'Genres', 'taxonomy general name' ),

	// 	'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),

	// 	'search_items'      => __( 'Search Genres' ),

	// 	'all_items'         => __( 'All Genres' ),

	// 	'parent_item'       => __( 'Parent Genre' ),

	// 	'parent_item_colon' => __( 'Parent Genre:' ),

	// 	'edit_item'         => __( 'Edit Genre' ),

	// 	'update_item'       => __( 'Update Genre' ),

	// 	'add_new_item'      => __( 'Add New Genre' ),

	// 	'new_item_name'     => __( 'New Genre Name' ),

	// 	'menu_name'         => __( 'Genre' ),

	// );



	// $genre_args = array(

	// 	'hierarchical'      => true,

	// 	'labels'            => $genre_labels,

	// 	'show_ui'           => true,

	// 	'show_admin_column' => true,

	// 	'query_var'         => true,

	// 	'rewrite'           => array( 'slug' => 'genre' ),

	// );



	// register_taxonomy( 'genre', array( 'post' ), $genre_args );




?>