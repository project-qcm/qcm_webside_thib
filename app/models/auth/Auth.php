<?php

class Auth
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function register($db, $name, $first_name, $username, $email, $password, $image, $statutPictureUpdate)
    {
        $passwordHash = $this->hashPassword($password);
        // $token = Str::str_random(60);

        $user = $db->query("INSERT INTO user SET name = ?, first_name = ?, username = ?, email = ?, password = ?", [
            $name,
            $first_name,
            $username,
            $email,
            $passwordHash
        ]);

        $user_id = $db->lastInsertId();

        if ($statutPictureUpdate === true) {
            $this->imageUpload($db, $image, $user_id);
        }
        // mail($email, 'Confirmation de votre compte social network', "pour valider votre compte cliqué sur ce lien\n\nhttp://localhost/workspace/social_network/app/view/confirme.php?id=$user_id&token=$token");
        Session::getInstance()->setFlash('success', 'vous allez recevoir un email de confiration à votre adresse email');

        return $user_id;
    }


    public function login($db, $email, $password)
    {
        $user = $db->query("SELECT * FROM user WHERE email = ? OR username = ?", [$email, $email])->fetch();

        if ($user && $this->passwordConfirm($password, $user)) {
            $this->connect($user);

            return $user;
        }
    }

    public function restrict()
    {
        if (!$this->session->read('auth')) {
            $this->session->setFlash('danger', "Vous n'avez pas le droit d'accéder à cette page");
            // $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
            App::redirect("/inscription");
            exit();
        }
    }

    /**
     * déconnect l'utilisateur
     */
    public function logout($key)
    {
        $this->session->delete($key);
        $_SESSION['flash']['success'] = 'vous étes maintenant déconnecté';
        return App::redirect('/connection');
    }

    /**
     * créer la séssion l'utilisateur
     */
    public function connect($user)
    {
        Session::getInstance()->write('auth', $user);
    }



    public function fetchAuthById($db, $user_id)
    {
        $user = $db->query("SELECT * FROM user WHERE id_user = ?", [
            $user_id
        ])->fetchAll();
        return $user;
    }

    public function updateUserInfo($db, $name, $first_name, $username, $email, $picture, $user_id, $statutPictureUpdate)
    {
        $user = $db->query('UPDATE user SET name = ?, first_name = ?, username = ?, email = ? WHERE id_user = ?', [
            $name,
            $first_name,
            $username,
            $email,
            $user_id
        ]);
        
        if ($statutPictureUpdate === true) {
            var_dump("picture");
            $this->imageUpload($db, $picture, $user_id);
        }

        return $user;
    }
    public function updateUser($db, $password, $user_id)
    {
        $db->query('UPDATE user SET password = ? WHERE id_user = ?', [
            $password,
            $user_id
        ]);
    }

    public function imageUpload($db, $imageUser, $user_id)
    {
        // $folder = "C:/xampp/htdocs/Workspace/QCM_website/public/data/pictureProfil/";
        $folder = "./data/pictureProfil/";
        $image = $imageUser;
        $path = $folder . $image;

        $target_file = $folder . basename($_FILES["image"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $allowed = array('jpeg', 'png', 'jpg');

        $ext = pathinfo($image, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], $path);

            $db->query('UPDATE user SET picture = ? WHERE id_user = ?', [
                $image,
                $user_id,
            ]);

            return $image;
        }
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function passwordConfirm($password, $user)
    {
        return password_verify($password, $user->password);
    }
}
