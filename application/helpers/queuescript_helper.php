<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
 function css_url()
 {
 $CI =& get_instance();
 return base_url() . $CI->config->item('css_path');
 }
}

/**
 * Load CSS
 * Creates the <link> tag that links all requested css file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('queue_css'))
{
    function queue_css($file)
    {   

        if(!empty($file)){

            $element = '';
            foreach ( $file as $key => $val )
                $element .= '<link rel="stylesheet" href="' . css_url() . $val . '"  rel="stylesheet" type="text/css"/>';

            echo $element;

        }
       
    }
}

/**
 * Load JS
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @param     array     $atts Optional, additional key/value attributes to include in the SCRIPT tag
 * @return  string
 */

if ( ! function_exists('js_url'))
{
 function js_url()
 {
 $CI =& get_instance();
 return base_url() . $CI->config->item('js_path');
 }
}


if ( ! function_exists('queue_js'))
{
    function queue_js( $atts = array())
    {
        $element = '';
        foreach ( $atts as $key => $val )
            $element .= '<script type="text/javascript" src="' . js_url() . $val .  '"></script>';

        echo $element;
    }
}
/* End of file queuescript_helper.php */ 