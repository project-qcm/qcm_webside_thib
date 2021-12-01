<?php

/**
 * Class qui contient touts les fonction pour le traitement des QCM
 */
class QcmTool {
    private $array_true;
    private $array_false;

    public function __construct($array_true = [], $array_false = [])
    {
        $this->array_true = $array_true;
        $this->array_false = $array_false;
    }

    /**
     * Méthode permettent de parcourir toutes les réponses d'un QCM,
     * de traiter chaque élément pour échapper toutes les réponses.
     * @param array $replyArray Tableau/Taleau mulitidimentionnel
     * @return array $array Tableau monodimentinnel
     */
    public function fetchAllArray($replyArray)
    {
        $array = [];
        if (is_array($replyArray)) {
            // parccour le tableau pricipale 
            foreach ($replyArray as $replys) {
                // parcous les sous tableaux
                if (is_array($replys)) {
                    // fetchAllArray($replys);
                    foreach ($replys as $reply) {
                        $val = trim(htmlspecialchars($reply));
                        array_push($array, $val);
                    }
                } else {
                    $val = trim(htmlspecialchars($replys));
                    array_push($array, $val);
                }
            }
            return $array;
        }
    }

    

    /**
     * Prend les réponses de l'utilisateur, puis les comparent avec un tableau contenet les bonnes réponses
     * 
     * @param array $array_user Tableau contenent les réponses de l'utilisateur
     * @param array $array_good Tableau contenent les bonnes réponnses
     * @return array $array retourne un tableau contenet les réponsses corectes 
     */
    public function check_array($array_user, $array_good)
    {
        $array = [];
        foreach ($array_user as $reply) {
            // var_dump($reply);
            if (in_array($reply, $array_good)) {
                // echo $reply;
                array_push($array, $reply);
            }
        }
        return $array;
    }

    /**
     * Prend les réponses de l'utilisateur, puis les comparent avec un tableau contenet les bonnes réponses
     * 
     * @param array $array_user Tableau contenent les réponses de l'utilisateur
     * @param array $array_good Tableau contenent les bonnes réponnses
     * @return array $array retourne un tableau contenet les réponsses fauses 
     */
    public function check_array_false($array_user, $array_good)
    {
        $array = [];
        foreach ($array_user as $reply) {
            // var_dump($reply);

            if (!in_array($reply, $array_good)) {
                // echo $reply;
                array_push($array, $reply);
            }
        }
        return $array;
    }

    /**
     * fonction get_flashed  compte le nombre de bonne réponse de l'utilisateur et 
     * revoi un message en fonction du score du QCM
     *
     * @param array $array_user Tableau contenent les réponses corect de l'utilisateur
     * @return void retourne un message en fonction du score  
     */
    public function get_flashed($array)
    {
        $nb_reply = count($array);

        if ($nb_reply >= 2) {
            return Session::getInstance()->setFlash('success', 'Bravos vous avez réussier ce QCM !');
        }
        return Session::getInstance()->setFlash('danger', "Vous n'avais pas eux la moyen à ce QCM !");
    }

    /**
     *  @param array $arrayTrue Le trableau contement les bonnes réponses
     *  @param array $arrayUser Le trableau contement les  réponses de l'utilisateur
     *  @return int $scoreUser Le score de l'utilisateur
     */
    public function result_QCM($arrayTrue, $arrayUser)
    {
        $score = 0;
        if(is_array($arrayUser)){
            foreach($arrayUser as $reply){
                // var_dump($reply);
                if (in_array($reply, $arrayTrue)){
                    $score++;
                }
            }
            return $score;
        }

        return $score;
    }

    /**
     * fonction qui colorie en vert si la réponse de l'utilisateur est bonne
     * 
     */
    public function correction_reply($id)
    {
        // var_dump($this->array_true);
        // var_dump($id);
        if (in_array($id, $this->array_true)) {
            // echo "is-valid";
            return " is-valid";
        } elseif (in_array($id, $this->array_false)) {
            // echo "is-invalid";
            return " is-invalid";
        }
        echo "rien";
    }

    public function test()
    {
        var_dump("QCMTool");
    }
}