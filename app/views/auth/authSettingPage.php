<?php


// var_dump($_SESSION);
// var_dump($listQcmUser);
?>


<div class="container">

    <div class="containerSettingPage-title pl-3">
        Paramètre
    </div>
    <div class="containerSettingPage bg-white px-2 py-4 mb-5">
        <div class="row">
            <div class="col-4">
                <!-- List group -->
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Information</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Changer le mot de pase</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Autre</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                </div>
            </div>
            <div class="col-8">
                <!-- Tab panes -->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active border p-2" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="page" value="data-page">
                            <div class="row">
                                <div class="col-3 pt-3">
                                    <div class="containerRegistration-blockPicture rounded-circle">
                                        <!-- PICTURE -->
                                        <img src="../../data/pictureProfil/<?= Session::getInstance()->read('auth')->picture ?>" alt="" id="blah" class="containerRegistration-blockPicture__picture rounded-circle">
                                        <div class="containerRegistration-blockPicture__option">
                                            <label for="file-input">
                                                <i class="fas fa-camera fa-3x icon-picture" style="cursor: pointer;"></i>
                                            </label>
                                            <input id="file-input" type="file" name="image" style="display: none;" onchange="readURL(this);" />
                                        </div>
                                        <!-- PICTURE -->
                                    </div>
                                </div>
                                <div class="col-9 px-1">
                                    <div class="form-group">
                                        <label for="">Prénom</label>
                                        <input type="text" class="form-control" name="first_name" value="<?= Session::getInstance()->read('auth')->first_name ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" class="form-control" name="name" value="<?= Session::getInstance()->read('auth')->name ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="">Pseudo</label>
                                <input type="text" class="form-control" name="username" value="<?= Session::getInstance()->read('auth')->username ?>"readonly>
                            </div>
                            <div class="form-group ">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= Session::getInstance()->read('auth')->email ?> "readonly>
                            </div>
                            <div class="block-btn text-right">
                                <button type="reset" class="btn btn-light border">Annuler</button>
                                <button type="submit" class="btn btn-submit">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade border p-2" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <form action="" method="POST">
                            <input type="hidden" name="page" value="password-page">
                            <div class="form-group">
                                <label for="">Mot de passe actuel</label>
                                <input type="password" class="form-control" id="" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="" name="new_password">
                            </div>
                            <div class="block-btn text-right">
                                <button type="reset" class="btn btn-light border">Annuler</button>
                                <button type="submit" class="btn btn-submit">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Ut ut do pariatur aliquip aliqua aliquip exercitation do nostrud commodo reprehenderit aute ipsum voluptate. Irure Lorem et laboris nostrud amet cupidatat cupidatat anim do ut velit mollit consequat enim tempor. Consectetur est minim nostrud nostrud consectetur irure labore voluptate irure. Ipsum id Lorem sit sint voluptate est pariatur eu ad cupidatat et deserunt culpa sit eiusmod deserunt. Consectetur et fugiat anim do eiusmod aliquip nulla laborum elit adipisicing pariatur cillum.</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod eu pariatur culpa mollit in irure.</div>
                </div>
            </div>
        </div>
    </div>

</div>