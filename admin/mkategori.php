<?php include('s/menu.php'); ?>

		<div class="anaicerik">
			<div class="sarma">
				<h1>Kategori Düzen</h1>
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
				
				<a href="kategoriekle.php" class="btnprimary">Kategori Ekle</a>
				<br />
				<br />
				<br />
				<table class="admintbl">
					<tr>
						<th>Seri no</th>
						<th>Başlık</th>
						<th>Resim</th>
						<th>Arkaplan</th>
						<th>Kapak</th>
						<th>Düzenle</th>
					</tr>

					<?php

					$query = $db->query("SELECT * FROM kategori ORDER BY id ASC");

					foreach ($query->fetchAll() as $aktifde) {
						
							echo '<tr>
							<td>
								'.$aktifde['id'].'
							</td>
							<td>
								'.$aktifde['baslik'].'
							</td>
							<td>
							</td>
							<td>
								'.$aktifde['aktifde'].'
							</td>
							<td>
								'.$aktifde['aktif'].'
							</td>
							<td>
							<a class="btndzn" href  ="kduzenle.php?id='.$aktifde['id'].'  ">Düzenle</a>
							<a class="btnsil" href ="ksil.php?id=' .$aktifde['id'].'">Sil</a>
							</td> 
							</tr>';
						
						}
						
						?>
				</table>
			</div>
		</div>
<?php include('s/footer.php'); ?>