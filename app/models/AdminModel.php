<?php

class AdminModel
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function login($db, $email, $password)
    {
        $user = $db->query("SELECT * FROM admin WHERE email = ? OR username = ?", [$email, $email])->fetch();

        if ($user && $this->passwordConfirm($password, $user)) {
            $this->connect($user);

            return $user;
        }
    }

    /**
     * créer la séssion l'administrateur
     */
    public function connect($admin)
    {
        Session::getInstance()->write('admin', $admin);
    }

    /**
     * list tout les utilisateurs inscrit 
     */
    public function listUserAll($db)
    {
        $user = $db->query("SELECT * FROM user ")->fetchAll();
        return $user;
    }

    /**
     * 
     */
    public function switchStatutAuthor($db, $id_user)
    {
        try {
        } catch (PDOException $e) {
            echo "PDOException: " . $e->getMessage();
        }
        $author = $db->query("UPDATE user SET author = 1 WHERE id_user = ?", [$id_user]);
        return $author;
        // exit();
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function passwordConfirm($password, $admin)
    {
        return password_verify($password, $admin->password);
    }
}
