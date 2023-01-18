<?php 
  
  
{
  include('s/constants.php');
	$res = $db -> prepare('DELETE FROM kategori WHERE id = ?');
	$res -> execute([$_GET['id']]);

  header('location:mkategori.php');
}

if($res==true)
{
 $_SESSION['sil'] = "<div class='basarili'>Kategori Silindi</div>";
 header('location:mkategori.php');
}
else
{
$_SESSION['sil'] = "<div class='hatali'>Hata Oluştu</div>";
header('location:mkategori.php');
}
?>