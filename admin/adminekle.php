<?php include('s/menu.php'); ?>
<div class="anaicerik">
	<div class="sarma">
		<h1>Admin Ekle</h1>
		
		<br /><br />

		<?php 
					if(isset($_SESSION['ekle']))
					{
						echo $_SESSION['ekle'];
						unset($_SESSION['ekle']);
					}
		?>
		
		<form action="" method="POST">
			
		
			<table class="tbladek">
				<tr>
					<td>Adı Soyadı:</td>
					<td><input type="text" name="adsoyad" placeholder="Adınız..."></td>
				</tr>
				
				<tr>
					<td>Kullanıcı Adı:</td>
					<td><input type="text" name="kullaniciadi" placeholder="Kullanııcı Adınız..."></td>
				</tr>
				<tr>
					<td>Şifre</td>
					<td>
						<input type="password" name="sifre" placeholder="Şifrenizi Giriniz...">
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Kaydet" class="btndzn">
					</td>
				</tr>
			</table>
		
		</form>
	</div>
</div>



<?php

if(isset($_POST['submit']))
{
	
	$adsoyad = $_POST['adsoyad'];
	$kullaniciadi= $_POST['kullaniciadi'];
	$sifre = md5($_POST['sifre']);
	
	if(!$adsoyad || !$kullaniciadi || !$sifre)
	{
		echo "Tüm alanları Doldurunuz";
	}
	else
	{

	$query = $db->prepare("INSERT INTO tadmin SET adsoyad = ?,kullaniciadi = ?,sifre = ?");
	$res = $query->execute(array(
     "$adsoyad", "$kullaniciadi", "$sifre"
	));

	if ( $res==TRUE )
	{

    	$last_id = $db->lastInsertId();
    	print "Kayıt İşlemi Başarılı!";

		$_SESSION['ekle'] = "<div class='basarili'>Kayıt İşlemi Başarılı</div>";

		header("Location: madmin.php");

	}
	else
	{
		$_SESSION['ekle'] ="<div class='hatali'>Kayıt İşlemi Başarısız</div>";

		header("Location: admin/adminekle.php");
	}

	}
}

?>

<?php include('s/footer.php'); ?>
