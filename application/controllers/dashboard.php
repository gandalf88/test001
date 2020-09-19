<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
            'libs/jquery-vectormap/jquery-jvectormap-1.2.2.css',
            'css/bootstrap.min.css','css/icons.min.css','css/app.css'); 

        $dataFooter['js'] = array('libs/peity/jquery.peity.min.js',
            'libs/apexcharts/apexcharts.min.js',
            'libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js',
            'libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js',
            'js/pages/dashboard-1.init.js',
            'js/app.min.js'); 

        // $data['usuarios'] = $this->usuarios->getUsers();
        $data['title'] = "Bienvenido al sistema!";

        
        $data['username'] = $_SESSION['username'];
        $data['tipo_usuario'] = validateSession();

        $this->load->view('header/header', $dataHeader);
        $this->load->view('dashboard/main', $data);
        $this->load->view('footer/footer', $dataFooter);

    }
    public function logout(){

        unset(
            $_SESSION['username'],
            $_SESSION['email'],
            $_SESSION['cedula'],                       
            $_SESSION['telefono'],    
            $_SESSION['tipo_usuario'],                                           
            $_SESSION['logged_in']
        );

        redirect(base_url().'login');

    }
    public function login() 
    {
        $this->load->view('dashboard/login');
        if(!empty($_SESSION['username'])){
            redirect(base_url().'adm_menu');
        } 
    }
    public function formLogin()
    {

        $correo = $this->input->post('email');

        $password = md5($this->input->post('password'));
        
        if($correo == 'admin@admin.com' && 
            $password == 'e10adc3949ba59abbe56e057f20f883e'){
            
                $newdata = array(
                    'id'  => '5',    
                    'username'  => 'Admin Admin',
                    'email'     => 'admin@admin.com',
                    'cedula'    => '34807',                       
                    'telefono'  => '+1 (995) 553-2048',    
                    'tipo_usuario'  => '2',                                           
                    'logged_in' => TRUE
                );

        }

        $this->session->set_userdata($newdata);
        redirect(base_url().'adm_menu');

    }
}
