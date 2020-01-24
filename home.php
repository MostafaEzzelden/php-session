<?php
require_once __DIR__ . '/Session.php';

// Client code ..
$session = Session::getInstance();

if ($session->has('user')) {
    $user = $session->get('user');
    echo "* {$user['username']} is logged in at [{$user['datetime']}]";
} else {
    header("Location: login.php", true);
}

echo "<br/><a href=\"logout.php\">Log out</a>";
