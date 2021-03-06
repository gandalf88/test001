<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){

        parent::__construct();
        // Load model
        $this->load->model('usuarios_model');
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
        'js/usuarios/scripts.js',
        'js/app.min.js',
        'libs/custombox/custombox.min.js',
        'libs/parsleyjs/parsley.min.js','libs/sweetalert2/sweetalert2.min.js' ); 


        $data['title'] = "Usuarios del sistema";
        $tipoUsuario = validateSession();

        $this->load->view('header/header', $dataHeader);
        $this->load->view('usuarios/main', $data);
        $this->load->view('footer/footer', $dataFooter);
        $this->load->view('usuarios/modal_add_user');
        
    }

    public function get_list(){
               
        $postData = $this->input->post();
        
        $data = $this->usuarios_model->getUsers($postData);

        echo json_encode($data);
    }
    public function insert_user(){

        $postData = $this->input->post();
        $data = $this->usuarios_model->insertUser($postData);
        echo json_encode( $postData);

    }
    public function update_user(){

        // POST data
        $postData = $this->input->post();
        $data = $this->usuarios_model->updateUser($postData);

        echo json_encode($data);

    }

    public function lock_user(){
        
        // POST data
        $postData = $this->input->post();
        $data = $this->usuarios_model->keyUser($postData);

        echo json_encode($data);

    }

    public function getUser(){

        // POST data
        $postData = $this->input->post();
        $data = $this->usuarios_model->getUserById($postData);

        echo json_encode($data->result()[0]);

    }

}
?>