<?php
$contact_form_title = esc_attr(get_option('ns_core_contact_form_title', 'Quick Contact'));
$contact_form_before = wp_kses_post(get_option('ns_core_contact_form_before'));
$contact_form_after = wp_kses_post(get_option('ns_core_contact_form_after'));
$contact_form_source = esc_attr(get_option('ns_core_contact_form_source', 'default'));
$contact_form_id = esc_attr(get_option('ns_core_contact_form_id'));
?>

<?php if(!empty($contact_form_title)) { ?>
<div class="module-header module-header-left">
    <h4><?php echo esc_attr($contact_form_title); ?></h4>
    <div class="widget-divider"><div class="bar"></div></div>
</div>
<?php } ?>

<?php if(!empty($contact_form_before)) { echo '<div class="contact-form-before">'.wp_kses_post($contact_form_before).'</div>'; } ?>

<?php if($contact_form_source == 'contact-form-7') {
    echo do_shortcode('[contact-form-7 id="'. $contact_form_id .'" title="'.esc_attr($contact_form_title).'"]');
} else {

    if(function_exists('ns_basics_template_loader')) { 
        ns_basics_template_loader('contact_form.php'); 
    } else {
        esc_html_e('Please install required plugins to display the contact form.', 'ns-core');
    }

} ?>

<?php if(!empty($contact_form_after)) { echo '<div class="contact-form-after">'.wp_kses_post($contact_form_after).'</div>'; } ?>