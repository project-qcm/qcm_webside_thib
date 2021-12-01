<?php

if (!empty($_POST) && !empty($_POST['email'] && !empty($_POST['password']))){
   
    // require_once '../app/inc/bootstrap.php';
    include "../app/class/App.php";
    include "../app/class/Session.php";
    include "../app/models/Database.php";
    include "../app/models/AdminModel.php";
    include "../app/models/auth/Auth.php";
    
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    
    $db = App::getDatabase();
    $auth = new Auth(Session::getInstance());

    $user = $auth->login($db, $email, $password);

    if ($user) {
        Session::getInstance()->setFlash('success', 'vous êtes maintenent connecté');
        Session::getInstance()->write('auth', $user);
        App::redirect("/accueil");
        exit();        
    } else {
        Session::getInstance()->setFlash('danger', 'Identifiant ou mot de passe incorrecte');
        // App::redirect('../view/loginPage.php');
        App::redirect("/connection");
        exit();
    }  
}