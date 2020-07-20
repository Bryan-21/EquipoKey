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
    $app->get('/usuario','setUsuario');
    $app->post('/usuario','getUsuario');
    $app->post('/productos','insertarProductos');
    //proyecto_terr
    $app->post('/territorios','insertTerritorios');
    $app->delete('/territorios','deleteTerritorios');
    $app->put('/territorios','updateTerritorios');
    $app->get('/territorios','selectTerritorios');
    //proyecto_pat
    $app->post('/patogenos','insertpatogenos');
    $app->delete('/patogenos','deletepatogenos');
    $app->put('/patogenos','updatepatogenos');
    $app->get('/patogenos','selectpatogenos');
    

});
