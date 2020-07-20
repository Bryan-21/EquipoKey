<?
function insertarProductos($request){
    $productos=new Producto();
return $productos->insertarProductos($request);
}

class Producto{

    function __construct(){           
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function insertarProductos($request){
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


}