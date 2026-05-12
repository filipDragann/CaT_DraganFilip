<?php
require_once('db.php');

$sql = file_get_contents(__DIR__ .'/../data/init.sql');
$db = getDB();
$db->exec($sql);
echo "BD s-a creat cu succes! ";
