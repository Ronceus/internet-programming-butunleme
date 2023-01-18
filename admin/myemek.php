<?php include('s/menu.php'); ?>

		<div class="anaicerik">
			<div class="sarma">
				<h1>Yiyecek Düzen</h1>
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
				
				<a href="yemekekle.php" class="btnprimary">Yemek Ekle</a>
				<br />
				<br />
				<br />
				<table class="admintbl">
					<tr>
						<th>Seri no</th>
						<th>Başlık</th>
						<th>Resim</th>
						<th>kateg</th>
						<th>Aktif</th>
						<th>Düzenle</th>
					</tr>

					<?php

					$query = $db->query("SELECT * FROM yemek ORDER BY id ASC");

					foreach ($query->fetchAll() as $kateg) {
						
							echo '<tr>
							<td>
								'.$yem['id'].'
							</td>
							<td>
								'.$yem['baslik'].'
							</td>
							<td>
							</td>
							<td>
								'.$yem['kateg'].'
							</td>
							<td>
								'.$yem['aktif'].'
							</td>
							<td>
							<a class="btndzn" href  ="yduzenle.php?id='.$yem['id'].'  ">Düzenle</a>
							<a class="btnsil" href ="ysil.php?id=' .$yem['id'].'">Sil</a>
							</td> 
							</tr>';
						
						}
						
						?>
				</table>
			</div>
		</div>
<?php include('s/footer.php'); ?>