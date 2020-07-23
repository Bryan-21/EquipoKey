<?
function insertCaracteristicas($request){
    $caracteristicas=new Caracteristicas();
return $caracteristicas->insertCaracteristicas($request);
}

function deleteCaracteristicas($request){
    $caracteristicas=new Caracteristicas();
return $caracteristicas->deleteCaracteristicas($request);
}

function updateCaracteristicas($request){
    $caracteristicas=new Caracteristicas();
return $caracteristicas->updateCaracteristicas($request);
}

function selectCaracteristicas($request){
    $caracteristicas=new Caracteristicas();
return $caracteristicas->selectCaracteristicas($request);
}

class Caracteristicas{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertCaracteristicas($request){
        $caracteristicas;
        $response;
        $Caracteristicas=json_decode($request->getBody());
        $sql="INSERT INTO carac_animal(id_caracter,caracteriticas_a,id_animal) VALUES (:id_caracter,:caracteritica_a,:id_animal)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id_caracter",$Caracteristicas->id_caracter);
            $statement->bindParam("caracteritica_a",$Caracteristicas->caracteritica_a);
            $statement->bindParam("id_animal",$Caracteristicas->id_caracter);
            $statement->execute();
            $response->mensaje="La Caracteristicas se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteCaracteristicas($request){
        $caracteristicas;
        $response;
        $Caracteristicas=json_decode($request->getBody());
        $sql="DELETE FROM carac_animal WHERE id_caracter = :id_caracter";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_caracter",$Caracteristicas->id_caracter);
            $statement->execute();
            $response->mensaje="La Caracteristicas se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateCaracteristicas($request){
        $caracteristicas;
        $response;
        $Caracteristicas=json_decode($request->getBody());
        $sql="UPDATE carac_animal SET caracteritica_a = :caracteritica_a, id_animal = :id_animal WHERE id_caracter = :id_caracter";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_caracter",$Caracteristicas->id_caracter);
            $statement->bindParam("caracteritica_a",$Caracteristicas->caracteritica_a);
            $statement->bindParam("id_animal",$Caracteristicas->id_animal);
            $statement->execute();
            $response->mensaje="La Caracteristicas se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectCaracteristicas($request){
        $caracteristicas;
        $response;
        $Caracteristicas=json_decode($request->getBody());
        $sql="SELECT * FROM carac_animal ORDER BY id_caracter";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="La Caracteristicas se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}