<?php 
  
  
{
  include('s/constants.php');
	$res = $db -> prepare('DELETE FROM siparis WHERE id = ?');
	$res -> execute([$_GET['id']]);

  header('location:msiparis.php');
}

if($res==true)
{
 $_SESSION['sil'] = "<div class='basarili'>Sipariş Silindi</div>";
 header('location:msiparis.php');
}
else
{
$_SESSION['sil'] = "<div class='hatali'>Hata Oluştu</div>";
header('location:msiparis.php');
}
?>