<?php


    add_action('init', 'cwp_kc_mailchimp_shortcode_init', 99 );
     
    function cwp_kc_mailchimp_shortcode_init(){
            
    global $kc;
    $kc->add_map(
        array(
            'cwp_mailchimp' => array(
                'name' => 'Mailchimp',
                'description' => __('info box shortcode', 'kingcomposer'),
                'icon' => 'cwp_mailchimp_icon',
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
            
            
            
            
            function cwp_mailchimp_shortcode_function( $atts, $content = null, $tag ) {
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
                //print_r($form_bg);
                ob_start(); 

                ?>
                <?php
                    // Play ground
                

                ?>
                


                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">


                <style type="text/css">
                    #mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.<br />       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                    .mc-field-group{display:block; width:100%; clear:both;}
                    .mce_inline_error{display:block; width:100%; clear:both;}
                    .button{background-color:#4A4A4A; color:#F9F3E5}
                    #mc_embed_signup .mc-field-group input[type="text"]{color:#000 !important}
                    #mc_embed_signup .mc-field-group input[type = "email"]{color:#000 !important}
                    #mc_embed_signup .mc-field-group{padding-bottom: 0;}
                    #mc_embed_signup .button{margin-top: 20px;}
                </style>

                <div style="background-color:<?php echo $form_bg; ?> !important;" id="mc_embed_signup">

                    <form action="https://sheddingyourexcessweight.us15.list-manage.com/subscribe/post?u=5edf476798c5cfb850e25375d&id=c24dd3d20e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

                        <div id="mc_embed_signup_scroll">
                           
                            <h2 style="color:<?php echo $title_color; ?>"><?php echo $title; ?></h2>

                            <?php if($show_first_name == 'option_1'){ ?>
                                <div class="mc-field-group">
                                    <label style="color:<?php echo $sub_title_color; ?>" for="mce-FNAME">First Name </label>
                                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="Your First Name">
                                </div>

                           <?php }?>

                            <?php if($show_last_name == 'option_1'){ ?>
                                <div class="mc-field-group">
                                   <label style="color:<?php echo $sub_title_color; ?>" for="mce-LNAME">Last Name </label>
                                   <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Your Last Name">
                                </div>
                           <?php }?>

                            <div class="mc-field-group">
                                <label style="color:<?php echo $sub_title_color; ?>" for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label> 
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your email">
                            </div>





                            <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                            <p>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups--></p>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5edf476798c5cfb850e25375d_c24dd3d20e" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="background:<?php echo $btn_bg; ?>; color:<?php echo $btn_color; ?>"></div>
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


            add_shortcode( 'cwp_mailchimp', 'cwp_mailchimp_shortcode_function' );