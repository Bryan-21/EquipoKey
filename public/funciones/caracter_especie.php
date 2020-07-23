<?
function insertCaracteristicas_e($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->insertCaracteristicas_e($request);
}

function deleteCaracteristicas_e($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->deleteCaracteristicas_e($request);
}

function updateCaracteristicas_e($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->updateCaracteristicas_e($request);
}

function selectCaracteristicas_e($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->selectCaracteristicas_e($request);
}

class Caracteristica{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertCaracteristicas_e($request){
        $caracteristicas;
        $response;
        $caracteristica=json_decode($request->getBody());
        $sql="INSERT INTO caracteristicas(id_caracter_especie,caracteristica_e,id_especie) VALUES (:id_caracter_especie,:caracteristica_e,:id_especie)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id_caracter_especie",$caracteristica->id_caracter_especie);
            $statement->bindParam("caracteristica_e",$caracteristica->caracteristica_e);
            $statement->bindParam("id_especie",$caracteristica->id_especie);
            $statement->execute();
            $response->mensaje="La Caracteristica se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteCaracteristicas_e($request){
        $caracteristicas;
        $response;
        $caracteristica=json_decode($request->getBody());
        $sql="DELETE FROM caracteristicas WHERE id_caracter_especie = :id_caracter_especie";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_caracter_especie",$caracteristica->id_caracter_especie);
            $statement->execute();
            $response->mensaje="La Caracteristica se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateCaracteristicas_e($request){
        $caracteristicas;
        $response;
        $caracteristica=json_decode($request->getBody());
        $sql="UPDATE caracteristicas SET caracteristica_e = :caracteristica_e, id_especie = :id_especie WHERE id_caracter_especie = :id_caracter_especie";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_caracter_especie",$caracteristica->id_caracter_especie);
            $statement->bindParam("caracteristica_e",$caracteristica->caracteristica_e);
            $statement->bindParam("id_especie",$caracteristica->id_especie);
            $statement->execute();
            $response->mensaje="La Caracteristica se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectCaracteristicas_e($request){
        $caracteristicas;
        $response;
        $caracteristica=json_decode($request->getBody());
        $sql="SELECT * FROM caracteristicas ORDER BY id_caracter_especie";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="La Caracteristica se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}