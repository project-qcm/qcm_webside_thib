<?php
require_once '../app/class/Autoload.php';
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

Autoload\Autoloader::register();

$uri = $_SERVER['REQUEST_URI'];

// if(!empty($_GET['id']) )
// {
//     $_GET['id'] = 1;
// }

ob_start();
switch ($uri):
    case ($uri === '/'):
        require '../app/views/home/index.php';
        break;
    case ($uri === '/admin'):
        require_once '../app/controllers/admin/AdminLoginController.php';
        require_once '../app/views/admin/admin_login_page.php';
        break;
    case ($uri === '/qcm'):
        require '../app/views/qcm_page.php';
        $active = "hobbite";
        break;
    case ($uri === '/admin/admin-home'):
        require '../app/controllers/admin/AdminSettingController.php';
        require '../app/views/admin/adminHomePage.php';
        break;
    case ($uri === '/inscription'):
        require_once '../app/controllers/auth/AuthRegistrationController.php';
        require '../app/views/auth/authRgistrationPage.php';
        break;
    case ($uri === '/connection'):
        require_once '../app/controllers/auth/AuthLoginController.php';
        require '../app/views/auth/authLoginPage.php';
        break;
    case ($uri === '/accueil'):
        require '../app/views/auth/authHomePage.php';
        break;
    case ($uri === '/profil'):
        require '../app/views/auth/authProfilePage.php';
        break;
    case ($uri === '/profil/setting'):
        require_once '../app/controllers/auth/AuthSettingController.php';
        require '../app/views/auth/authSettingPage.php';
        break;
    case ($uri === '/accueil/espace-auteur'):
        require_once '../app/controllers/auth/AuthorSpaceController.php';
        require '../app/views/auth/authorSpacePage.php';
        break;
    case ($uri === '/accueil/espace-auteur/edit' || $uri === '/accueil/espace-auteur/edit?id=' . $_GET['id']):
        require_once '../app/controllers/auth/AuthorEditController.php';
        require '../app/views/auth/authorEditQcmPage.php';
        break;
    case ($uri === "/accueil/qcm?id=" . $_GET['id']):
        require_once '../app/controllers/QCMController.php';
        require '../app/views/qcm_page.php';
        break;
    case ($uri === '/logout'):
        require '../app/inc/logout.php';
        break;
    case ($uri === '/admin/deconnection-admin'):
        require '../app/inc/logoutAdmin.php';
        break;
endswitch;
$content =  ob_get_clean();

require_once '../app/views/template/default.php';
