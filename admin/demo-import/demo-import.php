<?php
/*-----------------------------------------------------------------------------------*/
/*  One Click Demo Import
/*
/* NOTE: must export theme files and place in this directory (content.xml, widget.wie, etc)
/*-----------------------------------------------------------------------------------*/
if(!function_exists('ns_core_demo_import')) {
    function ns_core_demo_import() {
        return array(
            array(
                'import_file_name'             => 'Default Demo',
                'local_import_file'            => trailingslashit( get_template_directory() ) . '/admin/demo-import/content.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/admin/demo-import/widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/admin/demo-import/customizer.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory() ) .'/admin/demo-import/screenshot.png',
                'import_notice'                => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'ns-core' ),
            ),
        );
    }
    add_filter( 'pt-ocdi/import_files', 'ns_core_demo_import' );
}

/*-----------------------------------------------------------------------------------*/
/*  Add default theme pages, posts, and widgets
/*-----------------------------------------------------------------------------------*/
function ns_core_add_default_pages() {

    //Add contact page
    $post_contact_page = array(
      'ID' => 0,
      'page_template' => 'template_contact.php', //Sets the template for the page.
      'post_name' => 'contact', // The name (slug) for your post
      'post_status' => 'publish', //Set the status of the new post.
      'post_title' => esc_html__('Contact', 'ns-core'), //The title of your post.
      'post_type' => 'page', //Sometimes you want to post a page.
      'post_content' => '',
    ); 
    if (!ns_core_post_exists_by_slug('contact', 'page')) { wp_insert_post($post_contact_page); }

    //Update "Hello World" blog post
    $hello_world_content = '';
    $hello_world_content .= esc_html__('Welcome to NightLight. This is your first post. Edit or delete it, then start writing! Here are some steps to help you get started.', 'ns-core');
    $hello_world_content .= '<ul>';
    $hello_world_content .= '<li><a href="http://nightshiftcreative.co/homely-wp/doc/#configure-permalinks" target="_blank">'.esc_html__('1. Configure Permalinks', 'ns-core').'</a></li>';
    $hello_world_content .= '<li><a href="http://nightshiftcreative.co/homely-wp/doc/#create-home-page" target="_blank">'.esc_html__('2. Creating the Home Page', 'ns-core').'</a></li>';
    $hello_world_content .= '<li><a href="http://nightshiftcreative.co/homely-wp/doc/#reading-settings" target="_blank">'.esc_html__('3. Update Reading Settings', 'ns-core').'</a></li>';
    $hello_world_content .= '<li><a href="http://nightshiftcreative.co/homely-wp/doc/#create-properties-listing-page" target="_blank">'.esc_html__('4. Creating Properties Listing Page', 'ns-core').'</a></li>';
    $hello_world_content .= '</ul>';

    $post_hello_world = array(
      'ID' => 1,
      'post_name' => 'welcome', // The name (slug) for your post
      'post_status' => 'publish', //Set the status of the new post.
      'post_title' => esc_html__('Welcome to NightLight', 'ns-core'), //The title of your post.
      'post_type' => 'post', //Sometimes you want to post a page.
      'post_content' => $hello_world_content,
    );  
    if (!ns_core_post_exists_by_slug('welcome', 'post')) { wp_insert_post($post_hello_world); }

    //Add main menu
    $menu_name = 'Main Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    $menu_location = 'menu-1';

    if(!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  esc_html__('Contact', 'ns-core'),
            'menu-item-object' => 'page',
            'menu-item-object-id' => get_page_by_path('contact')->ID,
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish'));

        if( !has_nav_menu( $menu_location ) ){
            $locations = get_theme_mod('nav_menu_locations');
            $locations[$menu_location] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }

    function ns_core_auto_add_sidebar_widgets( $add_to_sidebar = array(), $ignore_sidebar_with_content = true ){

        if(empty($add_to_sidebar)) { return; }

        $sidebar_options = get_option('sidebars_widgets');

        foreach($add_to_sidebar as $sidebar_id => $widgets){

            //** do not add widgets if sidebar already has content
            if ( !empty($sidebar_options[$sidebar_id]) && $ignore_sidebar_with_content) {
                continue;
            }

            foreach ($widgets as $index => $widget){
                $widget_id_base      = $widget['id_base'];
                $widget_instance  = $widget['instance'];

                $widget_instances = get_option('widget_'.$widget_id_base);

                if(!is_array($widget_instances)){
                    $widget_instances = array();
                }

                $count = count($widget_instances)+1;

                
                $sidebar_options[$sidebar_id][] = $widget_id_base.'-'.$count;

                $widget_instances[$count] = $widget_instance;

                //** save widget options
                update_option('widget_'.$widget_id_base,$widget_instances);
            } 
        } 

        //** save sidebar options:
        update_option('sidebars_widgets',$sidebar_options);  
    }

    $sidebar_id = 'footer-widgets';
    $add_to_sidebar[$sidebar_id] = array(
        array(
           'id_base'=> 'archives',
           'instance' => array(
               'title' => esc_html__('Archived Content', 'ns-core'),
               'count' => 'on',
           )
        ),                      
        array(
           'id_base'=> 'categories',
           'instance' => array()
        ),
        array(
           'id_base'=> 'meta',
           'instance' => array()
        ),
        array(
           'id_base'=> 'pages',
           'instance' => array()
        )
    );

    ns_core_auto_add_sidebar_widgets($add_to_sidebar);

}
 add_action( 'after_switch_theme', 'ns_core_add_default_pages' );

?>