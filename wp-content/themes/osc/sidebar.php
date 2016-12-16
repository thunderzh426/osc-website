<div class="sidebar">

    <?php
    global $osc_post_types,$post;
    $post_slug=$post->post_name;
    if(isset($post_slug) && $post_slug == 'software-proto-typing')
    {
        $post_catID = 19;
        $webinar_catID = 9;
        $whitepaper_catID = 14;

    }elseif(isset($post_slug) && $post_slug == 'application-development')
    {
        $post_catID = 16;
        $webinar_catID = 5;
        $whitepaper_catID = 11;

    }elseif(isset($post_slug) && $post_slug == 'identity-management')
    {
        $post_catID = 17;
        $webinar_catID = 6;
        $whitepaper_catID = 12;
    }
    elseif(isset($post_slug) && $post_slug == 'apis-development')
    {
        $post_catID = 15;
        $webinar_catID = 7;
        $whitepaper_catID = 10;
    }
    elseif(isset($post_slug) && $post_slug == 'salesfore')
    {
        $post_catID = 18;
        $webinar_catID = 8;
        $whitepaper_catID = 13;
    }

    ?>
    <div class="widget_area"><span class="widget_title">Videos/Webinars</span>

        <div class="textwidget">
            <?php
            if($webinar_catID){
                $args1 = array('post_type' => $osc_post_types[0]['post_type'],'tax_query' => array(array('taxonomy' => 'cat_webinar','field' => 'id','terms' => $webinar_catID)),'posts_per_page' => 3);
            }else{
                $args1 = array('post_type' => $osc_post_types[0]['post_type'],'posts_per_page' => 3);
            }

            query_posts($args1);
            if (have_posts()) {
            while (have_posts()) : the_post();
            ?>
            <div class="webitxt clearfix">
                <img style="float: left; margin-top: 0;" src="<?php echo get_bloginfo('template_url');?>/assets/images/ytb.png"> <a href="<?php the_permalink();?>"><?php echo get_the_title();?></a>
                <div class="audate"><?php echo get_the_date();?></div>
            </div>
			
                <?php
            endwhile; ?>
				<div class="rmore"><a href="<?php echo site_url();?>/webinars">View More</a></div>
            <?php
			} else {
                echo "No videos/webinars are available for this service.";
            }
            wp_reset_query();
            ?>
            
        </div>
    </div>
    <div class="widget_area"><span class="widget_title">Recent Posts</span>

        <div class="textwidget">
            <?php
            if($post_catID){
                $args3 = array('cat' => $post_catID, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => 3,'post_status' => 'publish','post_type' => 'post');
            }else{
                $args3 = array('orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => 3,'post_status' => 'publish','post_type' => 'post');
            }

            query_posts($args3);
            if (have_posts()) {
                while (have_posts()) : the_post();
                    ?>
                    <div class="webitxt clearfix">
					<img style="float: left; margin-top: 0;" src="<?php echo site_url();?>/wp-content/uploads/2016/05/blog-globe-click.jpg"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a>
                        <div class="audate"><?php echo get_the_date();?></div>
                    </div>
					
					
                    <?php
                endwhile; ?>
				<div class="rmore"><a href="<?php echo site_url();?>/blog">View More</a></div>
			<?php
		   } else {
                echo "No recent posts are available for this service.";
            }
            wp_reset_query();
            ?>
            
        </div>
    </div>
    <div class="widget_area"><span class="widget_title">Whitepapers</span>

        <div class="textwidget">
            <?php
            global $osc_post_types;
            if($whitepaper_catID){
                $args2 = array('post_type' => $osc_post_types[1]['post_type'],'tax_query' => array(array('taxonomy' => 'cat_whitepaper','field' => 'id','terms' => $whitepaper_catID)),'posts_per_page' => 3);
            }else{
                $args2 = array('post_type' => $osc_post_types[1]['post_type'],'posts_per_page' => 3);
            }

            query_posts($args2);
            if (have_posts()) {
            while (have_posts()) : the_post();
            ?>
                <div class="webitxt clearfix">
				<img style="float: left; margin-top: 0;" src="<?php echo site_url();?>/wp-content/uploads/2016/04/icon_pdf-1.png"><a href="<?php echo wp_get_attachment_url( get_post_meta(get_the_ID(),'upload_pdf',true) );?>"><?php echo get_the_title();?></a>
                    <div class="audate"><?php echo get_the_date();?></div>
                </div>
                
				
			<?php
            endwhile; ?>
			
				<div class="rmore"><a href="<?php echo site_url();?>/whitepapers">View More</a></div>
            <?php
			} else {
                echo "No Whitepapers are available for this service.";
            }
            wp_reset_postdata();
            wp_reset_query();
            ?>
            
        </div>
    </div>

</div>


