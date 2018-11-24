<?php
/*
Plugin Name: KC Addons for Mailchimp
Plugin URI: https://coderwp.com/plugins/
Description: A addon for adding mailchimp form
Author: Mahmudul Hasan
Version: 1.0
*/


    add_action('init', 'cwp_infobox_shortcode_init', 99 );
     
    function cwp_infobox_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'akc_infobox' => array(
                'name' => 'Mailchimp',
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
                            "type" => "select",
                            "label" => __("Select Style", "kingcomposer"),
                            "name" => "style",
                            'options' => array(
                                'style-1'  => 'Style 1',
                                'style-2'  => 'Style 2',
                                'style-3'  => 'Style 3',
                                'style-4'  => 'Style 4',
                                'style-5'  => 'Style 5',
                                'style-6'  => 'Style 6',
                            ),                        
                            "value" => "style-1",
                            "admin_label" => true,
                            "description" => __("", "kingcomposer")
                        ),
                        
                        array(
                            'type' => 'select',
                            'label' => __( 'Display Icon as', 'kingcomposer' ),
                            'name' => 'display_as',
                            'options' => array(
                                'circle'  => 'Circle',
                                'square'  => 'Square',
                            ),                        
                            "value" => "circle",
                            'relation' => array(
                                'parent' => 'style',
                                'show_when' => 'style-6',
                            ),                        
                        ),
                                            
                        array(
                            "type" => "select",
                            "label" => __("Icon Type", "kingcomposer"),
                            "name" => "icon_type",
                            'options' => array(
                                'icon'  => 'Icon (select the icon below)',
                                'image'  => 'Image (choose the icon image below)',
                            ),                        
                            "value" => "icon",
                            "description" => __("", "kingcomposer")
                        ),                   
                        array(
                            "type" => "attach_image",
                            "label" => __("Icon Image", "asvc"),
                            "name" => "icon_image",
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'image',
                            ),                        
                            "description" => __("Select image from media library.", "kingcomposer")
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
                            "type" => "number_slider",
                            "label" => __("Icon Size", "kingcomposer"),
                            "name" => "icon_size",
                            'options' => array(
                                'min' => 16,
                                'max' => 300,
                                'unit' => 'px',
                                'show_input' => true
                            ),                        
                            "value" => 42,
                            "description" => __("Provide icon size", "kingcomposer"),
                        ),
                        
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Color", "kingcomposer" ),
                            "name"  => "icon_color",
                            "value"       => "#343434",
                            "description" => __( "Choose icon color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                        ),                    
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Border Color", "kingcomposer" ),
                            "name"  => "icon_border_color",
                            "value"       => "#343434",
                            "description" => __( "Choose icon border color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),                        
                        ),
                       
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Background Color", "kingcomposer" ),
                            "name"  => "icon_bg_color",
                            "value"       => "#ffffff",
                            "description" => __( "Choose icon bg color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                        ),                    
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Icon Hover Color", "kingcomposer" ),
                            "name"  => "icon_hover_color",
                            "value"       => "#1293d4",
                            "description" => __( "Choose icon hover color", "kingcomposer" ),
                            'relation' => array(
                                'parent' => 'icon_type',
                                'show_when' => 'icon',
                            ),
                        ),                    
                                                                 
                        array(
                            "type" => "textarea",
                            "label" => __("Description", "kingcomposer"),
                            "name" => "content",
                            "value" => "",
                            "description" => __("Provide the description for this icon box.", "kingcomposer"),
                        ),
                        array(
                            "type" => "select",
                            "label" => __("On Click", "kingcomposer"),
                            "name" => "on_click",
                            'options' => array(
                                 'none' => 'No Link',
                                 'box' => 'Complete Box',
                            ),
                            "description" => __("Select whether to use color for icon or not.", "kingcomposer")
                        ),
                        array(
                            "type" => "link",
                            "label" => __("Add Link", "kingcomposer"),
                            "name" => "link",
                            "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "kingcomposer"),
                            'relation' => array(
                                'parent' => 'on_click',
                                'show_when' => 'box',
                            ),
                        ),                    

                        array(
                            "type" => "textfield",
                            "label" => __("Extra class name", "kingcomposer"),
                            "name" => "extraclass",
                            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "kingcomposer")
                        ),                     
                        
                    ),                
                

/*
                    
                    'Typhography' => array(   
                                         
                        array(
                            'type'             => 'number_slider',
                            'label'          => __( 'Title Font Size', 'kingcomposer' ),
                            'name'       => 'title_f_size',
                            'options' => array(
                                'min' => 5,
                                'max' => 50,
                                'unit' => 'px',
                                'show_input' => true
                            ),
                            "value" => 16,
                            "description" => __("Chose Title Font Size as Pixel. Default is 18px", "kingcomposer"),
                        ),

                        array(
                            'type'             => 'number_slider',
                            'label'          => __( 'Description Font Size', 'kingcomposer' ),
                            'name'       => 'desc_f_size',
                            'options' => array(
                                'min' => 5,
                                'max' => 50,
                                'unit' => 'px',
                                'show_input' => true
                            ),
                            "value" => 14,
                            "description" => __("Chose Description Font Size as Pixel. Default is 14px", "kingcomposer"),
                        ),

                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Title color", "kingcomposer" ),
                            "name"  => "title_color",
                            "description" => __( "Choose text color", "kingcomposer" ),
                        ),
                        array(
                            "type"        => "color_picker",
                            "label"     => __( "Description color", "kingcomposer" ),
                            "name"  => "descr_color",
                            "description" => __( "Choose text color", "kingcomposer" ),
                        ),                       
                     
                        
                    ),                    


*/
                    
                )
            )
        )
    );        
}
            
            
            
            
            function cwp_infobox_shortcode_function( $atts, $content = null, $tag ) {
                extract( shortcode_atts( array(
                    'style'    => '',
                    'display_as'    => '',
                    'icon_type'       => '',
                    'icon'            => '',
                    'icon_image'      => '',
                    'icon_fontawesome' => '',
                    'icon_size' => '',
                    'icon_color' => '#343434',
                    'icon_border_color' => '#343434',
                    'icon_bg_color' => '#ffffff',
                    'icon_hover_color' => '#1293d4',
                    'title' => 'Title Here',
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
                ob_start(); 

                ?>

                


                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                    #mc_embed_signup{background:rgba(255,255,255,.5) !important; clear:left; font:14px Helvetica,Arial,sans-serif; }<br />  /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.<br />       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */<br />       .mc-field-group{display:block; width:100%; clear:both;}<br />       .mce_inline_error{display:block; width:100%; clear:both;}<br />     .button{background-color:#4A4A4A; color:#F9F3E5}<br />      #mc_embed_signup .mc-field-group input[type="text"]{color:#000 !important}<br />    #mc_embed_signup .mc-field-group input[type = "email"]{color:#000 !important}<br />
                </style>

                <div id="mc_embed_signup">

                    <form action="https://sheddingyourexcessweight.us15.list-manage.com/subscribe/post?u=5edf476798c5cfb850e25375d&id=c24dd3d20e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

                        <div id="mc_embed_signup_scroll">
                           
                            <h2><?php echo $title; ?></h2>

                            <div class="mc-field-group">
                                <label for="mce-FNAME">First Name </label>
                                <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                            </div>

                            <div class="mc-field-group">
                                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label> 
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div>

                            <div class="mc-field-group">
                               <label for="mce-LNAME">Last Name </label>
                               <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                            </div>

                            <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                            <p>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups--></p>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5edf476798c5cfb850e25375d_c24dd3d20e" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>

                    </form>


                </div>
                <script type=&#039;text/javascript&#039; src=&#039;//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js&#039;></script>
                <script type=&#039;text/javascript&#039;>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]=&#039;EMAIL&#039;;ftypes[0]=&#039;email&#039;;fnames[1]=&#039;FNAME&#039;;ftypes[1]=&#039;text&#039;;fnames[2]=&#039;LNAME&#039;;ftypes[2]=&#039;text&#039;;}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                <!--End mc_embed_signup-->
                <span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span>


            <?php

            return ob_get_clean();

            }


            add_shortcode( 'akc_infobox', 'cwp_infobox_shortcode_function' );