<?php

use Kernel\Application\Template;

session_start();
require 'vendor/autoload.php';

$router = new Kernel\Application\Router($_GET['url']);

try {
    $router->get('/', 'Home#showHomePage');
    $router->get('/inscription', 'Users#inscription');
    $router->post('/inscription', 'Users#inscription');
    $router->get('/connection', 'Users#connection');
    $router->post('/connection', 'Users#connection');
    $router->get('/confirmEmail', 'Users#emailValidation');
    $router->get('/disconnection', function () {
        unset($_SESSION['id']);
        header('Location: afev/index.php?url=/');
    });
    $router->get('/volunteer', 'Volunteers#showVolunteersPage');
    $router->post('/volunteer_uploadFile', 'Volunteers#uploadFile');
    $router->post('/volunteer_uploadDates', 'Volunteers#uploadDatesInfos');
    $router->run();
} catch (Exception $e) {
    $error = 'Erreur :'.$e->getMessage();
    $template = new Template();
    $template->render(__DIR__.'/Src/Views/errorView.php', [
        'title' => 'Oups...',
        'error' => $error,
    ]);
}