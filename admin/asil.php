<?php 
  
  
{
  include('s/constants.php');
	$res = $db -> prepare('DELETE FROM tadmin WHERE id = ?');
	$res -> execute([$_GET['id']]);

  header('location:madmin.php');
}

if($res==true)
{
 $_SESSION['sil'] = "<div class='basarili'>Kullanıcı Silindi</div>";
 header('location:madmin.php');
}
else
{
$_SESSION['sil'] = "<div class='hatali'>Hata Oluştu</div>";
header('location:madmin.php');
}
?>