<?
function setUsuario($request){
    $usuarios=new Usuario();
return $usuarios->setUsuario($request);
}
function getUsuario($request){
    $usuarios=new Usuario();
return $usuarios->getUsuario($request);
}

function selectUsuarios($request){
    $usuarios=new Usuario();
return $usuarios->selectUsuarios($request);
}

function deleteUsuarios($request){
    $usuarios=new Usuario();
return $usuarios->deleteUsuarios($request);
}

class Usuario{

    private $conexion;
    
    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    //funcion para insertar usuarios
    function setUsuario($request){
        $usuarios;
        $response;
        $usuario=json_decode($request->getBody());
        $sql="INSERT INTO usuarios(id,contrasena,nombre,rol) VALUES(:id,:contrasena,:nombre,:rol)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id",$usuario->id);
            $statement->bindParam("contrasena",$usuario->contrasena);
            $statement->bindParam("nombre",$usuario->nombre);
            $statement->bindParam("rol",$usuario->rol);
            $statement->execute();
            $response="El usuario se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    //funcion para validar a los usuarios
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

    //funcion que selecciona todos los usuarios de la base de datos
    function selectUsuarios($request){
        $usuarios;
        $response;
        $usuario=json_decode($request->getBody());
        $sql="SELECT * FROM usuarios ORDER BY id";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteUsuarios($request){
        $usuarios;
        $response;
        $usuario=json_decode($request->getBody());
        $sql="DELETE FROM usuarios WHERE id = :id";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id",$usuario->id);
            $statement->execute();
            $response->mensaje="El usuario se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
}    
