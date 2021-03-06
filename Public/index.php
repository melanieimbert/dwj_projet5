<?php

use Kernel\Application\Template;

session_start();
require '../vendor/autoload.php';
$router = new Kernel\Application\Router();
$router->get('/', 'Home#showHomePage');
$router->get('/inscription', 'Users#inscription');
$router->post('/inscription', 'Users#inscription');
$router->get('/connection', 'Users#connection');
$router->post('/connection', 'Users#connection');
$router->get('/confirmEmail', 'Users#emailValidation');
$router->get('/disconnection', 'Users#disconnection');
$router->get('/volunteer', 'Volunteers#showVolunteersPage');
$router->post('/volunteer_uploadFile', 'Volunteers#uploadFile');
$router->post('/volunteer_uploadDates', 'Volunteers#uploadDatesInfos');
$router->get('/admin', 'Admin#showAdminPage');
$router->post('/admin_uploadDates', 'Admin#changeDatesContract');
$router->get('/downloadFolder', 'Admin#downloadFolder');
$router->get('/approveFile', 'Admin#approveFile');
$router->get('/desapproveFile', 'Admin#desapproveFile');
$router->post('/anonymizeUser', 'Admin#anonymizeUser');
$router->get('/gdpr', 'Users#gdpr');

try {
    if (isset($_GET['url'])) {
        $router->run($_GET['url']);
    } else {
        $router->run('/');
    }
} catch (Exception $e) {
    $error = 'Une erreur est survenue : <br>'.$e->getMessage();
    $template = new Template();
    $template->render('../Src/Views/errorView.php', [
        'title' => 'Oups :',
        'error' => $error,
    ], '../Src/Views/Layouts/layout.php');
}
