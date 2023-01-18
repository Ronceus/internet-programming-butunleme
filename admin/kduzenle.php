<?php include('s/menu.php');?>
<div class="anaicerik">
	<div class="sarma">

	<h1>Güncelle</h1>

	<br><br>
	<?php 
	$id=$_GET['id'];
	$sorgu = $db -> prepare("SELECT * FROM kategori WHERE id =:id");
	$sorgu -> execute(array(":id" => $id));
	$row = $sorgu -> fetch(PDO::FETCH_ASSOC);

	
	?>

<form action="" method="POST" enctype="multipart/form-data">

<table class="tbladek">
    <tr>
        <td>Başlık:</td>
        <td>
            <input type="text" name="baslik" placeholder="Kategori Başlığı">
        </td>
    </tr>

    <tr>
        <td>Resim:</td>
        <td>
            <input type="file" name="image">
        </td>

    <tr>
        <td>Featured: </td>
        <td>
            <input type="radio" name="aktifde" value="Evet">Evet
            <input type="radio" name="aktifde" value="Hayır">Hayır
        </td>
    </tr>

    <tr>
        <td>Aktif:</td>
        <td>
            <input type="radio" name="aktif" value="Evet">Evet
            <input type="radio" name="aktif" value="Hayır">Hayır
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="submit" name="submit" value="Kategoriyi Düzenle" class="btndzn">
        </td>
    </tr>
</table>
</form>
</form>
</div>
</div>
<?php

if($_POST)
{
	$baslik = $_POST["baslik"];
	$aktifde = $_POST["aktifde"];
	$aktif = $_POST["aktif"];

	$guncelle = $db -> prepare("UPDATE kategori SET  baslik = :baslik, aktifde = :aktifde, aktif = :aktif WHERE id = :id");
	$guncelle -> execute(array(":baslik" => $baslik,":aktifde" => $aktifde, ":aktif" => $aktif,":id" => $id));
}


?>

<?php
include('s/footer.php');
?>
<?php
if(isset($_POST['submit']))
{
	
	$baslik = $_POST['baslik'];
	$aktifde= $_POST['aktifde'];
	$aktif = $_POST['aktif'];
	

	;

	if ( $guncelle==TRUE )
	{

    	$last_id = $db->lastInsertId();
    	print "Güncelleme Başarılı!";

		$_SESSION['duzen'] = "<div class='basarili'> Bilgiler Güncellendi </div>";

		header("Location: mkategori.php");

	}
	else
	{
		$_SESSION['duzen'] ="<div class='hatali'>İşlem Başarısız</div>";

		header("Location: mkategori.php");
	}
}
?>

