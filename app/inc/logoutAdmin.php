<?php

session_start();

unset($_SESSION['admin']);

$_SESSION['flash']['success'] = 'vous étes maintenant déconnecté';
App::redirect("/admin");