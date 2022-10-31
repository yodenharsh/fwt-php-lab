<?php
require_once('./layout/header.php');
setcookie('email', time() - 3600);
echo "<h3>Logout successful</h3>";
