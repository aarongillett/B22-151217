<?php
	global $options;
//	foreach ($options as $value) {
//	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="www.B22.it" data-template-set="html5-reset">

	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
	<?php if (is_home () ) { bloginfo('name'); echo " | "; bloginfo('description'); } elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		bloginfo('name'); echo " Risultati di ricerca per: "; echo wp_specialchars($s);
	} else { wp_title('',true); } ?>
	</title>


	<meta name="google-site-verification" content="">
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/_/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/_/css/bootstrap-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/_/css/style.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/_/scss/style.scss">

	<script src="<?php bloginfo('template_directory') ?>/_/js/modernizr-1.7.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/pathto/single.js"></script>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

	<?php if(is_single()): ?>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
		<meta property="og:image" content="<?php echo $image[0]; ?>" />
		<?php endif; ?>
	<?php endif; ?>

	<!-- wp_head() -->
	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?> id="<?php if(is_home()){ echo ('page_home'); } else { echo ('page_internal'); } ?>">

	<div class="page-header-single">

		<div class="container">

			<div class="container-fluid">

				<div class="menu-single">

					<ul>
						<li><a href="http://www.b22.it/web/home/">&#x2190;</a></li>
					</ul>

				</div>

			</div>

		</div>

	</div>