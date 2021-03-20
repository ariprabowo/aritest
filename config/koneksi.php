<?php
define('host','localhost');
define('username','root');
define('password','');
define('db', 'db_production');
 
// Buat Koneksinya
$db = new mysqli(host, username, password, db);
?>