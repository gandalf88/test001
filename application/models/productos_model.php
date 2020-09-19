
<?php  

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Productos_model extends CI_Model { 

    public function __construct(){ 
        parent::__construct(); 
        $this->load->database();  
    } 

    function getProducts(){

        $query = '
        SELECT * 
        FROM productos AS pro 
        LIMIT 0,30;';

        return $this->db->query( $query ) ;        

    }

    
    function getProductoById($id){
        $query = '
            SELECT *
            FROM productos AS pro 
            WHERE pro.idRecepDocumentosDeta = ? ';

        return $this->db->query( $query,$id ) ; 
    }
    function insertProducto($postData=null){
       
        $data = array(
            'naturalezaProducto' => $postData['naturaleza'],
            'UnidadMedida' => $postData['unidad'],
            'Detalle' => $postData['detalle'],
            'PrecioUnitario' => $postData['precio'],
        );
    
        return $this->db->insert('productos', $data);

    }

    function updateProducto($postData=null){

        $data = array(
            'naturalezaProducto' => $postData['naturaleza'],
            'UnidadMedida' => $postData['unidad'],
            'Detalle' => $postData['detalle'],
            'PrecioUnitario' => $postData['precio'],
        );
        
        $this->db->where('idRecepDocumentosDeta', $postData['id']);
        return $this->db->update('productos', $data);

    }
    function getList($postData=null){

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if($searchValue != ''){
            $searchQuery = " (Detalle like '%".$searchValue."%' ) ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('productos')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('productos')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('productos')->result();

        $data = array();

        foreach($records as $record ){
        
            $data[] = array( 
                'naturalezaProducto' => $record->naturalezaProducto,
                'CodigoComercial' => $record->CodigoComercial,
                'UnidadMedida' => $record->UnidadMedida,
                'UnidadMedidaComercial' => $record->UnidadMedidaComercial,
                'Detalle' => $record->Detalle,
                'PrecioUnitario' => $record->PrecioUnitario,
                'ImpuestoTarifa' => $record->ImpuestoTarifa,
                "accion"=> $record->idRecepDocumentosDeta 
            ); 
        }
        
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response; 
    }

} 
?> 