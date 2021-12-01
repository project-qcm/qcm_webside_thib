<?php   
if (!empty($_POST) && !empty($_POST['email'] && !empty($_POST['password']))) {
    // require_once "../app/inc/bootstrap.php";
    include "../app/class/App.php";
    include "../app/class/Session.php";
    include "../app/models/Database.php";
    include "../app/models/AdminModel.php";

    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));

    $db = App::getDatabase();
    $admin = new AdminModel(Session::getInstance());
    $user = $admin->login($db, $email, $password);

    // var_dump($_SESSION);
    if ($user) {
        Session::getInstance()->setFlash('success', 'vous êtes maintenent connecté');
        // header('Location: ../views/admin/admin_home_page.php');
       
        App::redirect('/admin/admin-home');
        // exit();
    } else {
        Session::getInstance()->setFlash('danger', 'Identifiant ou mot de passe incorrecte');
        
        // App::redirect('../views/admin/admin_login_page.php');
        // App::redirect('../app/views/admin/admin_login_page.php');
        App::redirect('/admin');
        // exit();
    }
   
}
