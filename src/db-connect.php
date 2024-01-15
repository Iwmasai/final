<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517350-final';
const USER = 'LAA1517350';
const PASS = 'Pass0902';
$connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
$pdo = new PDO($connect, USER, PASS);
?>
