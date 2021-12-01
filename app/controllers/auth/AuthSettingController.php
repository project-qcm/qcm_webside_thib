<?php


if (!empty($_POST)) {

    require_once "../app/class/Session.php";
    require_once "../app/class/App.php";
    require_once "../app/models/Database.php";
    require_once "../app/models/auth/Auth.php";

    $db = App::getDatabase();
    $auth = new Auth(Session::getInstance());

    $erros = [];

    var_dump($_POST);
    // var_dump($_FILES);
    
    $dataPage = trim((htmlspecialchars($_POST['page'])));
    // var_dump($dataPage);
    
    if ($dataPage === "data-page") {
        $image = App::renameUploadFile($_FILES, "image");
        function updatePictureQcm($file)
        {
            // var_dump($file["poster_qcm"]["error"]);
            if (!empty($file["image"]["error"])) {
                return false;
            }
            return true;
        }
        $statuPictureUpdate = updatePictureQcm($_FILES);
        var_dump($statuPictureUpdate);

        $name = trim(htmlspecialchars($_POST['name']));
        $first_name = trim(htmlspecialchars($_POST['first_name']));
        $username = trim(htmlspecialchars($_POST['username']));
        $email = trim(htmlspecialchars($_POST['email']));
        $erros = [];

        if (empty($first_name)) {
            $erros = "Le champs prénons n'a pas été remplis";
        }

        if (empty($name)) {
            $erros = "Le champs nom n'a pas été remplis";
        }

        if (empty($username)) {
            $erros = "Le champs pseudo n'a pas été remplis";
            // Session::getInstance()->setFlash('danger', "Le champ ");
        }

        if (empty($email)) {
            $erros = "Le champs email n'a pas été remplis";
            // Session::getInstance()->setFlash('danger', "vous n'avez pas remplie le champ email");
        }

        var_dump($erros);
        if (empty($erros)) {
            $user_id = Session::getInstance()->read('auth')->id_user;
            // var_dump($user_id);
        
            $user = $auth->updateUserInfo($db, $name, $first_name, $username, $email, $image, $user_id, $statuPictureUpdate);
            $userUpdate = $auth->fetchAuthById($db, $user_id);
            var_dump($userUpdate);

            if ($user) {
                // $auth->connect($userUpdate);
                $_SESSION['auth']->first_name = $userUpdate[0]->first_name;
                $_SESSION['auth']->name = $userUpdate[0]->name;
                $_SESSION['auth']->picture = $userUpdate[0]->picture;
                var_dump($_SESSION['auth']->first_name);
                
                Session::getInstance()->setFlash('success', 'Les information on bien été sauvegardé');
                App::redirect("/profil/setting");
                exit();
            } else {
                Session::getInstance()->setFlash('danger', 'Une erreur est survenue lors de la sauvegarde des information');
                App::redirect("/profil/setting");
                exit();
            }
        } else {
            Session::getInstance()->setFlash('danger', 'Toutes les champs doivent être remplies');
            App::redirect("/profil/setting");
            exit();
        }
    }
    if ($dataPage === "passord-page") {
        var_dump("password");
        die;
        if (empty($_POST['password'])) {
            $erros = "tous les champs non pas étaient remplis";
        } else {
            $passCurrent = trim(htmlspecialchars($_POST['password']));
            $user_id = $_SESSION['auth']->iduser;

            $user = $auth->fetchAuthById($db, $user_id);

            $req = $pdo->prepare('SELECT * FROM users WHERE iduser = ?');
            $req->execute([$user_id]);
            $user = $req->fetch();

            if ($user->password_verify($passCurrent, $user)) {
                var_dump("ok");
            } else {
                $erros =  "le mot de pass actuel ne corespon pas";
            }

            if (password_verify($passCurrent, $user->password)) {
                echo "ok";
            } else {
                $erros =  "le mot de pass actuel ne corespon pas";
            }
        }

        if (empty($_POST['password']) && empty($_POST['password_new']) && empty($_POST['password_confirm'])) {
            $erros = "tous les champs non pas étaient remplis";
        }

        if ($_POST['password'] === $_POST['password_new']) {
            $erros = "les deux mots sont identiques";
        }

        if ($_POST['password_new'] !== $_POST['password_confirm']) {
            $erros = "les deux mots de passe ne sont pasidentique";
        }

        debug($erros);

        if (empty($erros)) {


            $user_id = $_SESSION['auth']->iduser;
            $pass = trim(htmlspecialchars($_POST['password_new']));
            $password = password_hash($pass, PASSWORD_BCRYPT);

            $auth->updateUser($db, $password, $user_id);
            $req = $pdo->prepare('UPDATE users SET password = ? WHERE iduser = ?');
            $req->execute([
                $password,
                $user_id
            ]);
            Session::getInstance()->$_SESSION['flash']['success'] = 'le mot de passe à bien était mit à jour';
            header('Location: ../view/settingProfilPage.php');
        } else {
            $_SESSION['flash']['danger'] = $erros;
            header('Location: ../view/settingProfilPage.php');
        }
    }
}
