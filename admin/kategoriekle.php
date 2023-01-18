<?php include('s/menu.php');?>

<div class="anaicerik">
    <div class="sarma">
        <h1>Kategori Ekle</h1>

        <br><br>

        <?php 
					if(isset($_SESSION['ekle']))
					{
						echo $_SESSION['ekle'];
						unset($_SESSION['ekle']);
					}
		?>
        <br><br>

       

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
                        <input type="file" name="imagead">
                    </td>

                <tr>
                    <td>Arkaplan: </td>
                    <td>
                        <input type="radio" name="aktifde" value="Evet">Evet
                        <input type="radio" name="aktifde" value="Hayır">Hayır
                    </td>
                </tr>

                <tr>
                    <td>Kapak:</td>
                    <td>
                        <input type="radio" name="aktif" value="Evet">Evet
                        <input type="radio" name="aktif" value="Hayır">Hayır
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Kategori Ekle" class="btndzn">
                    </td>
                </tr>
            </table>
        </form>

            

    </div>
</div>
<?php
if(isset($_POST['submit'])){

    $yukleklasor = "../images";
    $tmp_name = $_FILES['imagead']['tmp_name'];
    $name = $_FILES['imagead']['name'];
    $boyut = $_FILES['imagead']['size'];
    $tip = $_FILES['imagead']['type'];
    $rastgelesayi1 = rand(10000,50000);
    $rastgelesayi2 = rand(10000,50000);
    $resimad = $rastgelesayi1.$rastgelesayi2;

if(strlen($name)==0)
{
    echo "bir dosya seçiniz";
    exit();
}
if($boyut > (1024*1024*3))
{
    echo "dosya boyutu en fazla 5mb olmalıdır";
    exit();
}
if($tip != 'image/jpeg' && $tip != 'image/png')
{
    echo "Yalnızca jpeg veya png formatında olabilir!";
}
move_uploaded_file($yukleklasor,$name);

$baslik = $_POST['baslik'];
$aktifde = $_POST['aktifde'];
$aktif = $_POST['aktif'];
	
	$query = $db->prepare("INSERT INTO kategori SET baslik = ?, aktifde = ? , aktif = ?");
	$res = $query->execute(array(
        "$baslik",
        "$aktifde",
        "$aktif"
    
    ));

	if ( $res==TRUE )
	{

    	$last_id = $db->lastInsertId();
    	print "Kategori Eklendi!";

		$_SESSION['ekle'] = "<div class='basarili'> Kategori Eklendi </div>";

		header("Location: mkategori.php");

	}
	else
	{
		$_SESSION['ekle'] ="<div class='hatali'> Kategori Ekleme Başarısız </div>";

		header("Location: admin/adminekle.php");
	}

}


?>


<?php include('s/footer.php');?>