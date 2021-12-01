<?php

require_once "../app/class/Session.php";
require_once "../app/class/App.php";
require_once "../app/class/Session.php";
require_once "../app/models/Database.php";
require_once "../app/models/auth/Auth.php";
require_once "../app/models/QCM2Auth.php";

$db = App::getDatabase();
$qcm2User = new QCM2Auth();
$id_user = Session::getInstance()->read('auth')->id_user;
$listQcmUser = $qcm2User->fetchQcmByAuth($db, $id_user);

// var_dump($listQcmUser);
?>

<div class="container my-3">
    <div class="containerProfile bg-white">
        <!-- <div class="container-header">
        </div> -->
        <div class="container-presentation row my-3">
            <div class="container-picture col-4">
                <?php if (!empty(Session::getInstance()->read('auth')->picture)) : ?>
                    <img src="../../data/pictureProfil/<?= Session::getInstance()->read('auth')->picture ?>" alt="Profile image" class="rounded-circle" id="profilePicture"> </a>
                <?php else : ?>
                    <img src="../../data/pictureProfil/sign_in.png" alt="Profile image" class="rounded-circle" id="profilePicture"> </a>
                <?php endif ?>
                <!-- <img src="../../data/pictureProfil/<?= Session::getInstance()->read('auth')->picture ?>" alt="Profile image" class="rounded-circle" id="profilePicture"> -->
            </div>
            <div class="container-info col-8 my-2">
                <div class="row">
                    <div class="col-5 px-0">
                        <h4><?= Session::getInstance()->read('auth')->first_name ?></h4>
                    </div>
                    <div class="col-7 px-0 ">
                        <h4 class="container-info__name"><?= Session::getInstance()->read('auth')->name ?></h4>
                    </div>
                </div>
                <h6><?= Session::getInstance()->read('auth')->email ?></h6>
            </div>
        </div>
        <div class="container-body">
            <div class="row">
                <div class=" col-2">
                    <div class="block-setting p-2">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action">Cras justo odio</li>
                            <li class="list-group-item list-group-item-action ">Dapibus ac facilisis in</li>
                            <li class="list-group-item list-group-item-action">Morbi leo risus</li>
                            <li class="list-group-item list-group-item-action">Porta ac consectetur ac</li>
                        </ul>
                    </div>
                </div>
                <div class=" col-10 ">
                    <div class="container-table border">
                        <table class="table table-hover table-sm " id="tableUQcmByUser">
                            <thead class="">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">QCM</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Date</th>
                                    <th scope="col"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listQcmUser as $key) : ?>
                                    <tr>
                                        <th scope="row"><?= $key->id_result ?></th>
                                        <td>
                                            <i class="fas fa-check-circle fa-1x" style="<?php if ($key->score_qcm > 2) : echo "color:#2e7e32"; endif ?>"></i>
                                            <?= $key->title_movie ?>
                                        </td>
                                        <td><?= $key->score_qcm ?>/4</td>
                                        <td><?= $key->date_at ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>