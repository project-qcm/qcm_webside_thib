<?php


class QCM2Auth {

    public function __construct()
    {
        
    }

    /**
     * 
     */
    // public function fetchAllQcm2Auth($db)
    // {
    //     $user = $db->query("SELECT * FROM user_qcm")->fetchAll();
    //     return $user;
    // }
    
    public function fetchQcmByAuth($db, $id_user)
    {
        $user = $db->query("SELECT * FROM user_qcm WHERE user_id_user = ?", [
            $id_user  
        ])->fetchAll();
        
        return $user;
    }
    
    /**
     * 
     */
    public function getElementQcm2Auth($db, $title_qcm, $user_id)
    {
        $qcmUser = $db->query("SELECT * FROM user_qcm WHERE title_movie = ? AND user_id_user = ?", [
            $title_qcm,
            $user_id
        ])->fetch();
        
        if($qcmUser){
            return true;
        }
        
        return false;
    }

    public function insertQCM2Auth($db, $title_qcm, $score_qcm, $id_user)
    {
        $date = date("Y.m.d");
        $userQcm = $db->query("INSERT INTO user_qcm(title_movie, score_qcm, user_id_user, date_at) VALUES (?, ?, ?, ?)", [
            $title_qcm,
            $score_qcm,
            $id_user,
            $date
        ]);

        return $userQcm;
    }
    
    public function updateQCM2Auth($db, $score_qcm, $id_user, $title_qcm)
    {   
        $date = date("Y.m.d");
        $userQcm = $db->query("UPDATE user_qcm SET score_qcm = ?, date_at = ? WHERE user_id_user = ? && title_movie = ?", [
            $score_qcm,
            $date,
            $id_user,
            $title_qcm
        ]);
    
        return $userQcm;
    }

}