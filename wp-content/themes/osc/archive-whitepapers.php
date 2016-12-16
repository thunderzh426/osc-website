<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
?>
<!-- blog title -->
<div class="homepage_nav_title section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="index_titles blog single">
                    <?php
                    if (is_day()) :
                        printf(__('Daily Archives: %s', 'one-page'), get_the_date());
                    elseif (is_month()) :
                        printf(__('Monthly Archives: %s', 'one-page'), get_the_date('F Y'));
                    elseif (is_year()) :
                        printf(__('Yearly Archives: %s', 'one-page'), get_the_date('Y'));
                    else :
                        _e('Whitepapers', 'one-page');
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<!-- blog title ends -->

<div class="blog_pages_wrapper default_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="padding-top: 60px;">
                <!--page start-->

                <?php
                if (have_posts()):

                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();
                    /* Run the loop for the archives page to output the posts.
                     * If you want to overload this in a child theme then include a file
                     * called loop-archives.php and that will be used instead.
                     */
                    while (have_posts()) {
                        the_post();
                        ?>
                        <!--post start-->
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="post_heading_wrapper">
                                <div class="postimage_container">
                                    <div class="clear"></div>
                                </div>
                                <h1 class="post_title"><a href="<?php echo wp_get_attachment_url( get_post_meta(get_the_ID(),'upload_pdf',true) );?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'one-page' ), get_the_title() ); ?>"><?php the_title(); ?></a></h1>
                                <ul class="post_meta">
                                    <li class="day"><span class="glyphicon glyphicon-calendar"></span><?php echo get_the_time( 'd' ) ?></li>
                                    <li class="month"><?php echo get_the_time( 'M' ) ?></li>
                                    <li class="year"><?php echo get_the_time( 'Y' ) ?></li>
                                    <li class="posted_by"><span class="glyphicon glyphicon-user"></span><span><?php _e( 'by&nbsp;', 'one-page' ); ?></span><?php the_author_posts_link(); ?></li>
                                    <li class="post_comment"></span><?php comments_popup_link( __( 'No Comments.', 'one-page' ), __( '1 Comment.', 'one-page' ), __( '% Comments.', 'one-page' ), '', '' ); ?></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!--End Post-->

                        <?php
                    }
                    ?>
                    <div class="clear"></div>
                    <nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link(__('&larr; Older posts', 'one-page')); ?>
                        </span><span class="nav-next">
                            <?php previous_posts_link(__('Newer posts &rarr;', 'one-page')); ?>
                        </span></nav>
                <?php endif; ?>

                <!--End Page-->
                <div class="clear"></div>
            </div>
            <!--Sidebar-->
            <div class="col-md-4">
                <!--Start Sidebar-->
                <?php get_sidebar(); ?>
                <!--End Sidebar-->
            </div>
            <div class="clear"></div>

        </div>
    </div>
</div>

<div class="clear"></div>
<?php get_footer(); ?>
