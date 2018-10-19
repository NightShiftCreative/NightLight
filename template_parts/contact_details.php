<?php
    $icon_set = esc_attr(get_option('ns_core_icon_set', 'fa'));
    $phone = esc_attr(get_option('ns_core_phone'));
    $email = esc_attr(get_option('ns_core_email'));
    $address = esc_attr(get_option('ns_core_address'));
    $social_icons = ns_core_get_social_icons();
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

            <?php if(!empty($social_icons)) { ?>
            <div class="contact-item">
                <?php echo ns_core_get_icon($icon_set, 'share-alt', 'share2', 'forward'); ?>
                <h4><?php esc_html_e( 'Connect With Us', 'ns-core' ); ?></h4>
                <?php echo $social_icons; ?>
            </div>
            <?php } ?>

        </div>
    </div>
</section>