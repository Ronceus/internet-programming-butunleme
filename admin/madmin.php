<?php include('s/menu.php'); ?>

		<div class="anaicerik">
			<div class="sarma">
				<h1>Admin Düzen</h1>
				<br />

				<?php 
					if(isset($_SESSION['ekle']))
					{
						echo $_SESSION['ekle'];
						unset($_SESSION['ekle']);
					}

					if(isset($_SESSION['sil']))
					{
						echo $_SESSION['sil'];
						unset($_SESSION['sil']);

					}

					if(isset($_SESSION['duzen']))
					{
						echo $_SESSION['duzen'];
						unset($_SESSION['duzen']);
					}

				?>
				<br><br><br>
				
				<a href="adminekle.php" class="btnprimary">Admin Ekle</a>
				<br />
				<br />
				<br />
				<table class="admintbl">
					<tr>
						<th>Seri no</th>
						<th>Adı Soyadı</th>
						<th>Kullanıcı adı</th>
						<th>Şifre</th>
						<th>Düzenle</th>
					</tr>

					<?php

					$sql = $db->query("SELECT * FROM tadmin ORDER BY id ASC");

					foreach ($sql->fetchAll() as $uye) {
						
							echo '<tr>
							<td>
								'.$uye['id'].'
							</td>
							<td>
								'.$uye['adsoyad'].'
							</td>
							<td>
								'.$uye['kullaniciadi'].'
							</td>
							<td>
								'.$uye['sifre'].'
							</td>
							<td>
							<a class="btndzn" href  ="aduzenle.php?id='.$uye['id'].'  ">Düzenle</a>
							<a class="btnsil" href ="asil.php?id=' .$uye['id'].'">Sil</a>
							</td> 
							</tr>';
						
						}
						
						?>
				</table>
			</div>
		</div>
<?php include('s/footer.php'); ?>