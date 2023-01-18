<?php include('s/menu.php'); ?>

<div class="anaicerik">
    <div class="sarma">
        <h1>Yemek Ekle</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbladek">

                <tr>
                    <td>Başlık:</td>
                    <td>
                        <input type="text" name="baslik" placeholder="Yemek Adını Giriniz">
                    </td>
                </tr>
                
                <tr>
                    <td>Açıklama:</td>
                    <td>
                        <textarea name="aciklama" cols="30" rows="5"  placeholder="Açıklama Giriniz"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Fiyat:</td>
                    <td>
                        <input type="number" name="fiyat">
                    </td>
                </tr>

                <tr>
                    <td>Resim:</td>
                    <td>
                        <input type="file" name="imagead">
                    </td>
                </tr>

                <tr>
                    <td>Kategori:</td>
                    <td>
                        <select name="kategori">

                        <?php
                                $sql = $db->query("SELECT * FROM kategori WHERE aktif='evet'");
                                

                                if($row>0)
                                {
                                    foreach($sql as $row)
                                    {
                                        $id = $row['id'];
                                        $baslik = $row['baslik'];

                                        ?>
                                        <option value="1"><?php echo $id; ?><?php echo $baslik; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="1">Kategori Bulunamadı</option>
                                    <?php
                                }
                                
                                
                            ?>

                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Kateg:</td>     
                    <td>
                        <input type="radio" name="kateg" value="evet">Evet
                        <input type="radio" name="kateg" value="hayır">Hayır
                    </td>
                </tr>

                <tr>
                    <td>Aktif:</td>
                    <td>
                        <input type="radio" name="aktif" value="evet">Evet
                        <input type="radio" name="aktif" value="hayır">Hayır
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Yemek Ekle" class="btndzn">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php include('s/footer.php') ?>