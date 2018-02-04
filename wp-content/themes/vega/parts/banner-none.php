<?php
/**
 * The template part for displaying the top banner without an image
 *
 * @package vega
 */
?>
<?php $vega_show_banner_title = vega_wp_show_banner_title(); ?>
<!-- ========== Banner - None ========== -->
<div class="jumbotron banner-none">
    <img class="not-draggable" src="<?php echo get_template_directory_uri(); ?>/assets/img/hiker.png" width="" height="130" alt="" style="z-index:100;position:relative;float:right;bottom:0px;right:0px" />
    <div class="container">
        <div class="headandhome">
        <!--<a href="/">&larr; Home</a>-->
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('
<span id="breadcrumbs">','</p>
');
            }
            ?>
        <?php
        if($vega_show_banner_title && esc_html(vega_wp_title()) != 'Christian Produce Co.') { ?>
            <h1 class="block-title wow zoomIn" ><?php echo esc_html(vega_wp_title()); ?></h1><?php }
        else if(esc_html(vega_wp_title()) == 'Christian Produce Co.') { ?><h1 class="alt-head" ><img src="<?php echo get_template_directory_uri() . '/../../uploads/2017/08/CPC_logo_RGB-300x116.png' ?>" height="80px" /></h1><?php } ?>
    </div>
        
    </div>
</div>
<!-- ========== /Banner - None ========== -->