<?php
$header_vars = ns_core_load_header_settings();
$social_icons = ns_core_get_social_icons('top-bar-item left');
?>  

<?php if($header_vars['display_topbar'] == 'true') { ?>
<div class="top-bar">
    <div class="container <?php if($header_vars['header_container'] != 'true') { echo 'container-full'; } ?>">

        <?php
            $topbar_fields = array();
            array_push($topbar_fields, array('field' => $header_vars['topbar_first_field'], 'custom' => $header_vars['topbar_first_field_custom']));
            array_push($topbar_fields, array('field' => $header_vars['topbar_second_field'], 'custom' => $header_vars['topbar_second_field_custom']));
            array_push($topbar_fields, array('field' => $header_vars['topbar_third_field'], 'custom' => $header_vars['topbar_third_field_custom']));
            array_push($topbar_fields, array('field' => $header_vars['topbar_fourth_field'], 'custom' => $header_vars['topbar_fourth_field_custom']));

            $count = 1;

            foreach ($topbar_fields as $topbar_field) { 
                if($count <= 2) { $position = 'left'; } else { $position = 'right'; } 
                if($count == 1 || $count == 3) { echo '<div class="top-bar-'.$position.' '.$position.'">'; } ?>
                
                <?php if($topbar_field['field'] == 'email') { ?>
                    
                    <?php if(!empty($header_vars['email'])) { echo '<a class="top-bar-item left" href="mailto:'.$header_vars['email'].'">'.ns_core_get_icon($header_vars['icon_set'], 'envelope', '', 'mail').$header_vars['email'].'</a>'; } ?>
                
                <?php } else if($topbar_field['field'] == 'phone') { ?>
                    
                    <?php if(!empty($header_vars['phone'])) { echo '<a class="top-bar-item left" href="tel:'.$header_vars['phone'].'">'.ns_core_get_icon($header_vars['icon_set'], 'phone', 'telephone').$header_vars['phone'].'</a>'; } ?>
                
                <?php } else if($topbar_field['field'] == 'social') { 
                    
                    if(!empty($social_icons)) { echo $social_icons; }
                
                } else if($topbar_field['field'] == 'member') {

                    //start member actions
                    $member_actions_class = 'top-bar-item top-bar-member-actions left';
                    echo ns_core_get_header_member_actions($member_actions_class);

                } else if($topbar_field['field'] == 'custom') {
                    if(!empty($topbar_field['custom'])) { echo '<div class="top-bar-item left">'.$topbar_field['custom'].'</div>'; }
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