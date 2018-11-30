<?php


    add_action('init', 'cwp_kc_iconbox_shortcode_init', 101 );
     
    function cwp_kc_iconbox_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'cwp_iconbox' => array(
                'name' => 'Infobox with Icon',
                'description' => __('info box shortcode', 'kingcomposer'),
                'icon' => 'akc_infobox_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(
                
                
                    'general' => array(                        


                        array(
                            "type"        => "text",
                            "label"     => __( "Title", 'kingcomposer' ),
                            "name"  => "title",
                            "value"       => "",
                        ),

                         array(
                            'name' => 'show_first_name',
                            'label' => 'Show First Name',

                            'type' => 'radio',  // USAGE RADIO TYPE
                            'options' => array(    // REQUIRED
                                'option_1' => 'Yes',
                                'option_2' => 'No'
                            ),
                        ),


                         array(
                            'name' => 'show_last_name',
                            'label' => 'Show Last Name',

                            'type' => 'radio',  // USAGE RADIO TYPE
                            'options' => array(    // REQUIRED
                                'option_1' => 'Yes',
                                'option_2' => 'No'
                            ),
                        ),

                        array(
                            'name' => 'form_bg',
                            'label' => 'Form Background Color',
                            'type' => 'color_picker',
                        ),

                        array(
                            'name' => 'title_color',
                            'label' => 'Title Text Color',
                            'type' => 'color_picker',
                        ),

                        array(
                            'name' => 'sub_title_color',
                            'label' => 'Field Label Color',
                            'type' => 'color_picker',
                        ),

                        array(
                            'name' => 'btn_color',
                            'label' => 'Submit Button Text Color',
                            'type' => 'color_picker',
                        ),

                        array(
                            'name' => 'btn_bg',
                            'label' => 'Submit Button Background Color',
                            'type' => 'color_picker',
                        ),                   
                        
                    ),
                    
                )
            )
        )
    );        
}
            
            
            
            
            function cwp_iconbox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'show_first_name'    => '',
                    'show_last_name'    => '',
                    'title' => 'Title Here',
                    'form_bg'       => '',
                    'title_color'       => '',
                    'sub_title_color'       => '',
                    'btn_color'       => '',
                    'btn_bg'       => '',



                    'icon'            => '',
                    'icon_image'      => '',
                    'icon_fontawesome' => '',
                    'icon_size' => '',
                    'icon_color' => '#343434',
                    'icon_border_color' => '#343434',
                    'icon_bg_color' => '#ffffff',
                    'icon_hover_color' => '#1293d4',
                    'content' => '',
                    'on_click' => '',
                    'link' => '',
                    'bg_color' => '',
                    'title_f_size' => '18',
                    'desc_f_size' => '14',
                    'title_color' => '',
                    'descr_color' => '',
                    'extraclass' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'infobox-css', plugins_url( '/css/info-box.css',  __FILE__) );
                wp_enqueue_style( 'infobox-css' );
                
                $icon_image = wp_get_attachment_image_src( $icon_image, 'full' );
                $link    = kc_parse_link($link);
                
                $output ='';

                //echo $show_first_name;
                print_r($form_bg);
                ob_start(); 

                ?>
                <?php
                    // Play ground
                

                ?>
                <style>
                    .icon_box{border:1px solid #0fe1cb; text-align: center; border-radius: 5px; padding: 50px 0;}
                    .icon_box i{font-size: 50px; line-height: 50px; color:#0fe1cb;}
                    .icon_box .text{font-size: 25px; color:#0fe1cb;}
                    .icon_box:hover .text,.icon_box:hover i{color:#0db7a5;}
                    .icon_box:hover{border:1px solid #0db7a5;}
                </style>




                <div class="icon_box">
                    <i class="fa-archive"></i>
                    <p class="text">asdfsadfa asdfasdf asd</p>
                </div>

            <?php

            return ob_get_clean();

            }


            add_shortcode( 'cwp_iconbox', 'cwp_iconbox_shortcode_function' );