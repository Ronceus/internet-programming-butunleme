<?php include('s/menu.php'); ?>

	<div class="anaicerik">
		<div class="sarma">
			<h1>Siparis Düzen</h1>
			<br>

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
				<br />
				<br />
				<br />
				<table class="admintbl">
					<tr>
						<th>Seri no</th>
						<th>Adı Soyadı</th>
						<th>Kullanıcı adı</th>
						<th>Düzenle</th>
					</tr>
					
					<?php

					$query = $db->query("SELECT * FROM siparis ORDER BY id ASC");

					foreach ($query->fetchAll() as $kateg) {
						
							echo '<tr>
							<td>
								'.$kateg['id'].'
							</td>
							<td>
								'.$kateg['baslik'].'
							</td>
							<td>
							</td>
							<td>
								'.$kateg['kateg'].'
							</td>
							<td>
								'.$kateg['aktif'].'
							</td>
							<td>
							<a class="btndzn" href  ="sduzenle.php?id='.$kateg['id'].'  ">Düzenle</a>
							<a class="btnsil" href ="ssil.php?id=' .$kateg['id'].'">Sil</a>
							</td> 
							</tr>';
						
						}
						
						?>
				</table>
		</div>
	</div>

<?php include('s/footer.php'); ?>