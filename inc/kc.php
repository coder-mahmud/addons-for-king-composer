<?php



add_action('init', 'kc_addons_init', 99 );
 
function kc_addons_init() {

    if (function_exists('kc_add_map')) 
    { 
        kc_add_map(
            array(
 
                'kc_service' => array(
                    'name' => 'Service',
                    'description' => __('Display a service with icon and text', 'kc_addons'),
                    'icon' => 'sl-paper-plane',
                    'category' => 'Content',
                    'params' => array(
                        array(
                            'name' => 'icon',
                            'label' => 'Select Icon',
                            'type' => 'icon_picker',
                            'admin_label' => true,
							'description' => __('Select an icon for service.', 'kc_addons')
                        ),
                        array(
                            'name' => 'title',
                            'label' => 'Title',
                            'type' => 'text',
                            'admin_label' => true,
                            'description' => __('Enter title for service.', 'kc_addons')
                        ),
                        array(
                            'name' => 'description',
                            'label' => 'Description',
                            'type' => 'editor',  // USAGE TEXTAREA_HTML TYPE
							'value' => base64_encode( 'The service description.' ),
                            'description' => __('The service description.', 'kc_addons')
                        ),						
                    )
                ),  // End of elemnt kc_service 
 
            )
        ); // End add map
    
    } // End if
 
}