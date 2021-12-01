<?php

if (!empty($_POST)) {
    include "../app/class/App.php";
    include "../app/class/Session.php";
    include "../app/models/Database.php";
    include "../app/models/QCModel.php";
    
    var_dump($_POST);
    
    /**
     * 
     */
    function fetchAllArray($replyArray)
    {
        $array = [];
        if (is_array($replyArray)) {
            // parccour le tableau pricipale 
            foreach ($replyArray as $replys) {
                // parcous les sous tableaux
                if(is_array($replys)){
                    // fetchAllArray($replys);
                    foreach ($replys as $reply) {
                        $val = trim(htmlspecialchars($reply));
                        array_push($array, $val);
                    }
                } else {
                    $val = trim(htmlspecialchars($replys));
                    array_push($array, $val);
                }
                // foreach ($replys as $reply) {
                    //     array_push($array, $reply);
                    // }
                }
                return $array;
            }
    }
    
    $idArray = fetchAllArray($_POST);
    // $id_qcm = fetchAllArray($_POST);
    // echo count($id_qcm); 
    // var_dump($id_qcm);
   
    
    $db = App::getDatabase();
    $qcmModel = new QCModel();

    foreach($idArray as $id_qcm){
        $qcm = $qcmModel->deleteQcmInDb($db, $id_qcm);
    }
    
    if ($qcm) {
        Session::getInstance()->setFlash('success', 'Le QCM a bien été suprimé');
        App::redirect("/accueil/espace-auteur");
        exit();
    } else {
        Session::getInstance()->setFlash('danger', 'Une erreur est survenue lors de la supression du QCM');
        App::redirect("/accueil/espace-auteur");
        exit();
    }
}
