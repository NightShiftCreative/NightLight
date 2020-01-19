<?php
$icon_set = ns_core_load_theme_options('ns_core_icon_set');
$display_topbar = ns_core_load_theme_options('ns_core_display_topbar');
$header_container = ns_core_load_theme_options('ns_core_header_container');
$topbar_first_field = ns_core_load_theme_options('ns_core_topbar_first_field');
$topbar_first_field_custom = ns_core_load_theme_options('ns_core_topbar_first_field_custom', false, false);
$topbar_second_field = ns_core_load_theme_options('ns_core_topbar_second_field');
$topbar_second_field_custom = ns_core_load_theme_options('ns_core_topbar_second_field_custom', false, false);
$topbar_third_field = ns_core_load_theme_options('ns_core_topbar_third_field');
$topbar_third_field_custom = ns_core_load_theme_options('ns_core_topbar_third_field_custom', false, false);
$topbar_fourth_field = ns_core_load_theme_options('ns_core_topbar_fourth_field');
$topbar_fourth_field_custom = ns_core_load_theme_options('ns_core_topbar_fourth_field_custom', false, false);
$email = ns_core_load_theme_options('ns_core_email');
$phone = ns_core_load_theme_options('ns_core_phone');
$social_icons = ns_core_get_social_icons('top-bar-item left');
?>  

<?php if($display_topbar == 'true') { ?>
<div class="top-bar">
    <div class="container <?php if($header_container != 'true') { echo 'container-full'; } ?>">

        <?php
            $topbar_fields = array();
            array_push($topbar_fields, array('field' => $topbar_first_field, 'custom' => $topbar_first_field_custom));
            array_push($topbar_fields, array('field' => $topbar_second_field, 'custom' => $topbar_second_field_custom));
            array_push($topbar_fields, array('field' => $topbar_third_field, 'custom' => $topbar_third_field_custom));
            array_push($topbar_fields, array('field' => $topbar_fourth_field, 'custom' => $topbar_fourth_field_custom));

            $count = 1;

            foreach ($topbar_fields as $topbar_field) { 
                if($count <= 2) { $position = 'left'; } else { $position = 'right'; } 
                if($count == 1 || $count == 3) { echo '<div class="top-bar-'.$position.' '.$position.'">'; } ?>
                
                <?php if($topbar_field['field'] == 'email') { ?>
                    
                    <?php if(!empty($email)) { echo '<a class="top-bar-item left" href="mailto:'.$email.'">'.ns_core_get_icon($icon_set, 'envelope', '', 'mail').$email.'</a>'; } ?>
                
                <?php } else if($topbar_field['field'] == 'phone') { ?>
                    
                    <?php if(!empty($phone)) { echo '<a class="top-bar-item left" href="tel:'.$phone.'">'.ns_core_get_icon($icon_set, 'phone', 'telephone').$phone.'</a>'; } ?>
                
                <?php } else if($topbar_field['field'] == 'social') { 
                    
                    if(!empty($social_icons)) { echo wp_kses_post($social_icons); }

                } else if($topbar_field['field'] == 'member') {

                    //start member actions
                    $member_actions_class = 'top-bar-item top-bar-member-actions left';
                    echo ns_core_get_header_member_actions($member_actions_class);

                } else if($topbar_field['field'] == 'custom') {
                    if(!empty($topbar_field['custom'])) { echo '<div class="top-bar-item top-bar-item-custom left">'.do_shortcode($topbar_field['custom']).'</div>'; }
                } ?>
                <?php if($count == 2 || $count == 4) { echo '</div>'; } ?>
                <?php $count++; ?>
            <?php }   
            echo '</div>';
        ?>
        <div class="clear"></div>
        
    </div><!-- end container -->
</div><!-- end topbar -->
<?php } ?>