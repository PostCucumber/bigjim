<?php
/**
 * Template Name: Full Width Page
 *
 * The template for displaying a full width page
 *
 * @package vega
 */
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part('parts/banner'); ?>

<!-- ========== Page Content ========== -->
<div class="section page-content bg-white">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                
                <div id="page-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                    
                    <div class="page-content">
<!--                        --><?php //if (is_page('testimonies')) {
//
//    $args = array( 'category' => 'testimonies', 'post_type' =>  'post' );
//    $postslist = get_posts( $args );
//    foreach ($postslist as $post) :  setup_postdata($post);
//        ?>
<!---->
<!--        <h3 class="entry-title block-title block-title-left"><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a></h3>-->
<!--        <div class="entry-content">--><?php //the_excerpt(); ?><!--</div>-->
<!--    --><?php //endforeach; ?>
<!--                        --><?php //}?>
                    <?php the_content(); ?>
                    </div>
                    
                </div>
                <?php if ( comments_open() ) : ?>
                <?php comments_template(); ?>
                <?php endif; ?>
                
            </div>
            
        </div>
    </div>
</div>
<!-- ========== /Page Content ========== -->

<?php endwhile; ?>

<?php get_footer(); ?>