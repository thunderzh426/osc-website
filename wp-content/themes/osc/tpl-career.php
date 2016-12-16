<?php
/*
  Template Name: Career Page
 */
get_header();
?>
<!-- blog title -->
<div class="homepage_nav_title section innerbg" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <div class="index_titles blog single pageh"><?php the_title(); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<!-- blog title ends -->
<div class="blog_pages_wrapper default_bg">
    <div class="container">
        <div class="row">
			<!-- sidebar -->
            <div class="col-md-3">
                <!--Start Sidebar-->
				<?php get_sidebar('positions'); ?>
                <!--End Sidebar-->
            </div>
            <div class="col-md-5">
				<?php
					if ( have_posts() ) : the_post();
						the_content();
					endif;
					?>

            </div>
            <div class="col-md-4">
                <!--Start Sidebar-->
				<?php get_sidebar('notification'); ?>
                <!--End Sidebar-->
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>

