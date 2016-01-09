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
      <div class="row">
        <div class="col-md-3">
          <div class="entry-content">
            <!-- CUSTOM NEWS_POST <?php the_content(); ?> -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php
              if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
                the_post_thumbnail();
            } ?>
              <!-- <div class="summary"><?php the_content(); ?></div> -->
          </div>
          <div class="entry-content">
              <?php
              if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
                the_post_thumbnail();
              }
              ?>
              <div class="summary"><?php the_excerpt(); ?></div>

              <?php endwhile; ?>

          </div>
        </div>
        </div>
      </div>
        <!-- post -->



      <div class="navigation">
        <div class="alignleft"><?php next_posts_link('Previous entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Next entries') ?></div>
      </div>

    <?php else: ?>

      <p>There are no news items to display.</p>

    <?php endif; ?>

    </div><!-- #content -->

</div><!--#primary-->

<?php get_footer(); ?>