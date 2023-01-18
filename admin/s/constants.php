<?php
session_start();
try {
     $db = new PDO("mysql:host=localhost;dbname=final", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}
?>