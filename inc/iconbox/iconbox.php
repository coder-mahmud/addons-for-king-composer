<?php

    add_action('init', 'cwp_kc_iconbox_shortcode_init', 101 );
     
    function cwp_kc_iconbox_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'cwp_iconbox' => array(
                'name' => 'Infobox with Icon',
                'description' => __('info box shortcode', 'kingcomposer'),
                'icon' => 'cwp_infobox_icon',
                'css_box' => true,
                'category' => 'Addons KingComposer',
                'params' => array(
                
                
                    'general' => array(                        


                        array(
                            "type"        => "text",
                            "label"     => __( "Text", 'kingcomposer' ),
                            "name"  => "text",
                            "value"       => "Some Text Here",
                        ),

                        array(
                            "type"        => "number_slider",
                            "label"     => __( "Text font size", 'kingcomposer' ),
                            "name"  => "text_fz",
                            "value"       => "25",
                        ),

                        array(
                            'type' => 'icon_picker',
                            'label' => __( 'Icon', 'kingcomposer' ),
                            'name' => 'icon_fontawesome',
                            'value' => 'fa fa-camera',
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                            'description' => __( 'Select icon from library.', 'kingcomposer' ),
                        ),

                        array(
                            'name' => 'color',
                            'label' => 'Icon Color',
                            'type' => 'color_picker',
                            "value" => "#CFCFCF",
                        ),

                       
                        array(
                            'name' => 'text_color',
                            'label' => 'Text Color',
                            'type' => 'color_picker',
                            "value" => "#656464",
                        ),

                       
                        array(
                            'name' => 'hover_color',
                            'label' => 'Hover Color',
                            'type' => 'color_picker',
                            'value' => '#1E73BE',
                        ),

                       
                        array(
                            'name' => 'bdr_color',
                            'label' => 'Boder Color',
                            'type' => 'color_picker',
                            "value" => "#CFCFCF",
                        ),


                        
                    ),
                    
                )
            )
        )
    );        
}
            
            
            
            
            function cwp_iconbox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'icon_fontawesome'    => '',
                    'text'    => '',
                    'color' => '',
                    'hover_color' => '',
                    'bdr_color' => '#ddd',
                    'text_fz' => '',
                    'text_color' => '',
                    
                ), $atts ) );
                
                
                wp_register_style( 'inconbox-css', plugins_url( '/css/icon-box.css',  __FILE__) );
                wp_enqueue_style( 'inconbox-css' );
                
                $icon_image = wp_get_attachment_image_src( $icon_image, 'full' );
                $link = kc_parse_link($link);


                //echo $show_first_name;
                //print_r($hover_color);
                ob_start(); 

                ?>

                <style>
                    .icon_box{ text-align: center; border-radius: 5px; }
                    .icon_box i{font-size: 50px; line-height: 50px;}
                    .icon_box .text{font-size: 25px; color:#0fe1cb;}
                </style>


                <div style="border:1px solid <?php echo $bdr_color ?>;" onMouseOver="this.style.borderColor='<?php echo $hover_color; ?>'" onMouseOut="this.style.borderColor='<?php echo $bdr_color; ?>'" class="icon_box">
                    <div style = "color:<?php echo $color; ?>" class="hover_wrapper" onMouseOver="this.style.backgroundColor='<?php echo $hover_color; ?>'"  onMouseOut="this.style.backgroundColor='unset'">
                        
                        <i style="color:<?php echo $color; ?>" class="<?php echo  $icon_fontawesome ?>"></i>
                        <p style="color:<?php echo $text_color; ?>; font-size:<?php echo $text_fz.'px'; ?> " class="text"><?php echo $text; ?></p>
                    </div>

                </div>


                <?php
                return ob_get_clean();

            }


            add_shortcode( 'cwp_iconbox', 'cwp_iconbox_shortcode_function' );