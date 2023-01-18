<?php

    if(!isset($_SESSION['kullanici']))
    {
        $_SESSION['girismesaj'] ;
        header('location: giris.php');
    }

?>