<?php

class QCModel
{

    /**
     * 
     */
    public function fetchAllQcm($db)
    {
        $user = $db->query("SELECT * FROM qcm_table")->fetchAll();
        return $user;
    }
    
    /**
     * 
     */
    public function fetchOnlyLastQCM($db)
    {
        $user = $db->query("SELECT * FROM qcm_table ORDER BY date_at DESC LIMIT 12")->fetchAll();
        return $user;
    }

    /**
     * 
     */
    public function getQcm($db, $id_qcm)
    {
        $user = $db->query("SELECT * FROM question_table INNER JOIN qcm_table ON question_table.qcm_table_id_qcm = ? AND qcm_table.id_qcm = ?", [
            $id_qcm,
            $id_qcm
        ])->fetchAll();

        return $user;
    }

    /**
     * 
     */
    public function insertQCMInDb($db, $title_qcm, $image, $director, $release_date)
    {
        $date = date("Y.m.d");
        echo '<pre>';
        echo '</pre>';
        // die;
        $db->query("INSERT INTO qcm_table(title_movie, poster_movie, director_movie, release_date, date_at, user_id_user) VALUES (?, ?, ?, ?, ?, ?)", [
            $title_qcm,
            $image,
            $director,
            $release_date,
            $date,
            "1"
        ]);
        $id_qcm = $db->lastInsertId();

        // insertion de l'affiche du QCM
        $this->pictureQcmDownload($db, $image, $id_qcm);

        return $id_qcm;
    }

    public function insertQuestionOfQCMInDb($db, $question, $reply1, $reply2, $reply3, $reply4, $goodReply, $id_qcm)
    {
        $qcm = $db->query("INSERT INTO question_table(
            question, reply1, reply2, reply3, reply4, good_reply, qcm_table_id_qcm) 
            VALUES (?,?,?,?,?,?,?)", [
            $question,
            $reply1,
            $reply2,
            $reply3,
            $reply4,
            $goodReply,
            $id_qcm,
        ]);

        return $qcm;
    }

    /**
     * 
     */
    public function updateQcmInDb($db, $title_qcm, $poster_qcm, $director, $release_date ,$id_qcm, $statutPictureUpdate)
    {
        $date = date("Y.m.d");
        // Si l'utilisateur a chargé une photo dans le formulaire, on mets a jour la photo  
        if ($statutPictureUpdate === true) {
            // var_dump("update poster");
            // die;
            $qcm = $db->query("UPDATE qcm_table SET title_movie = ?, poster_movie = ?, director_movie = ?, release_date = ?, date_at = ? WHERE id_qcm = ?", [
                $title_qcm,
                $poster_qcm,
                $director,
                $release_date,
                $date,
                $id_qcm
            ]);

            $this->pictureQcmDownload($db, $poster_qcm, $id_qcm);
        } else {
            // var_dump("update juste title");
            // die;
            $qcm = $db->query("UPDATE qcm_table SET title_movie = ?, director_movie = ?, release_date = ?, date_at = ? WHERE id_qcm = ?", [
                $title_qcm,
                $director,
                $release_date,
                $date,
                $id_qcm
            ]);
        }

        return $qcm;
    }

    public function updateQuestionQcmInDb($db, $question, $reply1, $reply2, $reply3, $reply4, $goodReply, $id_question)
    {
        $qcm = $db->query("UPDATE question_table 
        SET 
        question = ?,
        reply1 = ?, reply2 = ?, reply3 = ?, reply4 = ?,
        good_reply = ? 
        WHERE id_question = ?", [
            $question,
            $reply1,
            $reply2,
            $reply3,
            $reply4,
            $goodReply,
            $id_question,
        ]);

        return $qcm;
    }

    public function deleteQcmInDb($db, $id_qcm)
    {
        $qcm = $db->query("DELETE FROM qcm_table WHERE id_qcm = ?", [$id_qcm]);
        return $qcm;
    }

    private function pictureQcmDownload($db, $poster_qcm, $user_id)
    {
        // echo realpath("../../../data/img");
        // echo __DIR__ . "../../data/img";
        // $folder =  "C:/xampp/htdocs/Workspace/QCM_website/public/data/img/";
        $folder =  "./data/img/";
        $image = $poster_qcm;
        $path = $folder . $image;
        // var_dump($path);
        // die;
        $target_file = $folder . basename($_FILES["poster_qcm"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $allowed = array('jpeg', 'png', 'jpg');

        $ext = pathinfo($image, PATHINFO_EXTENSION);
        var_dump($_FILES);

        if (!in_array($ext, $allowed)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            move_uploaded_file($_FILES['poster_qcm']['tmp_name'], $path);

            $db->query('UPDATE qcm_table SET poster_movie = ? WHERE id_qcm = ?', [
                $image,
                $user_id,
            ]);

            return $image;
        }
    }
}
