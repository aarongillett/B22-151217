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
<script src="<?php bloginfo('template_directory') ?>/_/js/B22.js"></script>

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