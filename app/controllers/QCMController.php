<?php


if (!empty($_POST) && !empty($_POST["question"] )) {

    require_once "../app/models/Database.php";
    require_once "../app/class/QcmTool.php";
    require_once "../app/models/QCM2Auth.php";

    $db = App::getDatabase();
    $qcm2User = new QCM2Auth();

    $correction = new QcmTool();


    $id_user = Session::getInstance()->read('auth')->id_user;
    // var_dump($id_user);

    $title_movie = trim(htmlspecialchars($_POST['title_qcm']));
    $id_qcm = trim(htmlspecialchars($_POST['id_qcm']));


    $replyUser = $_POST["question"];
    // var_dump($replyUser);
    $replyUser = $_POST["goodReply"];
    // var_dump($replyUser);

    $array_good_reply = [];

    // var_dump($_POST);

    $array_reply_user = $correction->fetchAllArray($_POST["question"]);
    $array_good_reply = $correction->fetchAllArray($_POST["goodReply"]);

    // var_dump($array_reply_user);
    // var_dump($array_good_reply);

    $array_check = $correction->check_array($array_reply_user, $array_good_reply);
    // var_dump($array_check);

    $array_check_false = $correction->check_array_false($array_reply_user, $array_good_reply);
    // var_dump($array_check_false);

    $flash = $correction->get_flashed($array_check);

    $score = $correction->result_QCM($array_check, $array_reply_user);
    // var_dump($score);

    // si l'utilisateur à déjà fait ce qcm on le mette à jour
    $qcmUpdate = $qcm2User->getElementQcm2Auth($db, $title_movie, $id_user);

    if($qcmUpdate === false){
        // var_dump("insert");
        // die;
        $userQcm = $qcm2User->insertQCM2Auth($db, $title_movie, $score, $id_user);
    } else {
        // var_dump("update");
        // die;
        $userQcm = $qcm2User->updateQCM2Auth($db, $score, $id_user, $title_movie);
    }
}
