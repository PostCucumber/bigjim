<?php
use KeriganSolutions\FacebookFeed\FacebookFeed;
$feed    = new FacebookFeed();
$results = $feed->fetch(9);

if (have_posts()) :
if (is_home() && !is_front_page()) :
endif;
get_header();
get_template_part('parts/banner'); ?>
    <div id="content" class="section page-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            //echo '<pre>';
            //print_r($results);
            //echo '</pre>';
            ?>            
            <div class="blog-container">
                <div class="container wide">
                    <div class="row">
                        <?php
                        // echo '<pre>';
                        // print_r($results);
                        // echo '</pre>';
                        foreach ($results->posts as $result) {
                            include(locate_template('template-parts/partials/mini-article.php'));
                        }
                        ?>
                        <?php else :
                            get_template_part('template-parts/content', 'none');
                        endif; ?>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div>
<?php
get_footer(); ?>