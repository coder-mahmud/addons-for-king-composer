<?php

    add_action('init', 'cwp_kc_testimonial_shortcode_init', 101 );
     
    function cwp_kc_testimonial_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'cwp_testimonial' => array(
                'name' => 'Testimonial',
                'description' => __('Testimonial', 'kingcomposer'),
                'icon' => 'cwp_testimonial_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(
                
                
                    'general' => array(                        


                        array(
                            "type"        => "attach_image",
                            "label"     => __( "Client Image", 'kingcomposer' ),
                            "name"  => "client_image",
                        ),

                        array(
                            "type"        => "textarea",
                            "label"     => __( "Testimonial Text", 'kingcomposer' ),
                            "name"  => "testi_text",
                        ),

                        array(
                            'type' => 'text',
                            'label' => __( 'Client name', 'kingcomposer' ),
                            'name' => 'client_name',
                        ),

                        array(
                            'name' => 'client_designation',
                            'label' => 'Client designation',
                            'type' => 'text',
                        ),

                       
                        array(
                            'name' => 'text_fz',
                            'label' => 'Text Font Size',
                            'type' => 'number_slider',
                            "value" => "18",
                        ),

                       
                        array(
                            'name' => 'name_fz',
                            'label' => 'Client Name Font Size',
                            'type' => 'number_slider',
                            'value' => '15',
                        ),
 
                        
                    ),
                    
                )
            )
        )
    );        
}
            
            
            
            
            function cwp_testimonial_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'client_image'    => '',
                    'testi_text'    => '',
                    'client_name' => '',
                    'client_designation' => '',
                    'text_fz' => '#ddd',
                    'name_fz' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'testimonial-css', plugins_url( '/css/testimonial.css',  __FILE__) );
                wp_enqueue_style( 'testimonial-css' );
                
                
                $client_image = wp_get_attachment_image_src( $client_image, 'client_image' );
                $client_image = $client_image[0];



                //echo $show_first_name;
                //print_r($client_image);
                ob_start(); 

                ?>

                <style>


                </style>


                <div class="testimonial_wrapper">
                    <div class="img_holder">
                        <img src="<?php echo $client_image; ?>" alt="">
                    </div>
                    <div class="text_holder">
                        <p class="quote"><?php echo $testi_text; ?></p>
                        <p class="name"> - <?php echo $client_name; ?></p>
                        <p class="designation"><?php echo $client_designation; ?></p>
                        
                    </div>          
                </div>


                <?php
                return ob_get_clean();

            }


            add_shortcode( 'cwp_testimonial', 'cwp_testimonial_shortcode_function' );