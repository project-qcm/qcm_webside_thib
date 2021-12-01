<?php
include "../app/class/App.php";
include "../app/class/Session.php";
include "../app/models/Database.php";
include "../app/models/QCModel.php";

Session::getInstance()->restrictUser("auth");
$db = App::getDatabase();
$qcm = new QCModel(Session::getInstance());
$listQcm = $qcm->fetchAllQcm($db);
?>
<h1 class="text-center mt-3 mb-5">Les QCM</h1>
<form action="" method="post">
    <div class="container ">
        <div class="banner-btn text-right my-3">
            
            <!-- <button type="reset " class="btn btn-light border">Annuler</button> -->
            <a href="/accueil/espace-auteur/edit" class="btn btn-submit">Ajouter un QCM</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger sendNewSms" data-toggle="modal" data-target="#deleteQcmModal" disabled>Supprimer</button>
            <!-- Button trigger modal -->
        </div>
        <form action="">
            <div class="container-tableQcmAuthor px-2 mb-5">
                <table class="table table-hover table-sm" id="tableQCM">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col"></th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listQcm as $qcm) : ?>
                            <tr>
                                <th scope="row"><?= $qcm->id_qcm ?></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input checkme" name="qcm[]" value="<?= $qcm->id_qcm ?>" id="qcm_<?= $qcm->id_qcm ?>">
                                        <label class="custom-control-label" for="qcm_<?= $qcm->id_qcm ?>"><?= $qcm->title_movie ?></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td><?= $qcm->date_at ?></td>
                                <td><a href="/accueil/espace-auteur/edit?id=<?= $qcm->id_qcm ?>" class="btn border btn-submit">Modifier</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteQcmModal" tabindex="-1" role="dialog" aria-labelledby="deleteQcmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteQcmModalLabel">Supprimer le QCM</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Est vous sûr de vouloir suprimer ce QCM ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light border" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-submit">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </form>
    </div>
</form>

<script>
    var checker = document.querySelectorAll("input[type='checkbox']");
    var sendbtn = document.getElementById('sendNewSms');
    // when unchecked or checked, run the function
    checker.onchange = function() {
        if (this.checked) {
            console.log("checked");
            sendbtn.disabled = false;
        } else {
            sendbtn.disabled = true;
        }

    }
</script>