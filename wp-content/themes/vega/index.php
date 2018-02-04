<?php
use KeriganSolutions\FacebookFeed\FacebookFeed;
$feed    = new FacebookFeed();
$results = $feed->fetch(9);

get_header();
get_template_part('parts/banner'); ?>
<div id="content" class="section page-content">
    <div class="container">
        <div class="flex-row row">
            <?php
            // echo '<pre>';
            // print_r($results);
            // echo '</pre>';
            foreach ($results->posts as $result) {
                include(locate_template('template-parts/partials/mini-article.php'));
            } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>