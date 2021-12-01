<?php

session_start();

unset($_SESSION['auth']);

$_SESSION['flash']['success'] = 'vous étes maintenant déconnecté';
App::redirect("/connection");