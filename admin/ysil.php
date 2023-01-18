<?php 
  
  
{
  include('s/constants.php');
	$res = $db -> prepare('DELETE FROM yemek WHERE id = ?');
	$res -> execute([$_GET['id']]);

  header('location:myemek.php');
}

if($res==true)
{
 $_SESSION['sil'] = "<div class='basarili'>Yiyecek Silindi</div>";
 header('location:myemek.php');
}
else
{
$_SESSION['sil'] = "<div class='hatali'>Hata Oluştu</div>";
header('location:myemek.php');
}
?>