
<?php  

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Usuarios_model extends CI_Model { 

        public function __construct(){ 
             parent::__construct(); 
             $this->load->database();  
         } 
    
        public function validateUser($correo, $password){

            $query = '
                SELECT usu.id AS id,usu.nombres AS nombres, usu.apellidos AS apellidos, 
                    usu.cedula AS cedula, 
                    usu.correo AS correo, usu.telefono AS telefono, 
                    usu.tbl_tipo_usuarios_id AS tipo_usuario
                FROM tbl_usuarios AS usu 
                WHERE usu.activo = 1 
                    AND usu.correo = ? 
                    AND usu.password = ? ';
     
                return $this->db->query( $query, array($correo, $password) ) ; 

        } 
        function getUserById($id){
            $query = '
            SELECT usu.nombres AS nombres, usu.apellidos AS apellidos, 
                usu.cedula AS cedula, 
                usu.correo AS correo, usu.telefono AS telefono, 
                usu.tbl_tipo_usuarios_id AS tipo_usuario
            FROM tbl_usuarios AS usu 
            WHERE usu.id = ? ';
 
            return $this->db->query( $query,$id ) ; 
        }
        function insertUser($postData=null){
          
            $data = array(
                'nombres' => $postData['nombres'],
                'apellidos' => $postData['apellidos'],
                'cedula' =>  $postData['cedula'],
                'correo'=> $postData['correo'],
                'telefono'=> $postData['telefono'],
                'password'=> md5($postData['contrasenia']),
                'activo'=> '1',                
                'tbl_tipo_usuarios_id'=>$postData['tipo']
            );
        
            return $this->db->insert('tbl_usuarios', $data);

        }

        function updateUser($postData=null){

            $data = array(
                'nombres' => $postData['nombres'],
                'apellidos' => $postData['apellidos'],
                'cedula' =>  $postData['cedula'],
                'correo'=> $postData['correo'],
                'telefono'=> $postData['telefono'],
                'password'=> md5($postData['contrasenia']),
                'tbl_tipo_usuarios_id'=>$postData['tipo']
            );
            
            $this->db->where('id', $postData['id']);
            return $this->db->update('tbl_usuarios', $data);

        }

        function keyUser($postData=null){
            $data = array('activo'=> $postData['status']);
            $this->db->where('id', $postData['id']);
            return $this->db->update('tbl_usuarios', $data);
        }

        function getUsers($postData=null){

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
                $searchQuery = " (nombres like '%".$searchValue."%' or 
                cedula like '%".$searchValue."%' or 
                correo like'%".$searchValue."%' ) ";
            }


            ## Total number of records without filtering
            $this->db->select('count(*) as allcount');
            $records = $this->db->get('tbl_usuarios')->result();
            $totalRecords = $records[0]->allcount;

            ## Total number of record with filtering
            $this->db->select('count(*) as allcount');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $records = $this->db->get('tbl_usuarios')->result();
            $totalRecordwithFilter = $records[0]->allcount;

            
            ## Fetch records
            $this->db->select('*');
            if($searchQuery != '')
            $this->db->where($searchQuery);
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get('tbl_usuarios')->result();

            $data = array();

            foreach($records as $record ){
            
                $data[] = array( 
                    "nombres"=>$record->nombres,
                    "apellidos"=>$record->apellidos,
                    "cedula"=>$record->cedula,
                    "correo"=>$record->correo,
                    "telefono"=>$record->telefono,
                    "tipo_usuario"=> ($record->tbl_tipo_usuarios_id==2)?'Administrador':'Vendedor',
                    "accion"=> json_encode(array(
                        "id" =>  $record->id,
                        "status" =>   $record->activo
                    )) 
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