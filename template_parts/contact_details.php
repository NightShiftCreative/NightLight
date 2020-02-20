<?php
    $icon_set = ns_core_load_theme_options('ns_core_icon_set');
    $phone = ns_core_load_theme_options('ns_core_phone');
    $email = ns_core_load_theme_options('ns_core_email');
    $address = ns_core_load_theme_options('ns_core_address');
    $social_icons = ns_core_get_social_icons();
?>

<section class="module contact-details">
    <div class="container">
        <div class="center">

            <?php if(!empty($email)) { ?>
            <div class="contact-item">
                <?php echo ns_core_get_icon($icon_set, 'envelope', '', 'mail'); ?>
                <h4><?php esc_html_e( 'Email Us', 'ns-core' ); ?></h4>
                <p title="<?php echo esc_attr($email); ?>"><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_attr($email); ?></a></p>
            </div>
            <?php } ?>

            <?php if(!empty($phone)) { ?>
            <div class="contact-item">
                <?php echo ns_core_get_icon($icon_set, 'phone', 'telephone'); ?>
                <h4><?php esc_html_e( 'Call Us', 'ns-core' ); ?></h4>
                <p><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_attr($phone); ?></a></p>
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
                <?php echo wp_kses_post($social_icons); ?>
            </div>
            <?php } ?>

        </div>
    </div>
</section>