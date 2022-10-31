<?php
include_once("functions.php");
?>
<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Edit Data Perawat!</title>
  </head>
  <body>
    <?php
    if(isset($_GET['ID_Perawat'])){
      $db=dbConnect();

      $ID_Perawat=$db->escape_string($_GET["ID_Perawat"]);
      $DataPerawat = getDataPerawat($ID_Perawat);
      if ($DataPerawat) {
    ?>
    <div class="container" style="margin-top: 20px; margin-left: 400px;">
      <div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
        <div class="card-header">Edit Data Perawat</div>
        <div class="card-body">
          <form method="post">
              <div class="form-group">
                <label for="formGroupExampleInput">ID Perawat</label>
                <input type="text" class="form-control" name="ID_Perawat" value="<?php echo $DataPerawat["ID_Perawat"]; ?>" id="formGroupExampleInput" placeholder="ID Perawat" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">ID Poliklinik</label>
                <input type="text" class="form-control" name="ID_Poliklinik" value="<?php echo $DataPerawat["ID_Poliklinik"]; ?>" id="formGroupExampleInput2" placeholder="ID Poliklinik" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Nama</label>
                <input type="text" class="form-control" name="Nama" value="<?php echo $DataPerawat["Nama"]; ?>" id="formGroupExampleInput2" placeholder="Nama" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Alamat</label>
                <input type="text" class="form-control" name="Alamat" value="<?php echo $DataPerawat["Alamat"]; ?>" id="formGroupExampleInput2" placeholder="Alamat" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Tanggal Lahir</label>
                <input type="date" class="form-control" name="Tgl_Lahir" value="<?php echo $DataPerawat["Tgl_Lahir"]; ?>" id="formGroupExampleInput2" placeholder="Tanggal Lahir" required>
              </div>
              <div class="form-group">
                <input type="Submit" name="TblSimpan" value="Simpan" class="btn btn-primary">
                <a href="perawat.php" class="btn btn-danger"> Kembali</a>
              </div>
          </form>
        </div>
      </div>
    </div>
    <?php 
    } else {
      echo "Error : ".$db->error."<br>";
    }
    } else {
      echo "Error Koneksi Database";
    } 
    ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <?php
    if(isset($_POST["TblSimpan"])){
      $db=dbConnect();
      if($db->connect_errno==0){
        // Bersihkan data
        $ID_Perawat    = $db->escape_string($_POST["ID_Perawat"]);
        $ID_Poliklinik = $db->escape_string($_POST["ID_Poliklinik"]);
        $Nama          = $db->escape_string($_POST['Nama']);
        $Alamat        = $db->escape_string($_POST["Alamat"]);
        $Tgl_Lahir     = $db->escape_string($_POST["Tgl_Lahir"]);
        
        // Susun query update
        $sql="UPDATE tabel_perawat SET 
        ID_Perawat='$ID_Perawat', ID_Poliklinik='$ID_Poliklinik', Nama='$Nama', 
        Alamat='$Alamat', Tgl_Lahir='$Tgl_Lahir' WHERE ID_Perawat='$ID_Perawat'";

        // Eksekusi query update
        $res=$db->query($sql);
        if($res){
        if($db->affected_rows>0){ // jika ada update data
        ?>
        <script>
          alert('Data berhasil diupdate!');
          document.location.href = 'perawat.php';
        </script>
        <?php
        }
        else{ // Jika sql sukses tapi tidak ada data yang berubah
        ?>
        <script>
          alert('Data Berhasil diupdate tapi tidak ada perubahan!');
          document.location.href = 'perawat.php';
        </script>
        <?php
        }
        }
        else{ // gagal query
        ?>
        <script>
        alert('Data Gagal diupdate!');
        document.location.href = 'edit_perawat.php';
        </script>
        <?php
        }
        }
        else
        echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
        }
        ?>
  </body>
</html>