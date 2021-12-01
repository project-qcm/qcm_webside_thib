<?php
include "../app/class/App.php";
include "../app/class/Session.php";
include "../app/models/Database.php";
include "../app/models/AdminModel.php";

Session::getInstance()->restrictUser("admin");

$db = App::getDatabase();
$admin = new AdminModel(Session::getInstance());
$listUser = $admin->listUserAll($db);
?>
<h1 class="text-center mt-3 mb-5">Setting</h1>
<form action="" method="post">
    <div class="container">
        <table class="table table-striped border" id="tableUser2Author">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Email</th>
                    <th scope="col">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUser as $key) : ?>
                    <tr>
                        <th scope="row"><?= $key->id_user ?></th>
                        <td><?= $key->username ?></td>
                        <td><?= $key->name ?> </td>
                        <td><?= $key->first_name ?></td>
                        <td><?= $key->email ?></td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="authot[]" value="<?= $key->id_user ?>" id="<?= $key->id_user ?>" <?php if($key->author == 1): echo "checked"; endif ?>>
                                <label class="custom-control-label" for="<?= $key->id_user ?>">Auteur</label>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="banner-btn text-right mt-3">
            <button type="reset " class="btn btn-light border">Annuler</button>
            <button type="submit" class="btn btn-submit border">Enregistrer</button>
        </div>
    </div>
</form>
