<?php

require_once "../app/class/App.php";
// include "../app/class/Session.php";
require_once "../app/models/Database.php";
require_once "../app/models/QCModel.php";
require_once "../app/class/QcmTool.php";

Session::getInstance()->restrictUser("auth");
if (isset($array_check) && isset($array_check_false)) {
    $correction = new QcmTool($array_check, $array_check_false);
} else {
    $correction = new QcmTool();
}
// QCModel::echotest();
// var_dump($array_check);
$db = App::getDatabase();
$qcm = new QCModel();

$id_qcm = trim(htmlspecialchars($_GET["id"]));
$listQCM = $qcm->getQcm($db, $id_qcm)
?>
<?php if ($listQCM) : ?>
    <div class="container containerQcm  my-4 bg-white p-4">
        <div class="row">
            <div class="col-3">
                <a href="/accueil" class="btn btn-submit border containerQcm-btnAction mb-3" value="Envoyer">Revenir au menu</a>
                <img src="../data/img/<?= $listQCM[0]->poster_movie ?>" alt="affiche du film" class="containerQcm__picture">
                <div class="block-info mt-2">
                    <h6>Information sur le Film</h6>
                    <p class="font-weight-bold my-1">Réalisateur : <?= $listQCM[0]->director_movie ?> </p>
                    <p class="font-weight-bold my-1">Date de sortie : <?= $listQCM[0]->release_date ?> </p>
                </div>
            </div>
            <div class="col-9 pl-4">
                <h1 class="mb-2 containerQcm-title"><?= $listQCM[0]->title_movie ?></h1>
                <form action="" method="post">
                    <input type="hidden" name="title_qcm" value="<?= $listQCM[0]->title_movie ?>">
                    <input type="hidden" name="id_qcm" value="<?= $listQCM[0]->id_qcm ?>">
                    <?php foreach ($listQCM as $row) : ?>
                        <h6><?= $row->question ?></h6>
                        <?php
                        echo "<pre>";
                        var_dump($correction->correction_reply($row->reply1));
                        echo "</pre>";
                        ?>
                        <input type="hidden" name="goodReply[]" value="<?= $row->good_reply ?>">
                        <div class="forn-reaply mb-3">
                            <div class="form-box">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input <?= $correction->correction_reply($row->reply1) ?>" name="question[]" value="<?= $row->reply1 ?>" id="<?= $row->reply1 ?>">
                                    <label class="custom-control-label" for="<?= $row->reply1 ?>"><?= $row->reply1  ?></label>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input <?= $correction->correction_reply($row->reply2) ?>" name="question[]" value="<?= $row->reply2 ?>" id="<?= $row->reply2 ?>">
                                    <label class="custom-control-label" for="<?= $row->reply2 ?>"><?= $row->reply2  ?></label>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input <?= $correction->correction_reply($row->reply3) ?>" name="question[]" value="<?= $row->reply3 ?>" id="<?= $row->reply3 ?>">
                                    <label class="custom-control-label" for="<?= $row->reply3 ?>"><?= $row->reply3  ?></label>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input <?= $correction->correction_reply($row->reply4) ?>" name="question[]" value="<?= $row->reply4 ?>" id="<?= $row->reply4 ?>">
                                    <label class="custom-control-label" for="<?= $row->reply4 ?>"><?= $row->reply4  ?></label>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="banner-btn mt-4">
                        <input type="reset" class="btn btn-light border" value="Annuler">
                        <input type="submit" class="btn btn-submit border" value="Envoyer">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php else : ?>
    <?= "qcm" ?>
<?php endif ?>