<?
function setUsuario($request){
    $usuarios=new Usuario();
return $usuarios->setUsuario($request);
}
function getUsuario($request){
    $usuarios=new Usuario();
return $usuarios->getUsuario($request);
}
class Usuario{

    private $conexion;
    
    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }
    function setUsuario($request){
        $usuarios;
        $response;
        $usuario=json_decode($request->getBody());
        $sql="INSERT INTO usuarios(id,contrasena) VALUES(:id,:contrasena)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id",$usuario->id);
            $statement->bindParam("contrasena",$usuario->contrasena);
            $statement->execute();
            $response="El usuario se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function getUsuario($request){
        $usuarios;
        $response;
        $usuario=json_decode($request->getBody());
        $sql="SELECT * FROM usuarios WHERE id =:id and contrasena=:contrasena";    
        try{          
            $statement=$this->conexion->prepare($sql);  
            $statement->bindParam(":id",$usuario->id);
            $statement->bindParam(":contrasena",$usuario->contrasena);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            if(!empty($response)){
                $response="Inicio de sesion correcto";
            }else{
                $response="Verifique los datos"; 
            }           
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
}    
