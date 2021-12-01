<?php

spl_autoload_register('app_autoload');

function app_autoload($class)
{
    // require_once "../class/$class.php";
    // require_once "../model/Database.php";
    // require_once "../model/Auth.php";
    include "../app/class/App.php";
    include "../app/class/Session.php";
    include "../app/models/Database.php";
    include "../app/models/AdminModel.php";
    include "../app/models/auth/Auth.php";
}
