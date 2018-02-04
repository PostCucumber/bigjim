<?php
/**
 * The template part for displaying an open content section for the frontpage (static)
 *
 * @package vega
 */
?>
<?php 
$vega_wp_frontpage_open1 = vega_wp_get_option('vega_wp_frontpage_open1'); 

if($vega_wp_frontpage_open1 == 'Y') { 

$vega_wp_frontpage_open1_heading = vega_wp_get_option('vega_wp_frontpage_open1_heading'); 

global $post; //SiteOrign Page Builder fix
$open_content_page = get_post(vega_wp_get_option('vega_wp_frontpage_open1_content')); 
$post = $open_content_page ;
$vega_wp_frontpage_open1_content = apply_filters( 'the_content', $open_content_page->post_content );

$vega_wp_frontpage_open1_section_id = vega_wp_get_option('vega_wp_frontpage_open1_section_id'); 
?>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '773919706101955',
                xfbml      : true,
                version    : 'v2.9'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

<!-- ========== Featured Section ========== -->
<div class="section frontpage-open1" id="<?php echo esc_attr($vega_wp_frontpage_open1_section_id) ?>" <?php vega_wp_section_bg_color('vega_wp_frontpage_open1_bg_color'); ?>>
    <div class="container">

        <h2 class="block-title wow zoomIn"><?php echo esc_html($vega_wp_frontpage_open1_heading) ?></h2>
        <?php
        $FACEBOOK_PAGE_ID = FACEBOOK_PAGE_ID;
        $FACEBOOK_ACCESS_TOKEN = FACEBOOK_ACCESS_TOKEN;
        $fields="id,name,description,place,timezone,start_time,cover";
        $json_link = "https://graph.facebook.com/v2.7/{$FACEBOOK_PAGE_ID}/events/attending/?fields={$fields}&access_token={$FACEBOOK_ACCESS_TOKEN}&since={$since_unix_timestamp}&until={$until_unix_timestamp}";
        $json = file_get_contents($json_link);
        $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

        echo "
        <table class='table table-hover table-responsive table-bordered'>";

        // count the number of events
        $event_count = count($obj['data']);

        for($x=0; $x<$event_count; $x++){
            // facebook page events will be here
            // set timezone
            date_default_timezone_set($obj['data'][$x]['timezone']);

            $start_date = date( 'l, F d, Y', strtotime($obj['data'][$x]['start_time']));
            $start_time = date('g:i a', strtotime($obj['data'][$x]['start_time']));

            $pic_big = isset($obj['data'][$x]['cover']['source']) ? $obj['data'][$x]['cover']['source'] : "https://graph.facebook.com/v2.7/{$fb_page_id}/picture?type=large";

            $eid = $obj['data'][$x]['id'];
            $name = $obj['data'][$x]['name'];
            $description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";

// place
            $place_name = isset($obj['data'][$x]['place']['name']) ? $obj['data'][$x]['place']['name'] : "";
            $city = isset($obj['data'][$x]['place']['location']['city']) ? $obj['data'][$x]['place']['location']['city'] : "";
            $country = isset($obj['data'][$x]['place']['location']['country']) ? $obj['data'][$x]['place']['location']['country'] : "";
            $zip = isset($obj['data'][$x]['place']['location']['zip']) ? $obj['data'][$x]['place']['location']['zip'] : "";

            $location="";

            if($place_name && $city && $country && $zip){
                $location="{$place_name}, {$city}, {$country}, {$zip}";
            }else{
                $location="Location not set or event data is too old.";
            }

            echo "<tr>";
            echo "<td rowspan='6' style='width:20em;'>";
            echo "<img src='{$pic_big}' width='200px' />";
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='width:15em;'>What:</td>";
            echo "<td><b>{$name}</b></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>When:</td>";
            echo "<td>{$start_date} at {$start_time}</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Where:</td>";
            echo "<td>{$location}</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Description:</td>";
            echo "<td>{$description}</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Facebook Link:</td>";
            echo "<td>";
            echo "<a href='https://www.facebook.com/events/{$eid}/' target='_blank'>View on Facebook</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo"</table>";
        ?>

        <div
                class="fb-like"
                data-share="true"
                data-width="450"
                data-show-faces="true">
        </div>
        <div class="wow fadeIn">

            <div id="bigjim-map">

                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9tOpg_Dt6Nn6ehQ7idNkRhKCBufjhoYU"></script>
                <script>
                    function loadbigjimmap() {
                        var myLatLng = {lat: -25.363, lng: 131.044};
                        var map = new google.maps.Map(document.getElementById('bigjim-map'), {
                            zoom: 4,
                            center: myLatLng
                        });

                        var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: 'Hello World!'
                        });
                    }
                    google.maps.event.addDomListener( window, 'load', loadbigjimmap );
                </script>
            </div>
        <?php echo $vega_wp_frontpage_open1_content; ?>
        </div>
    </div>
</div>
<!-- ========== /Featured Section ========== -->
<?php 
wp_reset_postdata();
} ?>
