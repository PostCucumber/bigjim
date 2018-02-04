<?php
require('facebook/FacebookFeed.php');
get_header(); ?>
<?php get_template_part('parts/banner'); ?>
    <div id="content" class="section page-content">

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if (have_posts()) :
                if (is_home() && !is_front_page()) : ?>

                <?php endif; ?>

                <div class="blog-container">
                    <div class="container wide">
                        <!--<div class="row">-->
                            <?php
                            $feed    = new FacebookFeed();
                            $results = $feed->fetch(6);
                            $now     = time();
                            foreach ($results->data as $result) {
                                if (strlen($result->description) > 0)
                                {
                                    $trimmed = wp_trim_words($result->description, $num_words = 26, '...');
                                } else {
                                    $trimmed = 'From the walk...';
                                }

                                $photo_url = $feed->photo($result);
                                ?>

                                <div class="col-sm-6 col-lg-4 text-center">
                                    <div class="blog-article">
                                        <div class="blog-image">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <?php if($result->type != 'video') { ?>
                                                    <a href="<?php echo $result->link; ?>" target="_blank" ><img
                                                    src="<?php echo $photo_url; ?>"
                                                    alt="<?php echo $result->caption; ?>"
                                                    class="embed-responsive-item img-fluid border-bottom"></a>
                                                <?php } else { ?>
                                                    <a href="<?php echo $result->link; ?>" target="_blank" >
                                                        <iframe
                                                            src="<?php echo 'https://www.facebook.com/plugins/video.php?href='.$result->link ?>"
                                                            style="border:none;overflow:hidden"
                                                            scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true" class="embed-responsive-item img-fluid border-bottom">
                                                        </iframe>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <header class="blog-header">
                                            <div class="entry-meta">
                                                <p class="time-posted">
                                                    posted <?php echo human_time_diff($now, strtotime($result->created_time)); ?>
                                                    ago</p>
                                            </div><!-- .entry-meta -->
                                        </header><!-- .entry-header -->
                                        <p class="fbblog-msg" style="margin:0;padding:10px"><?php echo $trimmed; ?></p>

                                    </div>
                                    <div class="blog-link">
                                        <a class="btn btn-primary-custom btn-readmore" href="<?php echo $result->link; ?>" target="_blank" >Read more</a>
                                    </div>
                                </div>
                            <?php } ?>
                        <!--</div>-->
                    </div>
                </div>

            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>
        </main><!-- #main -->

    </div>

<?php
get_footer();