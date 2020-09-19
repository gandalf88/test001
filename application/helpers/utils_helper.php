<?php
if (!defined('BASEPATH')){exit('No direct script access allowed');}

if (!function_exists('validateSession')) {

    function validateSession() {

        $ci =& get_instance();        
        $ci->load->helper('url','session');
        $ci->load->library('session');

        if($_SESSION['username'] == ''){
    
            redirect(base_url().'login');
        }else{
             return ($_SESSION['tipo_usuario']==2)?
                       'Administrador':'Vendedor';
        }
            
        
    }

}

?>