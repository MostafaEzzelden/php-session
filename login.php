<?php
require_once __DIR__ . '/Session.php';

// Client code ..
$session = Session::getInstance();

if (!$session->has('user')) {
    echo "Login New Users<br />";
    $session->set('user',  [
        'username' => 'mostafa ezz',
        'datetime' => date("Y-m-d H:i:s"),
    ]);
}

header("Location: home.php", true);
