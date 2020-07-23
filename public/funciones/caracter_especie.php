<?
function insertCaracteristicas($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->insertCaracteristicas($request);
}

function deleteCaracteristicas($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->deleteCaracteristicas($request);
}

function updateCaracteristicas($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->updateCaracteristicas($request);
}

function selectCaracteristicas($request){
    $caracteristicas=new Caracteristica();
return $caracteristicas->selectCaracteristicas($request);
}

class Caracteristica{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertCaracteristicas($request){
        $caracteristicas;
        $response;
        $caracteristica=json_decode($request->getBody());
        $sql="INSERT INTO caracteristicas(id_caracter_especie,caracteristicas_e,id_especie) VALUES (:id_caracter_especie,:caracteristicas_e,:id_especie)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id_caracter_especie",$caracteristica->id_caracter_especie);
            $statement->bindParam("caracteristicas_e",$caracteristica->caracteristicas_e);
            $statement->bindParam("id_especie",$caracteristica->id_especie);
            $statement->execute();
            $response->mensaje="La Caracteristica se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteCaracteristicas($request){
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

    function updateCaracteristicas($request){
        $caracteristicas;
        $response;
        $caracteristica=json_decode($request->getBody());
        $sql="UPDATE caracteristicas SET caracteristicas_e = :caracteristicas_e, id_especie = :id_especie WHERE id_caracter_especie = :id_caracter_especie";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_caracter_especie",$caracteristica->id_caracter_especie);
            $statement->bindParam("caracteristicas_e",$caracteristica->caracteristicas_e);
            $statement->bindParam("id_especie",$caracteristica->id_especie);
            $statement->execute();
            $response->mensaje="La Caracteristica se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectCaracteristicas($request){
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