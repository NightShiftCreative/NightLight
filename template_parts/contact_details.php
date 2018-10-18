<?php
    $icon_set = esc_attr(get_option('ns_core_icon_set', 'fa'));
    $phone = esc_attr(get_option('ns_core_phone'));
    $email = esc_attr(get_option('ns_core_email'));
    $address = esc_attr(get_option('ns_core_address'));
    $fb = esc_attr(get_option('ns_core_fb'));
    $twitter = esc_attr(get_option('ns_core_twitter'));
    $google = esc_attr(get_option('ns_core_google'));
    $linkedin = esc_attr(get_option('ns_core_linkedin'));
    $youtube = esc_attr(get_option('ns_core_youtube'));
    $vimeo = esc_attr(get_option('ns_core_vimeo'));
    $instagram = esc_attr(get_option('ns_core_instagram'));
    $flickr = esc_attr(get_option('ns_core_flickr'));
    $dribbble = esc_attr(get_option('ns_core_dribbble'));
?>

<section class="module contact-details">
    <div class="container">
        <div class="center">

            <?php if(!empty($email)) { ?>
            <div class="contact-item">
                <?php echo ns_core_get_icon($icon_set, 'envelope', '', 'mail'); ?>
                <h4><?php esc_html_e( 'Email Us', 'ns-core' ); ?></h4>
                <p title="<?php echo esc_attr($email); ?>"><?php echo esc_attr($email); ?></p>
            </div>
            <?php } ?>

            <?php if(!empty($phone)) { ?>
            <div class="contact-item">
                <?php echo ns_core_get_icon($icon_set, 'phone', 'telephone'); ?>
                <h4><?php esc_html_e( 'Call Us', 'ns-core' ); ?></h4>
                <p><?php echo esc_attr($phone); ?></p>
            </div>
            <?php } ?>

            <?php if(!empty($address)) { ?>
            <div class="contact-item">
                <?php echo ns_core_get_icon($icon_set, 'map-marker', '', 'location'); ?>
                <h4><?php esc_html_e( 'Visit Us', 'ns-core' ); ?></h4>
                <p><?php echo esc_attr($address); ?></p>
            </div>
            <?php } ?>

            <?php if(!empty($fb) || !empty($twitter) || !empty($google) || !empty($linkedin) || !empty($youtube) || !empty($vimeo) || !empty($instagram) || !empty($flickr) || !empty($dribbble)) { ?>
            <div class="contact-item">
                <?php echo ns_core_get_icon($icon_set, 'share-alt', 'share2', 'forward'); ?>
                <h4><?php esc_html_e( 'Connect With Us', 'ns-core' ); ?></h4>
                <ul class="social-icons">
                    <?php if(!empty($fb)) { ?><li><a href="<?php echo esc_url($fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
                    <?php if(!empty($twitter)) { ?><li><a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
                    <?php if(!empty($google)) { ?><li><a href="<?php echo esc_url($google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                    <?php if(!empty($linkedin)) { ?><li><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                    <?php if(!empty($youtube)) { ?><li><a href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php } ?>
                    <?php if(!empty($vimeo)) { ?><li><a href="<?php echo esc_url($vimeo); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li><?php } ?>
                    <?php if(!empty($instagram)) { ?><li><a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
                    <?php if(!empty($flickr)) { ?><li><a href="<?php echo esc_url($flickr); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li><?php } ?>
                    <?php if(!empty($dribbble)) { ?><li><a href="<?php echo esc_url($dribbble); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li><?php } ?>
                </ul>
            </div>
            <?php } ?>

        </div>
    </div>
</section>