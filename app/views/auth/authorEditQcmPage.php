<?php

include "../app/class/App.php";
include "../app/class/Session.php";
include "../app/models/Database.php";
include "../app/models/QCModel.php";

Session::getInstance()->restrictUser("auth");
$db = App::getDatabase();
$qcm = new QCModel();

?>
<?php if (!empty($_GET)) : ?>
    <?php $id_qcm = trim(htmlspecialchars($_GET["id"])); ?>
    <?php $listQCM = $qcm->getQcm($db, $id_qcm); 
    // echo "<pre>";
    // var_dump($listQCM[0]->id_qestion);
    // echo"</pre>";
    ?>

<?php endif ?>

<div class="container containerEditQcm my-5 p-3 bg-white ">
    <!-- BANNER HEADER -->
    <div class="row">
        <!-- BTN RETURN -->
        <div class="col-2">
            <a href="/accueil/espace-auteur" class="btn border btn-submit px-3" data-toggle="modal" data-target="#returneMenuQcmModal">Revenir au menu</a>
        </div>
        <!-- BTN RETURN -->
        <div class="col-10 pl-0">
            <h1 class="containerEditQcm_title mb-0">Editer le QCM</h1>
        </div>
    </div>
    <!-- BANNER HEADER -->

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-2">
                <div class="containerEditQcm-blockPicture">
                    <!-- PICTURE -->
                    <img src="../../data/img/<?php if (!empty($listQCM)) echo $listQCM[0]->poster_movie ?>" alt=""id="blah" class="containerEditQcm-blockPicture__picture">
                    <div class="containerEditQcm-blockPicture__option">
                        <!-- <i class="far fa-arrow-alt-circle-left  fa-3x mr-4" style="cursor : pointer;"></i> -->
                        <!-- <i class="fas fa-trash-alt fa-3x" style="cursor : pointer;"></i> -->
                        <!-- <i class="far fa-arrow-alt-circle-right fa-3x ml-4" style="cursor : pointer;"></i> -->
                        <label for="file-input">
                            <!-- <i class="fas fa-plus-circle fa-3x icon-picture icon-picture" style="cursor: pointer;"></i> -->
                            <i class="fas fa-camera fa-3x icon-picture" style="cursor: pointer;"></i>
                        </label>
                        <input id="file-input" type="file" name="poster_qcm" style="display: none;" onchange="readURL(this);"/>
                    </div>
                    <!-- PICTURE -->
                </div>
            </div>

            <div class="col-10 pl-0">
                <!-- TITLE -->
                <div class="form-group">
                    <label for="" class="">Titre</label>
                    <input type="text" class="form-control" name="title_qcm" id="" aria-describedby="emailHelp" value="<?php if (!empty($listQCM)) echo $listQCM[0]->title_movie ?>">
                </div>
                <div class="form-group">
                    <label for="" class="">Réalisateur</label>
                    <input type="text" class="form-control" name="director" id="" value="<?php if (!empty($listQCM[0]->director_movie)) echo $listQCM[0]->director_movie  ?>">
                </div>
                <div class="form-group">
                    <label for="" class="">Année de Sortie</label>
                    <input type="text" class="form-control" name="release_date" id="" value="<?php if (!empty($listQCM[0]->release_date)) echo $listQCM[0]->release_date ?>">
                </div>
                <!-- TITLE -->
                <!-- FORM UPDATE PICTURE -->
                <!-- <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="poster_qcm" value="<?php if (!empty($listQCM)) echo $listQCM[0]->poster_movie ?>" lang="fr" accept="picture/*" />
                        <label class="custom-file-label" for="image">Charger une image</label>
                    </div>
                </div> -->
                <!-- FORM UPDATE PICTURE -->
            </div>
        </div>
        <!-- QUESTION 1 -->
        <div class="form-group row px-2">
            <label for="" class="col-sm-1 ">Question</label>
            <input type="text" class="form-control col-sm-11 form-control-plaintex py-0" name="question1" id="" value="<?php if (!empty($listQCM)) echo $listQCM[0]->question ?>">
        </div>
        <!-- QUESTION 1 -->
        <!-- GOOD REPLY 1 -->
        <div class="form-group row px-2">
            <label for="" class="col-sm-2">Bonne Réponse</label>
            <input type="text" class="form-control col-sm-10 form-control-plaintex" name="good_reply1" id="" value="<?php if (!empty($listQCM)) echo $listQCM[0]->good_reply ?>">
        </div>
        <!-- GOOG REPLY 1 -->
        <!-- REPLY -->
        <div class="form-row">
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 1</label>
                    <input type="text" class="form-control" name="q1r1" id="" value="<?php if (!empty($listQCM)) echo $listQCM[0]->reply1 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 2</label>
                    <input type="text" class="form-control" name="q1r2" id="" value="<?php if (!empty($listQCM)) echo $listQCM[0]->reply2 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 3</label>
                    <input type="text" class="form-control" name="q1r3" id="" value="<?php if (!empty($listQCM)) echo $listQCM[0]->reply3 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 4</label>
                    <input type="text" class="form-control" name="q1r4" id="" value="<?php if (!empty($listQCM)) echo $listQCM[0]->reply4 ?>">
                </div>
            </div>
        </div>
        <!-- REPLY -->
        <!-- QUESTION 1 -->
        <hr class="mb-3 mt-1">
        <!-- QUESTION 2 -->
        <div class="form-group row px-2">
            <label for="" class="col-sm-1 ">Question</label>
            <input type="text" class="form-control col-sm-11 form-control-plaintex" name="question2" id="" value="<?php if (!empty($listQCM[1])) echo $listQCM[1]->question ?>">
        </div>
        <div class="form-group row px-2">
            <label for="" class="col-sm-2">Bonne Réponse</label>
            <input type="text" class="form-control col-sm-10 form-control-plaintex" name="good_reply2" id="" value="<?php if (!empty($listQCM[1])) echo $listQCM[1]->good_reply ?>">
        </div>
        <!--  -->
        <div class="form-row">
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 1</label>
                    <input type="text" class="form-control" name="q2r1" id="" value="<?php if (!empty($listQCM[1])) echo $listQCM[1]->reply1 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 2</label>
                    <input type="text" class="form-control" name="q2r2" id="" value="<?php if (!empty($listQCM[1])) echo $listQCM[1]->reply2 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 3</label>
                    <input type="text" class="form-control" name="q2r3" id="" value="<?php if (!empty($listQCM[1])) echo $listQCM[1]->reply3 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 4</label>
                    <input type="text" class="form-control" name="q2r4" id="" value="<?php if (!empty($listQCM[1])) echo $listQCM[1]->reply4 ?>">
                </div>
            </div>
        </div>
        <!-- QUESTION 2 -->
        <hr class="mb-3 mt-1">
        <!-- QUESTION 3 -->
        <div class="form-group row px-2">
            <label for="" class="col-sm-1 ">Question</label>
            <input type="text" class="form-control col-sm-11 form-control-plaintex py-0" name="question3" id="" value="<?php if (!empty($listQCM[2])) echo $listQCM[2]->question ?>">
        </div>
        <!-- QUESTION 3 -->
        <!-- GOOD REPLY 4 -->
        <div class="form-group row px-2">
            <label for="" class="col-sm-2">Bonne Réponse</label>
            <input type="text" class="form-control col-sm-10 form-control-plaintex" name="good_reply3" id="" value="<?php if (!empty($listQCM[2])) echo $listQCM[2]->good_reply ?>">
        </div>
        <!-- GOOG REPLY 4 -->
        <div class="form-row">
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 1</label>
                    <input type="text" class="form-control" name="q3r1" id="" value="<?php if (!empty($listQCM[2])) echo $listQCM[2]->reply1 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 2</label>
                    <input type="text" class="form-control" name="q3r2" id="" value="<?php if (!empty($listQCM[2])) echo $listQCM[2]->reply2 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 3</label>
                    <input type="text" class="form-control" name="q3r3" id="" value="<?php if (!empty($listQCM[2])) echo $listQCM[2]->reply3 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 4</label>
                    <input type="text" class="form-control" name="q3r4" id="" value="<?php if (!empty($listQCM[2])) echo $listQCM[2]->reply4 ?>">
                </div>
            </div>
        </div>
        <!-- QUESTION 3 -->
        <hr class="mb-3 mt-1">
        <!-- QUESTION 4 -->
        <div class="form-group row px-2">
            <label for="" class="col-sm-1 ">Question</label>
            <input type="text" class="form-control col-sm-11 form-control-plaintex py-0" name="question4" id="" value="<?php if (!empty($listQCM[3])) echo $listQCM[3]->question ?>">
        </div>
        <!-- QUESTION 4 -->
        <!-- GOOD REPLY 4 -->
        <div class="form-group row px-2">
            <label for="" class="col-sm-2">Bonne Réponse</label>
            <input type="text" class="form-control col-sm-10 form-control-plaintex" name="good_reply4" id="" value="<?php if (!empty($listQCM[3])) echo $listQCM[3]->good_reply ?>">
        </div>
        <!-- GOOG REPLY 4 -->
        <div class="form-row">
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 1</label>
                    <input type="text" class="form-control" name="q4r1" id="" value="<?php if (!empty($listQCM[3])) echo $listQCM[3]->reply1 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 2</label>
                    <input type="text" class="form-control" name="q4r2" id="" value="<?php if (!empty($listQCM[3])) echo $listQCM[3]->reply2 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 3</label>
                    <input type="text" class="form-control" name="q4r3" id="" value="<?php if (!empty($listQCM[3])) echo $listQCM[3]->reply3 ?>">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Réponse 4</label>
                    <input type="text" class="form-control" name="q4r4" id="" value="<?php if (!empty($listQCM[3])) echo $listQCM[3]->reply4 ?>">
                </div>
            </div>
        </div>
        <!-- QUESTION 4 -->
        <!-- BANNER BTN ACTION -->
        <div class="banner-btn text-right mb-4">
            <button type="reset" class="btn btn-light border">Annuler</button>
            <button type="submit" class="btn btn-primary border btn-submit">Enregistrer</button>
        </div>
        <!-- BANNER BTN ACTION -->

        <input type="hidden" name="id_qcm" value="<?php if (!empty($listQCM)) echo $listQCM[0]->id_qcm ?>">
        <input type="hidden" name="posterUpdate" value="<?php if (!empty($listQCM)) echo $listQCM[0]->poster_movie ?>">
        <input type="hidden" name="id_question1" value="<?php if (!empty($listQCM)) echo $listQCM[0]->id_question ?>">
        <input type="hidden" name="id_question2" value="<?php if (!empty($listQCM[1])) echo $listQCM[1]->id_question ?>">
        <input type="hidden" name="id_question3" value="<?php if (!empty($listQCM[2])) echo $listQCM[2]->id_question ?>">
        <input type="hidden" name="id_question4" value="<?php if (!empty($listQCM[3])) echo $listQCM[3]->id_question ?>">
    </form>

    <!-- Modal -->
    <div class="modal fade" id="returneMenuQcmModal" tabindex="-1" role="dialog" aria-labelledby="returneMenuQcmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returneMenuQcmModalLabel">Abandonner les moddification du QCM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Est vous sûr de vouloir abandonner les modifications du QCM?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border" data-dismiss="modal">Annuler</button>
                    <a href="/accueil/espace-auteur" class="btn btn-submit">Confirmer</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</div>