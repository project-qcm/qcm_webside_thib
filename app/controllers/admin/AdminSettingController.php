<?php
if (!empty($_POST)) {
    // require_once "../app/inc/bootstrap.php";
    include "../app/class/App.php";
    include "../app/class/Session.php";
    include "../app/models/Database.php";
    include "../app/models/AdminModel.php";
    include "../app/models/auth/Auth.php";

    function set_array_user($userArray)
    {
        $array = [];
        if (is_array($userArray)) {
            // parccour le tableau post
            foreach ($userArray as $users) {
                // parcous les sous éléments
                foreach ($users as $user) {
                    array_push($array, $user);
                }
            }
            return $array;
        }
    }
    $arrayAuthor = set_array_user($_POST);
    // var_dump($arrayAuthor);
    
    $db = App::getDatabase();
    $admin = new AdminModel(Session::getInstance());
    foreach ($arrayAuthor as $user_id) {
        // echo $user_id;
        $author = $admin->switchStatutAuthor($db, $user_id);
        if($user_id == count($arrayAuthor)){
            // echo "okay";
            return $author;
        }
    }
    
    if ($author) {
        Session::getInstance()->setFlash('success', 'Les modifications on bien était enregistré');
        App::redirect('/admin-home');
        exit();
    } else {
        Session::getInstance()->setFlash('danger', 'Les Modification non pas put être sauvgardé');
        App::redirect('/admin-home');
        exit();
    }
}
