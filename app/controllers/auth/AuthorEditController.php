<?php

if (!empty($_POST)) {
    include "../app/class/App.php";
    include "../app/class/Session.php";
    include "../app/models/Database.php";
    include "../app/models/QCModel.php";

    $id_qcm = trim(htmlspecialchars($_POST["id_qcm"]));
    $title_qcm = trim(htmlspecialchars($_POST["title_qcm"]));
    $director_movie = trim(htmlspecialchars($_POST['director']));
    $release_date = trim(htmlspecialchars($_POST['release_date']));

    
    // $temp = explode(".", $_FILES["poster_qcm"]["name"]);
    // // var_dump($temp);
    // $newfilename = round(microtime(true)) . '.' . end($temp);
    // $poster_qcm =  $newfilename;

    $poster_qcm = App::renameUploadFile($_FILES, "poster_qcm");
    var_dump($poster_qcm);
    var_dump($_FILES);
    // die;

    function updatePictureQcm($file)
    {
        // var_dump($file["poster_qcm"]["error"]);
        if (!empty($file["poster_qcm"]["error"])) {
            return false;
        }
        return true;
    }

    $statuPictureUpdate = updatePictureQcm($_FILES);
    // var_dump($statuPictureUpdate);
    // var_dump($poster_qcm);

    $question1 = trim(htmlspecialchars($_POST["question1"]));
    $good_reply1 = trim(htmlspecialchars($_POST["good_reply1"]));
    $q1r1 = trim(htmlspecialchars($_POST["q1r1"]));
    $q1r2 = trim(htmlspecialchars($_POST["q1r2"]));
    $q1r3 = trim(htmlspecialchars($_POST["q1r3"]));
    $q1r4 = trim(htmlspecialchars($_POST["q1r4"]));

    $question2 = trim(htmlspecialchars($_POST["question2"]));
    $good_reply2 = trim(htmlspecialchars($_POST["good_reply2"]));
    $q2r1 = trim(htmlspecialchars($_POST["q2r1"]));
    $q2r2 = trim(htmlspecialchars($_POST["q2r2"]));
    $q2r3 = trim(htmlspecialchars($_POST["q2r3"]));
    $q2r4 = trim(htmlspecialchars($_POST["q2r4"]));

    $question3 = trim(htmlspecialchars($_POST["question3"]));
    $good_reply3 = trim(htmlspecialchars($_POST["good_reply3"]));
    $q3r1 = trim(htmlspecialchars($_POST["q3r1"]));
    $q3r2 = trim(htmlspecialchars($_POST["q3r2"]));
    $q3r3 = trim(htmlspecialchars($_POST["q3r3"]));
    $q3r4 = trim(htmlspecialchars($_POST["q3r4"]));

    $question4 = trim(htmlspecialchars($_POST["question4"]));
    $good_reply4 = trim(htmlspecialchars($_POST["good_reply4"]));
    $q4r1 = trim(htmlspecialchars($_POST["q4r1"]));
    $q4r2 = trim(htmlspecialchars($_POST["q4r2"]));
    $q4r3 = trim(htmlspecialchars($_POST["q4r3"]));
    $q4r4 = trim(htmlspecialchars($_POST["q4r4"]));


    $id_question1 = trim(htmlspecialchars($_POST["id_question1"]));
    $id_question2 = trim(htmlspecialchars($_POST["id_question2"]));
    $id_question3 = trim(htmlspecialchars($_POST["id_question3"]));
    $id_question4 = trim(htmlspecialchars($_POST["id_question4"]));

    // var_dump($_POST);
    // die();
    $db = App::getDatabase();
    $qcmModel = new QCModel();

    if (empty($id_question1)) {
        echo '<pre>';
        var_dump("insert");
        $id_user = Session::getInstance()->read('auth')->id_user;
        echo '</pre>';
        // die();
        // on gere l'enregistrement d'un nouveau QCM
        $id_qcm = $qcmModel->insertQCMInDb($db, $title_qcm, $poster_qcm, $director_movie, $release_date, $id_user);

        // Insernregistrement des question
        $questionOfQcm = $qcmModel->insertQuestionOfQCMInDb($db, $question1, $q1r1, $q1r2, $q1r3, $q1r4, $good_reply1, $id_qcm);
        $questionOfQcm = $qcmModel->insertQuestionOfQCMInDb($db, $question2, $q2r1, $q2r2, $q2r3, $q2r4, $good_reply2, $id_qcm);
        $questionOfQcm = $qcmModel->insertQuestionOfQCMInDb($db, $question3, $q3r1, $q3r2, $q3r3, $q3r4, $good_reply3, $id_qcm);
        $questionOfQcm = $qcmModel->insertQuestionOfQCMInDb($db, $question4, $q4r1, $q4r2, $q4r3, $q4r4, $good_reply4, $id_qcm);
    } else {
        var_dump("update");
        // var_dump($statuPictureUpdate);
        // die();

        // Mise a jour d'un QCM
        // Enregistrement du titre et la photo
        $qcmModel->updateQcmInDb($db, $title_qcm, $poster_qcm, $director_movie, $release_date, $id_qcm, $statuPictureUpdate);

        // echo "<pre>";
        // var_dump($id_question1);
        // echo"</pre>";
        // Enregistrement des questions
        $questionOfQcm = $qcmModel->updateQuestionQcmInDb($db, $question1, $q1r1, $q1r2, $q1r3, $q1r4, $good_reply1, $id_question1);
        if (!empty($question2)) {
            $questionOfQcm = $qcmModel->updateQuestionQcmInDb($db, $question2, $q2r1, $q2r2, $q2r3, $q2r4, $good_reply2, $id_question2);
        }
        if (!empty($question3)) {
            $questionOfQcm = $qcmModel->updateQuestionQcmInDb($db, $question3, $q3r1, $q3r2, $q3r3, $q3r4, $good_reply3, $id_question3);
        }
        if (!empty($question4)) {
            $questionOfQcm = $qcmModel->updateQuestionQcmInDb($db, $question4, $q4r1, $q4r2, $q4r3, $q4r4, $good_reply4, $id_question4);
        }
    }

    if ($questionOfQcm) {
        Session::getInstance()->setFlash('success', 'Le QCM a bien été sauvegardé');
        App::redirect("/accueil/espace-auteur");
        exit();
    } else {
        Session::getInstance()->setFlash('danger', 'Une erreur est survenue lors de la sauvegarde du QCM');
        App::redirect("/accueil/espace-auteur/edit");
        exit();
    }
}
