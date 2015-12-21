<footer>

  <div class="container">
    <nav>
      <div class="language">
        <?php do_action('wpml_add_language_selector'); ?>
      </div>
      <ul>
        <li><a href="http://www.b22.it">B22</a></li>
        <li><a href="https://goo.gl/maps/z2yx8DdHNCp">via Montebello 24<br>I-20121 Milan</a></li>
        <li><a href="mailto:office@b22.it">office@b22.it</a></li>
      </ul>
    </nav>

</footer>

</div> <!-- chiudo #wrapper -->

<?php wp_footer(); ?>

<!-- here comes the javascript -->

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