<?php
require_once "../app/class/Session.php";
require_once "../app/class/App.php";
require_once "../app/class/Session.php";
require_once "../app/models/Database.php";
require_once "../app/models/auth/Auth.php";
require_once "../app/models/QCM2Auth.php";
?>
<!-- NAVBAR_HEAD -->
<nav class="navbar navbar-expand-lg sticky-top navbar-white menu_header <?php if (Session::getInstance()->read('auth') && $uri !== "/") : echo "py-0";
                                                                        endif ?>">
    <!-- <a class="navbar-brand" href="home-page.html">Bike Comparator</a> -->
    <?php if (Session::getInstance()->read('auth')) : ?>
        <a class="navbar-brand" href="/accueil">The QCM Land <i class="fas fa-check"></i></a>
    <?php else : ?>
        <a class="navbar-brand" href="/">The QCM Land <i class="fas fa-check"></i></a>
    <?php endif ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto block-btnHeader">
            <?php if (!Session::getInstance()->read('auth') && !Session::getInstance()->read('admin')) : ?>
                <li><a href="/inscription" class="nav-link btn mx-2 px-3">S'inscrire</a></li>
                <li><a href="/connection" class="nav-link btn px-3">Se connecter</a></li>
            <?php endif ?>
        </ul>

        <ul class="navbar-nav mr-rignt">
            <?php if (Session::getInstance()->read('auth') && $uri !== "/") : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <?php if (!empty(Session::getInstance()->read('auth')->picture)) : ?>
                            <img class="img-xs rounded-circle" id="profilImageNav" src="../../data/pictureProfil/<?= Session::getInstance()->read('auth')->picture ?>" alt="Profile image"> </a>
                <?php else : ?>
                    <img class="img-xs rounded-circle" id="profilImageNav" src="../../data/pictureProfil/sign_in.png" alt="Profile image"> </a>
                <?php endif ?>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <?php if (!empty(Session::getInstance()->read('auth')->picture)) : ?>
                            <img class="img-xs rounded-circle" id="profilImageNav" src="../../data/pictureProfil/<?= Session::getInstance()->read('auth')->picture ?>" alt="Profile image"> </a>
                        <?php else : ?>
                            <img class="img-xs rounded-circle" id="profilImageNav" src="../../data/pictureProfil/sign_in.png" alt="Profile image"> </a>
                        <?php endif ?>
                        <p class="mb-1 mt-3 font-weight-semibold"><?= Session::getInstance()->read('auth')->first_name ?> <?= Session::getInstance()->read('auth')->name ?></p>
                        <p class="font-weight-light text-muted mb-0"><?= Session::getInstance()->read('auth')->email ?></p>
                    </div>
                    <a class="dropdown-item" href="/profil">Profile<i class="dropdown-item-icon ti-dashboard"></i></a>
                    <?php if (Session::getInstance()->read('auth')->author == 1) : ?>
                        <a class="dropdown-item" href="/accueil/espace-auteur">Espace Auteur<i class="dropdown-item-icon ti-dashboard"></i></a>
                    <?php endif ?>
                    <a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
                    <a class="dropdown-item" href="/profil/setting">Paramètre<i class="dropdown-item-icon ti-comment-alt"></i></a>
                    <a class="dropdown-item" href="/logout">Déconnetion<i class="dropdown-item-icon ti-power-off"></i></a>
                </div>
                </li>
            <?php endif ?>

            <?php if (Session::getInstance()->read('admin') && $uri === "/admin/admin-home") : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" id="profilImageNav" src="../../data/pictureProfil/sign_in.png" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-xs rounded-circle" id="profilImageNav" src="../../data/pictureProfil/sign_in.png" alt="Profile image"> </a>
                            <p class="mb-1 mt-3 font-weight-semibold"><?= Session::getInstance()->read('admin')->username ?></p>
                            <p class="font-weight-light text-muted mb-0"><?= Session::getInstance()->read('admin')->email ?></p>
                        </div>

                        <a class="dropdown-item" href="/admin/admin-home">Gestion Auteur<i class="dropdown-item-icon ti-comment-alt"></i></a>
                        <a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
                        <a class="dropdown-item" href="">Paramètre<i class="dropdown-item-icon ti-comment-alt"></i></a>
                        <a class="dropdown-item" href="/admin/deconnection-admin">Déconnetion<i class="dropdown-item-icon ti-power-off"></i></a>
                    </div>
                </li>
            <?php endif ?>
        </ul>

    </div>
</nav>
<!-- NAVBAR_HEAD END -->


<!-- banner message -->
<?php require_once "banner-message.php" ?>
<!-- <?php if (Session::getInstance()->hasFlash()) : ?>
    <?php foreach (Session::getInstance()->getFlash() as $type => $message) : ?>
        <div class="alert alert-<?= $type ?> alert-dismissible fade show">
            <?= $message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach; ?>
<?php endif; ?> -->
<!-- banner message -->

<?php
// var_dump($_SESSION);
// echo '<pre>';
// echo Session::getInstance()->read('auth')->id_user;
// echo '</pre>';

?>