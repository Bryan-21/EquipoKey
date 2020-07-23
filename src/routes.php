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
   
    
    
    $app->post('/insert','setalumno');
    $app->get('/selectall','gettodoslosalumnos');
    $app->get('/select','getalumno');
    $app->put('/update','updatealumno');
    $app->delete('/delete','deletealumno');
    $app->post('/alumno','setalumno');

    //REGISTROUSUARIOS
    $app->post('/usuario','setUsuario');
    $app->get('/usuario','getUsuario');
    $app->put('/usuario','selectUsuarios');
    $app->delete('/usuario','deleteUsuarios');
    //proyecto_especies
    $app->post('/especies','insertEspecies');
    $app->delete('/especies','deleteEspecies');
    $app->put('/especies','updateEspecies');
    $app->get('/especies','selectEspecies');
    //proyecto_caracter_especie
    $app->post('/caracteristicas_e','insertCaracteristicas_e');
    $app->delete('/caracteristicas_e','deleteCaracteristicas_e');
    $app->put('/caracteristicas_e','updateCaracteristicas_e');
    $app->get('/caracteristicas_e','selectCaracteristicas_e');
    //proyecto_animales
    $app->post('/animales','insertAnimales');
    $app->delete('/animales','deleteAnimales');
    $app->put('/animales','updateAnimales');
    $app->get('/animales','selectAnimales');
    //proyecto_caracter_animal
    $app->post('/caracteristicas_a','insertCaracteristicas');
    $app->delete('/caracteristicas_a','deleteCaracteristicas');
    $app->put('/caracteristicas_a','updateCaracteristicas');
    $app->get('/caracteristicas_a','selectCaracteristicas');
    

});
