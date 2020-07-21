<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {
   
    //REGISTROUSUARIOS
    
    $app->post('/insert','setalumno');
    $app->get('/selectall','gettodoslosalumnos');
    $app->get('/select','getalumno');
    $app->put('/update','updatealumno');
    $app->delete('/delete','deletealumno');
    $app->post('/alumno','setalumno');
    $app->post('/usuario','setUsuario');
    $app->get('/usuario','getUsuario');
    $app->put('/usuario','selectUsuarios');
    //proyecto_productos
    $app->post('/productos','insertProductos');
    $app->delete('/productos','deleteProductos');
    $app->put('/productos','updateProductos');
    $app->get('/productos','selectProductos');
    //proyecto_territorios
    $app->post('/territorios','insertTerritorios');
    $app->delete('/territorios','deleteTerritorios');
    $app->put('/territorios','updateTerritorios');
    $app->get('/territorios','selectTerritorios');
    //proyecto_patogenos
    $app->post('/patogenos','insertpatogenos');
    $app->delete('/patogenos','deletepatogenos');
    $app->put('/patogenos','updatepatogenos');
    $app->get('/patogenos','selectpatogenos');
    //proyecto_tipo
    $app->post('/tipo_producto','insertTipo_productos');
    $app->delete('/tipo_producto','deleteTipo_productos');
    $app->put('/tipo_producto','updateTipo_productos');
    $app->get('/tipo_producto','selectTipo_productos');
    

});
