<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('usuarios_model');
        $this->load->helper('url');
    }
    
    public function index() 
    {

        $dataHeader['css'] = array(
            'site/css/bootstrap.min.css',
            'site/css/LineIcons.css',
            'site/css/default.css',
            'site/css/style.css'); 

        $dataFooter['js'] = array('site/js/vendor/modernizr-3.6.0.min.js',
        'site/js/vendor/jquery-1.12.4.min.js',
        'site/js/bootstrap.min.js',
        'site/js/popper.min.js',
        'site/js/jquery.magnific-popup.min.js',
        'site/js/parallax.min.js',
        'site/js/waypoints.min.js',
        'site/js/jquery.counterup.min.js',
        'site/js/jquery.appear.min.js',
        'site/js/scrolling-nav.js',
        'site/js/jquery.easing.min.js',
        'site/js/main.js'); 

        $this->load->view('site/header/header', $dataHeader);
        $this->load->view('site/main');
        $this->load->view('site/footer/footer', $dataFooter);

    }

}
