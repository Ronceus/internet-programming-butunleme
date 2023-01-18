<?php include('s/menu.php');?>
<div class="anaicerik">
	<div class="sarma">

	<h1>Güncelle</h1>

	<br><br>
	<?php 
	$id=$_GET['id'];
	$sorgu = $db -> prepare("SELECT * FROM tadmin WHERE id =:id");
	$sorgu -> execute(array(":id" => $id));
	$row = $sorgu -> fetch(PDO::FETCH_ASSOC);

	
	?>

		<form action="" method="POST">
			<table class="tbladek">
				<tr>
					<td>Adı Soyadı:</td>
					<td><input type="text" name="adsoyad" value="<?php echo $row['adsoyad']; ?>" placeholder="Adınız..."></td>
				</tr>
				
				<tr>
					<td>Kullanıcı Adı:</td>
					<td><input type="text" name="kullaniciadi" value="<?php echo $row['kullaniciadi']; ?>" placeholder="Kullanııcı Adınız..."></td>
				</tr>
				<tr>
					<td>Şifre</td>
					<td>
						<input type="password" name="sifre"  value="<?php echo $row['sifre']; ?>">
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Güncelle" class="btndzn">
					</td>
				</tr>
			</table>
</form>
</div>
</div>
<?php

if($_POST)
{
	$adsoyad = $_POST["adsoyad"];
	$kullaniciadi = $_POST["kullaniciadi"];
	$sifre = md5($_POST["sifre"]);

	$guncelle = $db -> prepare("UPDATE tadmin SET  adsoyad = :adsoyad, kullaniciadi = :kullaniciadi, sifre = :sifre WHERE id = :id");
	$guncelle -> execute(array(":adsoyad" => $adsoyad,":kullaniciadi" => $kullaniciadi, ":sifre" => $sifre,":id" => $id));
}


?>

<?php
include('s/footer.php');
?>
<?php
if(isset($_POST['submit']))
{
	
	$adsoyad = $_POST['adsoyad'];
	$kullaniciadi= $_POST['kullaniciadi'];
	$sifre = md5($_POST['sifre']);
	

	;

	if ( $guncelle==TRUE )
	{

    	$last_id = $db->lastInsertId();
    	print "Güncelleme Başarılı!";

		$_SESSION['duzen'] = "<div class='basarili'> Bilgiler Güncellendi </div>";

		header("Location: madmin.php");

	}
	else
	{
		$_SESSION['duzen'] ="<div class='hatali'>İşlem Başarısız</div>";

		header("Location: madmin.php");
	}
}
?>

