<?php
/*
Template Name: test template
*/
?>

<?php get_header(); ?>


<div id="page_wrap" class="container home">

	<div id="tax_cloud">

	<p>	

	<?php echo _x('Field','taxonomy singular name'); ?>
	<br />
	<?php echo _x('Programme','taxonomy singular name'); ?>
	<br />
	<?php echo _x('Size','taxonomy singular name'); ?>
	<br />
	<?php echo _x('Location','taxonomy singular name'); ?>
	<br />
	<?php echo _x('Client','taxonomy singular name'); ?>
	<br />
	<?php echo _x('Award','taxonomy singular name'); ?>
	<br />
	<?php echo _x('Date','taxonomy singular name'); ?>
	<br />
	<?php echo _x('People','taxonomy singular name'); ?>
	<br />
	<br />

	<?php echo _x('Fields','taxonomy general name'); ?>
	<br />
	<?php echo _x('Programme','taxonomy general name'); ?>
	<br />
	<?php echo _x('Size','taxonomy general name'); ?>
	<br />
	<?php echo _x('Location','taxonomy general name'); ?>
	<br />
	<?php echo _x('Clients','taxonomy general name'); ?>
	<br />
	<?php echo _x('Awards','taxonomy general name'); ?>
	<br />
	<?php echo _x('Date','taxonomy general name'); ?>
	<br />
	<?php echo _x('People','taxonomy general name'); ?>
	<br />
	<br />

	<?php 
	$args = array(
		'suppress_filters' => true,
	  'public'   => true,
	  '_builtin' => false	  
	); 
	$output = 'names'; // or objects
	$operator = 'and'; // 'and' or 'or'
	$taxonomies = get_taxonomies( $args, $output, $operator ); 

	$taxonomies_objects = get_object_taxonomies( 'post', 'objects' );
	// print_r($taxonomies_objects);

	if($taxonomies){
		foreach ($taxonomies as $taxonomy) {
		//	echo('-');
		}
	}

	if($taxonomies_objects){
		foreach ($taxonomies_objects as $taxonomies_object) {

			// _e($taxonomies_object->label,'taxonomy singular name');
		//	print_r($taxonomies_object->label);
			print_r($taxonomies_object->labels);
			// echo apply_filters( $tag, $value );
			// echo apply_filters( 'wpml_translate_single_string','People','b22' );
			
			// echo __('Field','b22');
			echo ('<br /><br />');


		}
	}

	?>


<pre>
$tax = get_taxonomy('category'); 
$labels = get_taxonomy_labels($tax);
print_r($labels);
</pre>
	<?php
		$tax = get_taxonomy('category'); 
		$labels = get_taxonomy_labels($tax);
		print_r($labels);
	?>
	
	<br /><br /><br /><br />

<pre>
$tax = get_taxonomy('field'); 
$labels = get_taxonomy_labels($tax);
print_r($labels);
</pre>
	<?php
		$tax = get_taxonomy('field'); 
		$labels = get_taxonomy_labels($tax);
		print_r($labels);
	?>

	</p>

	</div>

</div>


<?php get_footer(); ?>
