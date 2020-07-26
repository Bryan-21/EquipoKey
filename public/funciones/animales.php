<?
function insertAnimales($request){
    $animales=new Animal();
return $animales->insertAnimales($request);
}

function deleteAnimales($request){
    $animales=new Animal();
return $animales->deleteAnimales($request);
}

function updateAnimales($request){
    $animales=new Animal();
return $animales->updateAnimales($request);
}

function selectAnimales($request){
    $animales=new Animal();
return $animales->selectAnimales($request);
}

class Animal{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertAnimales($request){
        $animales;
        $response;
        $animal=json_decode($request->getBody());
        $sql="INSERT INTO animales(id_animal,nombre_a,id_especie) VALUES (:id_animal,:nombre_a,:id_especie)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id_animal",$animal->id_animal);
            $statement->bindParam("nombre_a",$animal->nombre_a);
            $statement->bindParam("id_especie",$animal->id_especie);
            $statement->execute();
            $response->mensaje="El Animal se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteAnimales($request){
        $animales;
        $response;
        $animal=json_decode($request->getBody());
        $sql="DELETE FROM animales WHERE id_animal = :id_animal";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_animal",$animal->id_animal);
            $statement->execute();
            $response->mensaje="El Animal se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateAnimales($request){
        $animales;
        $response;
        $animal=json_decode($request->getBody());
        $sql="UPDATE animales SET nombre_a = :nombre_a, id_especie = :id_especie WHERE id_animal = :id_animal";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_animal",$animal->id_animal);
            $statement->bindParam("nombre_a",$animal->nombre_a);
            $statement->bindParam("id_especie",$animal->id_especie);
            $statement->execute();
            $response->mensaje="El Animal se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectAnimales($request){
        $animales;
        $response;
        $animal=json_decode($request->getBody());
        $sql="SELECT * FROM animales ORDER BY id_animal";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="El Animal se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}