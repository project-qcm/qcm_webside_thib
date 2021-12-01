<div class="container containerRegistration  mt-4 mb-5 px-5 py-3 bg-white">
    <h3 class="containerRegistration-title">Inscription</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row mt-4">
            <div class="col-4 pt-3">
                <div class="containerRegistration-blockPicture rounded-circle">
                    <!-- PICTURE -->
                    <img src="" alt="" id="blah" class="containerRegistration-blockPicture__picture rounded-circle">
                    <div class="containerRegistration-blockPicture__option">
                        <label for="file-input">
                            <!-- <i class="fas fa-plus-circle fa-3x icon-picture icon-picture" style="cursor: pointer;"></i> -->
                            <i class="fas fa-camera fa-3x icon-picture" style="cursor: pointer;"></i>
                        </label>
                        <input id="file-input" type="file" name="image" style="display: none;" onchange="readURL(this);" />
                    </div>
                    <!-- PICTURE -->
                </div>
            </div>
            <div class="col-8 px-1">
                <div class="form-group">
                    <label for="">Prénom</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>

        </div>
        <div class="form-group ">
            <label for="">Pseudo</label>
            <input type="text" class="form-control" name="username">
        </div>

        <!-- form picture -->
        <!-- <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" lang="fr" accept="picture/*" />
                <label class="custom-file-label" for="image">ajouter une photo</label>
            </div>
        </div> -->

        <div class="form-group ">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <!-- <div class="form-group ">
                <label for="">Confirmation email</label>
                <input type="email" class="form-control" id="" name="confirm-email">
            </div> -->

        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" class="form-control" id="" name="password">
        </div>
        <div class="form-group">
            <label for="">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="" name="password_confirm">
        </div>
        <div class="custom-control custom-checkbox my-3">
            <input type="checkbox" class="custom-control-input" id="CGU" name="CGU" value="">                                                                                                                    
            <label class="custom-control-label" for="CGU">J'accepter les <a href="http://">CGU</a></label>
        </div>
        <div class="block-btn">
            <button type="submit" class="btn btn-custome btn-block">Inscription</button>
        </div>


    </form>
</div>

<?php

// var_dump($_SESSION);
// echo realpath("data/img");