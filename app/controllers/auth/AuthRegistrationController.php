<?php

require_once '../app/inc/fonction.php';
// require_once '../inc/db.php';
// require_once '../inc/bootstrap.php';
include "../app/class/App.php";
include "../app/class/Session.php";
include "../app/models/Database.php";
include "../app/models/AdminModel.php";
include "../app/models/auth/Auth.php";

if (!empty($_POST)) {

    $errors = [];
    $db = App::getDatabase();

    function updatePictureQcm($file)
    {
        // var_dump($file["poster_qcm"]["error"]);
        if (!empty($file["image"]["error"])) {
            return false;
        }
        return true;
    }
    $statutPictureUpdate = updatePictureQcm($_FILES);
    var_dump($statutPictureUpdate);

    // checking name
    if (empty($_POST['name'])) {
        $errors = "nom non valide";
        Session::getInstance()->setFlash('danger', "vous n'avez pas remplie le champ nom");
    }

    // checking first name 
    if (empty($_POST['first_name'])) {
        $errors = "prénom non valide";
        Session::getInstance()->setFlash('danger', "vous n'avez pas remplie le champ prénom");
    }

    if(!empty($_POST['username'])){
        $username = trim(htmlspecialchars($_POST['email']));
        $user = $db->query("SELECT id_user FROM user WHERE username = ?", [$username])->fetch();

        if ($user) {
            Session::getInstance()->setFlash('danger', 'cette adresse email est déjà prise');
            $errors['username'] = 'ce pseudo est déjà prise';
        }
    }

    if (empty($_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $errors = "email non valide";
        Session::getInstance()->setFlash('danger', "vous n'avez pas remplie le champ email");
    } else {
        $email = trim(htmlspecialchars($_POST['email']));
        $user = $db->query("SELECT id_user FROM user WHERE email = ?", [$email])->fetch();

        if ($user) {
            Session::getInstance()->setFlash('danger', 'cette adresse email est déjà prise');
            $errors['email'] = 'cette adresse email est déjà prise';
        }
    }

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $errors = "mot de passe invalide";
        Session::getInstance()->setFlash('danger', "vous n'avez pas remplie le champ confirmation mode passe");
    }

    debug($errors);
    var_dump($_POST);
    if (empty($errors)) {
        
        $auth = new Auth(Session::getInstance());
        
        $name = trim(htmlspecialchars($_POST['name']));
        $first_name = trim(htmlspecialchars($_POST['first_name']));
        $username = trim(htmlspecialchars($_POST['username']));
        $email = trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars($_POST['password']));

        $image = App::renameUploadFile($_FILES, "image");
        // $image = $_FILES["image"]["name"];
        var_dump($image);
        // die;
        $user_id = $auth->register($db, $name, $first_name, $username, $email, $password, $image, $statutPictureUpdate);
        var_dump($user_id);
        if($user_id){
            App::redirect("/");
            exit();
        } else {
            App::redirect("/inscription");
            exit();
        }
    } else {
    }
}
