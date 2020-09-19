<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct(){

        parent::__construct();
        // Load model
        $this->load->model('productos_model');
    }

    public function index() 
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
        'js/productos/scripts.js',
        'js/app.min.js',
        'libs/custombox/custombox.min.js',
        'libs/parsleyjs/parsley.min.js','libs/sweetalert2/sweetalert2.min.js' ); 

        $tipoUsuario = validateSession();
        $data['title'] = "Área de Productos";
        $this->load->view('header/header', $dataHeader);
        $this->load->view('productos/main', $data);
        $this->load->view('footer/footer', $dataFooter);
        $this->load->view('productos/modal_add_productos');

    }
    public function api() 
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
        'js/productos/scripts.js',
        'js/app.min.js',
        'libs/custombox/custombox.min.js',
        'libs/parsleyjs/parsley.min.js','libs/sweetalert2/sweetalert2.min.js' ); 

        $tipoUsuario = validateSession();
        $data['title'] = "API Buscador";
        $data['search_hacienda'] = "API Buscador Hacienda";
        $this->load->view('header/header', $dataHeader);
        $this->load->view('productos/main_api', $data);
        $this->load->view('footer/footer', $dataFooter);
        
    }
    public function get_list(){
        $postData = $this->input->post();

        echo json_encode($this->productos_model->getList($postData));
    }
    public function getProducto(){           
        $postData = $this->input->post();
        $data = $this->productos_model->getProductoById($postData);
        echo json_encode($data->result()[0]);
    }
    public function insert_producto(){
        $postData = $this->input->post();
        $data = $this->productos_model->insertProducto($postData);
        echo json_encode( $postData);
    }
    public function update_producto(){
        $postData = $this->input->post();
        $data = $this->productos_model->updateProducto($postData);
        echo json_encode($data);
    }

}

?> 