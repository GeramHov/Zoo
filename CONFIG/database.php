<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=zoo', 'root', '');
// ALERT WHEN REQUEST FAILED
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 

return $db;