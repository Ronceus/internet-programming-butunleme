<?php include('s/menu.php') ?>
		<div class="anaicerik">
			<div class="sarma">
				<h1>Bilgiler</h1>
				<br><br>

				<?php
            	if(isset($_SESSION['giris']))
            	{
                echo $_SESSION['giris'];
                unset($_SESSION['giris']);
           		}
        		?>
				
				<div class="col-4 text-center">
					<h1>Null</h1>
					<br />
					Tamamlanmadı
				</div>
				
				<div class="col-4 text-center">
					<h1>Null</h1>
					<br />
					Tamamlanmadı
				</div>
				
				<div class="col-4 text-center">
					<h1>Null</h1>
					<br />
					Tamamlanmadı
				</div>
				
				<div class="col-4 text-center">
					<h1>Null</h1>
					<br />
					Tamamlanmadı
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
		
<?php include('s/footer.php') ?>
	