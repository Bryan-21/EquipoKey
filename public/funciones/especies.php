<?
function insertEspecies($request){
    $especies=new Especie();
return $especies->insertEspecies($request);
}

function deleteEspecies($request){
    $especies=new Especie();
return $especies->deleteEspecies($request);
}

function updateEspecies($request){
    $especies=new Especie();
return $especies->updateEspecies($request);
}

function selectEspecies($request){
    $especies=new Especie();
return $especies->selectEspecies($request);
}

class Especie{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertEspecies($request){
        $especies;
        $response;
        $especie=json_decode($request->getBody());
        $sql="INSERT INTO especies(id_especie,nombre_e) VALUES(:id_especie,:nombre_e)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id_especie",$especie->id_especie);
            $statement->bindParam("nombre_e",$especie->nombre_e);
            $statement->execute();
            $response->mensaje="La especie se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    
    function deleteEspecies($request){
        $especies;
        $response;
        $especie=json_decode($request->getBody());
        $sql="DELETE FROM especies WHERE id_especie = :id_especie";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_especie",$especie->id_especie);
            $statement->execute();
            $response->mensaje="La especie se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateEspecies($request){
        $especies;
        $response;
        $especie=json_decode($request->getBody());
        $sql="UPDATE especies SET nombre_e=:nombre_e WHERE id_especie = :id_especie";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("id_especie",$especie->id_especie);
            $statement->bindParam("nombre_e",$especie->nombre_e);
            $statement->execute();
            $response->mensaje="La especie se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectEspecies($request){
        $especies;
        $response;
        $especie=json_decode($request->getBody());
        $sql="SELECT * FROM especies ORDER BY id_especie";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="La especie se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}