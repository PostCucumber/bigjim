<!DOCTYPE html>
<div class="col-sm-6 col-md-4 col-lg-4 text-center">
    <div class="blog-article">
        <?php
        if($result->type != 'status') {
            if($result->type == 'video') { ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe
                        src="<?php echo $result->link ?>"
                        style="border:none;overflow:hidden"
                        scrolling="no"
                        frameborder="0"
                        allowTransparency="true"
                        allowFullScreen="true"
                        class="embed-responsive-item img-fluid border-bottom"
                        width="100%"
                        height="170">
                    </iframe>
                    <?php echo $content; ?>
                </div>
            <?php }
            elseif($result->type == 'photo' || $result->type =='link') { ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <div class="fbblog-photo">
                        <img src="<?php echo $result->full_picture; ?>" alt="<?php echo $result->caption; ?>" >
                    </div>
                </div>
            <?php } ?>
            
            <div class="fbblog-msg">
            <?php
                //echo $result->type;
                wp_trim_words( $content, $num_words = 22, '...' );
                echo $content;
            ?>
            </div>
            <div class="blog-link"> 
            <a class="btn btn-primary-custom btn-readmore" href="<?php echo $result->permalink_url; ?>" target="_blank" >
                View Post
            </a>
        </div>

        <div class="time-posted">
            <p><?php echo $dateposted ?></p>    
        </div>


        <?php }
        elseif($result->type == 'status') { ?>
            <div class="fbblog-status">
                <p><?php echo $result->message; ?></p>
            </div>
        <?php } ?> 
    </div>
</div>