<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('productos_model');
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

        $data['title'] = "Ventas de Pizza Shop Venezuela";
        $tipoUsuario = validateSession();
        $this->load->view('header/header', $dataHeader);
        $this->load->view('ventas/main', $data);
        $this->load->view('footer/footer',  $dataFooter);

    }
    public function lista() 
    {
        $dataHeader['css'] = array(
            'libs/datatables/dataTables.bootstrap4.css',
            'libs/datatables/responsive.bootstrap4.css',
            'libs/datatables/buttons.bootstrap4.css',
            'libs/datatables/select.bootstrap4.css',
            'css/bootstrap.min.css','css/icons.min.css','css/app.css',
            'libs/custombox/custombox.min.css','libs/sweetalert2/sweetalert2.min.css'); 

        $dataFooter['js'] = array('js/vendor.min.js',
        'libs/datatables/jquery.dataTables.min.js',
        'libs/datatables/dataTables.bootstrap4.js',
        'libs/datatables/dataTables.responsive.min.js',
        'libs/datatables/responsive.bootstrap4.min.js',
        'libs/datatables/dataTables.buttons.min.js',
        'libs/datatables/buttons.bootstrap4.min.js',
        'libs/datatables/buttons.html5.min.js',
        'libs/datatables/buttons.flash.min.js',
        'libs/datatables/buttons.print.min.js',
        'libs/datatables/dataTables.keyTable.min.js',
        'libs/datatables/dataTables.select.min.js',
        'libs/pdfmake/pdfmake.min.js',
        'libs/pdfmake/vfs_fonts.js',
        'js/lista_productos/script_lista.js',
        'js/app.min.js',
        'libs/custombox/custombox.min.js',
        'libs/parsleyjs/parsley.min.js','libs/sweetalert2/sweetalert2.min.js' ); 
            
        $data['title'] =  "Listado de pizzas!";
        $tipoUsuario = validateSession();
        $this->load->view('header/header', $dataHeader);
        $this->load->view('ventas/main', $data);
        $this->load->view('footer/footer', $dataFooter);
    }        
    public function proceso_de_venta() 
    {
        $dataHeader['css'] = array(
            'libs/datatables/dataTables.bootstrap4.css',
            'libs/datatables/responsive.bootstrap4.css',
            'libs/datatables/buttons.bootstrap4.css',
            'libs/datatables/select.bootstrap4.css',
            'css/bootstrap.min.css','css/icons.min.css','css/app.css',
            'libs/custombox/custombox.min.css','libs/sweetalert2/sweetalert2.min.css'); 

        $dataFooter['js'] = array('js/vendor.min.js',
        'libs/datatables/jquery.dataTables.min.js',
        'libs/datatables/dataTables.bootstrap4.js',
        'libs/datatables/dataTables.responsive.min.js',
        'libs/datatables/responsive.bootstrap4.min.js',
        'libs/datatables/dataTables.buttons.min.js',
        'libs/datatables/buttons.bootstrap4.min.js',
        'libs/datatables/buttons.html5.min.js',
        'libs/datatables/buttons.flash.min.js',
        'libs/datatables/buttons.print.min.js',
        'libs/datatables/dataTables.keyTable.min.js',
        'libs/datatables/dataTables.select.min.js',
        'libs/pdfmake/pdfmake.min.js',
        'libs/pdfmake/vfs_fonts.js',
        'js/lista_productos/scripts.js',
        'js/app.min.js',
        'libs/custombox/custombox.min.js',
        'libs/parsleyjs/parsley.min.js','libs/sweetalert2/sweetalert2.min.js' ); 
            
        $data['title'] = "test001";
        $data['fecha'] = date('Y-m-d');
        $data['username'] = $_SESSION['username'];
        $data['id'] = $_SESSION['id'];
        $tipoUsuario = validateSession();

        // getProducts
        $this->load->view('header/header', $dataHeader);
        $this->load->view('ventas/proceso', $data);
        $this->load->view('footer/footer', $dataFooter);
    }    
    public function get_list(){
            
        echo json_encode($this->productos_model->getProducts()->result());
    }
    public function add_venta(){
                 
        $postData = $this->input->post();
    
        echo json_encode($this->productos_model->addVenta($postData));
    }

}
