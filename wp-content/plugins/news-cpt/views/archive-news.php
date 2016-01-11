<?php
/*Template Name: Archive News
 *
 * You can customize this view by putting a replacement file of the same name (single.php) in the events/ directory of your theme.
 *
 */

get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main" class="news-cpt widecolumn">
    	<div id="page_wrap" class="container">
    	<div class="news_content">
    		<div class="row">

		            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		            <?php
		              if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
		                the_post_thumbnail();
		            } ?>

				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="news_post">
						<div class="news_excerpt">
								<h3><?php the_excerpt(); ?></h3>
				    		<div class="post-info">
								<span class="date published time" title="<?php the_time('c') ?>"><?php the_time('F j, Y') ?>
								</span>
          					</div>
						</div>
					</div>
				</div>

					<?php endwhile; ?>

			</div>
		</div>
		</div>

        <!-- post -->

      <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&larr;') ?></div>
        <div class="alignright"><?php previous_posts_link('&rarr;') ?></div>
      </div>

    <?php else: ?>

      <!--<p>There are no news items to display.</p>-->

    <?php endif; ?>

    </div><!-- #content -->

</div><!--#primary-->

<?php get_footer(); ?>