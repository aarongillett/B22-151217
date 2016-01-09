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

<!--
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
-->

	<!-- Header -->
<div class="container">
<div class="page-header-single">
	<div class="container">
	    <div class="col-xs-6">
	    	<div id="b22_logo">
		  		<a href="http://www.b22.it/web">
		  		<svg xmlns="http://www.w3.org/2000/svg" width="74" height="29" viewBox="0 0 74 29" version="1.1"><title>B22</title><desc>Architecture</desc><defs><path d="M0 0L73.5 0 73.5 28.3 0 28.3M0 0L73.5 0 73.5 28.3 0 28.3 0 0ZM0 0L73.5 0 73.5 28.3 0 28.3 0 0Z"/></defs><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-80.000000, -67.000000)"><g transform="translate(80.000000, 67.000000)"><mask fill="white"/><path d="M11.6 5.9L11.5 5.9 11.4 5.9 11.4 5.9 11.4 0.2 0 0.2 0 17.1 0 28.3 11.4 28.3 11.4 28.3 11.4 28.3 11.5 28.3 11.6 28.3C17.9 28.3 23.1 23.3 23.1 17.1 23.1 10.9 17.9 5.9 11.6 5.9" fill="#FAFAFA" mask="url(#mask-2)"/><path d="M44.2 17.5C44.2 17.5 44.2 17.5 44.2 17.5L36.9 28.3 38.4 28.3 44.7 28.3 46.2 28.3 46.2 26.8 46.2 19 46.2 17.5 45.2 17.5 44.2 17.5Z" fill="#FAFAFA"/><mask fill="white"/><path d="M44.2 17.5L44.2 17.5 44.2 17.5C44.4 17.2 44.6 17 44.7 16.7 45.6 15.2 46.1 13.5 46.2 11.7 46.2 11.5 46.2 11.4 46.2 11.2 46.2 11.2 46.2 11.2 46.2 11.2 46.2 5 41 0 34.7 0 34.5 0 34.3 0 34.2 0 32 0.1 30 0.8 28.3 1.8L29.2 3.1 33.5 9.9C33.8 10.3 33.9 10.7 33.9 11.2 33.9 11.7 33.8 12.1 33.5 12.5L30.3 17.5 28.3 20.6 23.9 27.1C23.5 27.8 23.8 28.3 24.6 28.3L35.4 28.3 36.9 28.3 44.2 17.5 44.2 17.5Z" fill="#FAFAFA" mask="url(#mask-4)"/><path d="M72.5 17.5L71.5 17.5C71.5 17.5 71.5 17.5 71.5 17.5L64.2 28.3 65.7 28.3 72 28.3 73.5 28.3 73.5 26.8 73.5 19 73.5 17.5 72.5 17.5Z" fill="#FAFAFA"/><mask fill="white"/><path d="M71.5 17.5L71.5 17.5 71.5 17.5C71.7 17.2 71.8 17 72 16.7 72.9 15.2 73.4 13.5 73.5 11.7 73.5 11.5 73.5 11.4 73.5 11.2 73.5 11.2 73.5 11.2 73.5 11.2 73.5 5 68.3 0 61.9 0 61.8 0 61.6 0 61.4 0 59.3 0.1 57.3 0.8 55.6 1.8L56.5 3.1 60.8 9.9C61 10.3 61.2 10.7 61.2 11.2 61.2 11.7 61 12.1 60.8 12.5L57.6 17.5 55.6 20.6 51.2 27.1C50.8 27.8 51.1 28.3 51.9 28.3L62.7 28.3 64.2 28.3 71.5 17.5 71.5 17.5Z" fill="#FAFAFA" mask="url(#mask-6)"/></g></g></g></svg>
		  		</a>
			</div>
		</div>

	    <div class="col-xs-6">
		    <nav class="navbar navbar-inverse"> <!-- <nav class="navbar navbar-inverse navbar-fixed-top"> -->

		    <div class="container-fluid">

		        <div class="navbar-header">

					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		        	</button>

		        </div>

		        <div id="navbar" class="collapse navbar-collapse">
					<div class="page-id-94">
						<!-- wp menu -->

						<?php

						$top_menu = array(
							'theme_location'  => '',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);

						wp_nav_menu( $top_menu );

						?>
					</div>
					<!-- / wp menu -->
				</div>
		    </div>

		        <!-- /.nav-collapse -->

		    </nav>
		</div>

	</div>
</div>
</div>