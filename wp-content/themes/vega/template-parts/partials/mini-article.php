<?php
$dateposted = ($post->post_name == 'home' ? '' : human_time_diff(time(),strtotime($result->created_time)) . ' ago' );
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <?php
    if($result->message == NULL)
        $message = 'From the walk...';
    else
        $message = wp_trim_words($result->message, $num_words = 22, $more = '...' );

    switch ($result->type) {
        case "video": ?>
            <div class="thumbnail" style="padding:0px;">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe
                        src="<?php echo $result->link; ?>"
                        scrolling="no"
                        frameborder="0"
                        allowTransparency="true"
                        allowFullScreen="true"
                        class="embed-responsive-item">
                    </iframe>
                </div>
                <div class="caption">
                    <p class="flex-text text-muted">
                    <?php echo $message; ?>
                    </p>
                    <a class="btn btn-primary-custom btn-left" href="<?php echo $result->link; ?>" target="_blank">Fullscreen</a>
                    <a class="btn btn-inverse btn-right" href="https://www.facebook.com/BigJimsWalk/videos?lst=1792038472%3A100011444923852%3A1517723652" target="_blank">More Videos</a>    
                </div>          
            </div>
            <?php
            break;

        case "status": ?>
            <div class="thumbnail fbblog-status">
                <p><?php echo $result->message; ?></p>
                <a class="btn btn-mid btn-inverse" href="<?php echo $result->permalink_url; ?>" target="_blank">View Post</a>
            </div>
            <?php
            break;

        case "link": ?>
            <div class="thumbnail" style="border:none">
                <img src="<?php echo $result->full_picture; ?>" class="img img-responsive" alt="<?php echo $result->caption; ?>">
                <div class="caption">
                    <p class="flex-text text-muted">Big Jim Shared a Link.</p>
                    <a class="btn btn-primary-custom btn-left" href="<?php echo $result->link ?>" target="_blank">
                    Open Link
                    </a>
                    <a class="btn btn-inverse btn-right" href="<?php echo $result->permalink_url ?>" target="_blank">View Post</a> 
                </div>
            </div>
            <?php
            break;
            
        case "photo": ?>
            <div class="fbblog-photo">
                <div class="embed-responsive embed-responsive-16by9">
                    <img src="<?php echo $result->full_picture; ?>" alt="<?php echo $result->caption; ?>" >
                </div>
            </div>
            <?php
            break;

        default:
    } ?>
    <div class="time-posted">
        <p><?php echo $dateposted; ?></p>
    </div>
</div>