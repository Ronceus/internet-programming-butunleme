<?php include('s/constants.php') ?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Giriş</h1>
            <br>
            <?php

                if (isset($_POST['kullaniciadi'])) {
	
	            $uye = $db->prepare("SELECT id, kullaniciadi, sifre FROM tadmin WHERE kullaniciadi = ? AND sifre = ? ");
	            $uye->execute([$_POST['kullaniciadi'], md5($_POST['sifre'])]);

	            $uye = $uye->fetchAll();

	            if (count($uye) == 1) {
                $_SESSION['giris'] = "<div class='basarili text-center'> Oturum Açma Başarılı </div>" ;
		        $_SESSION['kullanici'] = 'kullaniciadi';
                header('location: index.php');
      
	            } else {
                    echo "<div class='hatali text-center'>Kullanıcı Adı veya Şifre Hatalı</div>";
	            }

                if(isset($_SESSION['girismesaj']))
                {
                    echo $_SESSION['girismesaj'];
                    unset($_SESSION['girismesaj']);

                }
                }   
            ?>
            <br>

            <form action="" method="POST" class="text-center">
            Kullanıcı Adı:<br><br>
            <input type="text" name="kullaniciadi" placeholder="Kullanıcı Adınız"><br><br>
            Şifre:<br><br>
            <input type="password" name="sifre" placeholder="Şifre Giriniz..."><br>
            <br>
            <input type="submit" name="submit" value="Giriş" class="btnprimary">
            
            </form>
        </div>


    </body>
</html>

