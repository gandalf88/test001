<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // Load model
        $this->load->model('proveedores_model');
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
        'js/proveedores/scripts.js',
        'js/app.min.js',
        'libs/custombox/custombox.min.js',
        'libs/parsleyjs/parsley.min.js','libs/sweetalert2/sweetalert2.min.js' ); 

        $data['title'] = "Proveedores de il Point Venezuela";

        $tipoUsuario = validateSession();

        $this->load->view('header/header', $dataHeader);
        $this->load->view('proveedores/main', $data);
        $this->load->view('footer/footer', $dataFooter);
        $this->load->view('proveedores/modal_add_proveedores');
    }
    

    public function getProveedores(){
                
        $postData = $this->input->post();
        $data = $this->proveedores_model->getProveedoresById($postData);

        echo json_encode($data->result()[0]);

    }

    public function get_list(){
               
        $postData = $this->input->post();
        
        $data = $this->proveedores_model->getProveedores($postData);

        echo json_encode($data);
    }
    public function insert_proveedores(){

        $postData = $this->input->post();
        $data = $this->proveedores_model->insertProveedores($postData);
        echo json_encode( $postData);

    }
    public function update_proveedores(){

        // POST data
        $postData = $this->input->post();
        $data = $this->proveedores_model->updateProveedores($postData);

        echo json_encode($data);

    }
    
    public function delete_proveedores(){

        // POST data
        $postData = $this->input->post();
        $data = $this->proveedores_model->deleteProveedores($postData);

        echo json_encode($data);

    }
}
