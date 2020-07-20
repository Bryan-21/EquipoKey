<?
function insertTerritorios($request){
    $territorios=new Territorio();
return $territorios->insertTerritorios($request);
}

function deleteTerritorios($request){
    $territorios=new Territorio();
return $territorios->deleteTerritorios($request);
}

function updateTerritorios($request){
    $territorios=new Territorio();
return $territorios->updateTerritorios($request);
}

function selectTerritorios($request){
    $territorios=new Territorio();
return $territorios->selectTerritorios($request);
}

class Territorio{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertTerritorios($request){
        $territorios;
        $response;
        $territorio=json_decode($request->getBody());
        $sql="INSERT INTO territorios(idTerritorio,nombre) VALUES (:idTerritorio,:nombre)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("idTerritorio",$territorio->idTerritorio);
            $statement->bindParam("nombre",$territorio->nombre);
            $statement->execute();
            $response->mensaje="El Territorio se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteTerritorios($request){
        $territorios;
        $response;
        $territorio=json_decode($request->getBody());
        $sql="DELETE FROM territorios WHERE idTerritorio = :idTerritorio";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idTerritorio",$territorio->idTerritorio);
            $statement->execute();
            $response->mensaje="El Territorio se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateTerritorios($request){
        $territorios;
        $response;
        $territorio=json_decode($request->getBody());
        $sql="UPDATE territorios SET nombre = :nombre WHERE idTerritorio = :idTerritorio";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idTerritorio",$territorio->idTerritorio);
            $statement->bindParam("nombre",$territorio->nombre);
            $statement->execute();
            $response->mensaje="El Territorio se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectTerritorios($request){
        $territorios;
        $response;
        $territorio=json_decode($request->getBody());
        $sql="SELECT * FROM territorios ORDER BY idTerritorio";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="El Territorio se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}