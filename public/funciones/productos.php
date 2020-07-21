<?
function insertProductos($request){
    $productos=new Producto();
return $productos->insertProductos($request);
}

function deleteProductos($request){
    $productos=new Producto();
return $productos->deleteProductos($request);
}

function updateProductos($request){
    $productos=new Producto();
return $productos->updateProductos($request);
}

function selectProductos($request){
    $productos=new Producto();
return $productos->selectProductos($request);
}

class Producto{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertProductos($request){
        $productos;
        $response;
        $producto=json_decode($request->getBody());
        $sql="INSERT INTO productos(idProducto,nombre,idTerritorio,idPatogeno,idTipo) VALUES(:idProducto,:nombre,:idTerritorio,:idPatogeno,:idTipo)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("idProducto",$producto->idProducto);
            $statement->bindParam("nombre",$producto->nombre);
            $statement->bindParam("idTerritorio",$producto->idTerritorio);
            $statement->bindParam("idPatogeno",$producto->idPatogeno);
            $statement->bindParam("idTipo",$producto->idTipo);
            $statement->execute();
            $response->mensaje="El producto se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    
    function deleteProductos($request){
        $productos;
        $response;
        $producto=json_decode($request->getBody());
        $sql="DELETE FROM productos WHERE idProducto = :idProducto";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idProducto",$producto->idProducto);
            $statement->execute();
            $response->mensaje="El producto se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateProductos($request){
        $productos;
        $response;
        $producto=json_decode($request->getBody());
        $sql="UPDATE productos SET nombre=:nombre,idTerritorio=:idTerritorio,idPatogeno=:idPatogeno,idTipo=:idTipo WHERE idProducto = :idProducto";    
        try{            
            $statement=$this->conexion->prepare($sql);
            //no hay comentarios
            $statement->bindParam("idProducto",$producto->idProducto);
            $statement->bindParam("nombre",$producto->nombre);
            $statement->bindParam("idTerritorio",$producto->idTerritorio);
            $statement->bindParam("idPatogeno",$producto->idPatogeno);
            $statement->bindParam("idTipo",$producto->idTipo);
            $statement->execute();
            $response->mensaje="El producto se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function selectProductos($request){
        $productos;
        $response;
        $producto=json_decode($request->getBody());
        $sql="SELECT * FROM productos ORDER BY idProducto";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ); 
            //$response->mensaje="El producto se modifico Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}