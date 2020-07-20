<?
function insertPatogenos($request){
    $patogenos=new Patogeno();
return $patogenos->insertPatogenos($request);
}

function deletePatogenos($request){
    $patogenos=new Patogeno();
return $patogenos->deletePatogenos($request);
}

function updatePatogenos($request){
    $patogenos=new Patogeno();
return $patogenos->updatePatogenos($request);
}

function selectPatogenos($request){
    $patogenos=new Patogeno();
return $patogenos->selectPatogenos($request);
}

class Patogeno{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertPatogenos($request){
        $patogenos;
        $response;
        $patogeno=json_decode($request->getBody());
        $sql="INSERT INTO patogenos(idPatogeno,nombre) VALUES (:idPatogeno,:nombre)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("idPatogeno",$patogeno->idPatogeno);
            $statement->bindParam("nombre",$patogeno->nombre);
            $statement->execute();
            $response->mensaje="El Patogeno se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deletePatogenos($request){
        $patogenos;
        $response;
        $patogeno=json_decode($request->getBody());
        $sql="DELETE FROM patogenos WHERE idPatogeno = :idPatogeno";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idPatogeno",$patogeno->idPatogeno);
            $statement->execute();
            $response->mensaje="El Patogeno se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updatePatogenos($request){
        $patogenos;
        $response;
        $patogeno=json_decode($request->getBody());
        $sql="UPDATE patogenos SET nombre = :nombre WHERE idPatogeno = :idPatogeno";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idPatogeno",$patogeno->idPatogeno);
            $statement->bindParam("nombre",$patogeno->nombre);
            $statement->execute();
            $response->mensaje="El Patogeno se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectPatogenos($request){
        $patogenos;
        $response;
        $patogeno=json_decode($request->getBody());
        $sql="SELECT * FROM patogenos ORDER BY idPatogeno";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="El Patogeno se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}