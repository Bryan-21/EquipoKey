<?
function insertTipo_productos($request){
    $tipo_productos=new tipo_producto();
return $tipo_productos->insertTipo_producto($request);
}

function deleteTipo_productos($request){
    $tipo_productos=new tipo_producto();
return $tipo_productos->deleteTipo_productos($request);
}

function updateTipo_Productos($request){
    $tipo_productos=new tipo_producto();
return $tipo_productos->updateTipo_Productos($request);
}

function selectTipo_productos($request){
    $tipo_productos=new tipo_producto();
return $tipo_productos->selectTipo_productos($request);
}

class tipo_producto{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertTipo_producto($request){
        $tipo_productos;
        $response;
        $tipo_producto=json_decode($request->getBody());
        $sql="INSERT INTO tipo_producto(idTipo,nombre) VALUES (:idTipo,:nombre)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("idTipo",$tipo_producto->idTipo);
            $statement->bindParam("nombre",$tipo_producto->nombre);
            $statement->execute();
            $response->mensaje="El tipo_producto se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteTipo_productos($request){
        $tipo_productos;
        $response;
        $tipo_producto=json_decode($request->getBody());
        $sql="DELETE FROM tipo_producto WHERE idTipo = :idTipo";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idTipo",$tipo_producto->idTipo);
            $statement->execute();
            $response->mensaje="El tipo_producto se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateTipo_Productos($request){
        $tipo_productos;
        $response;
        $tipo_producto=json_decode($request->getBody());
        $sql="UPDATE tipo_producto SET nombre = :nombre WHERE idTipo = :idTipo";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idTipo",$tipo_producto->idTipo);
            $statement->bindParam("nombre",$tipo_producto->nombre);
            $statement->execute();
            $response->mensaje="El tipo_producto se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectTipo_productos($request){
        $tipo_productos;
        $response;
        $tipo_producto=json_decode($request->getBody());
        $sql="SELECT * FROM tipo_producto ORDER BY idTipo";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="El tipo_producto se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}