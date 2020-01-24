<?php
require_once __DIR__ . '/Session.php';

// Client code ..
$session = Session::getInstance();
if ($session->has('user')) {
    $session->destroy();
    echo "User is logged out ";
} else {
    echo "No User logging";
}

echo "<br /><a href=\"login.php\">Login</a>";
