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

    <title>Edit Data Tindakan!</title>
  </head>
  <body>
    <?php
    if(isset($_GET['No_Registrasi'])){
      $db=dbConnect();

      $No_Registrasi=$db->escape_string($_GET["No_Registrasi"]);
      $DataTindakan = getDataTindakan($No_Registrasi);
      if ($DataTindakan) {
    ?>
    <div class="container" style="margin-top: 20px; margin-left: 400px;">
      <div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
        <div class="card-header">Edit Data Tindakan</div>
        <div class="card-body">
          <form method="post">
              <div class="form-group">
                <label for="formGroupExampleInput">No. Registrasi</label>
                <input type="text" class="form-control" name="No_Registrasi" value="<?php echo $DataTindakan["No_Registrasi"]; ?>" id="formGroupExampleInput" placeholder="No. Registrasi" readonly>
              </div>
              <div class="form-group">
                <label>Perawat</label>
                <select name="ID_Perawat" class="form-control">
                  <option>--Pilih Perawat--</option>
                  <?php
                  $data=getIDPerawat();
                  foreach($data as $data_perawat){
                    echo "<option value=\"".$data_perawat["ID_Perawat"]."\"
                    ".($data_perawat["ID_Perawat"]==$DataTindakan["ID_Perawat"]?"selected":"").">".$data_perawat["Nama"]."</option>\n";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Kereta</label>
                <select name="Nama_Pasien" class="form-control">
                  <option>--Pilih Pasien--</option>
                  <?php
                  $data=getNamaEdit();
                  foreach($data as $data_pasien){
                    echo "<option value=\"".$data_pasien["Nama"]."\"
                    ".($data_pasien["Nama"]==$DataTindakan["Nama_Pasien"]?"selected":"").">".$data_pasien["Nama"]."</option>\n";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Jam</label>
                <input type="text" class="form-control" name="Jam" value="<?php echo $DataTindakan["Jam"]; ?>" id="formGroupExampleInput2" placeholder="Jam" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Diagnosa</label>
                <input type="text" class="form-control" name="Diagnosa" value="<?php echo $DataTindakan["Diagnosa"]; ?>" id="formGroupExampleInput2" placeholder="Diagnosa" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Tindak Keperawatan</label>
                <input type="text" class="form-control" name="Tindak_Keperawatan" value="<?php echo $DataTindakan["Tindak_Keperawatan"]; ?>" id="formGroupExampleInput2" placeholder="Tindak Keperawatan" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">No. Ruang</label>
                <input type="text" class="form-control" name="No_Ruang" value="<?php echo $DataTindakan["No_Ruang"]; ?>" id="formGroupExampleInput2" placeholder="No. Ruang" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Keterangan</label>
                <input type="text" class="form-control" name="Keterangan" value="<?php echo $DataTindakan["Keterangan"]; ?>" id="formGroupExampleInput2" placeholder="Keterangan" required>
              </div>
              <div class="form-group">
                <input type="Submit" name="TblSimpan" value="Simpan" class="btn btn-primary">
                <a href="tindakan.php" class="btn btn-danger"> Kembali</a>
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
        $No_Registrasi = $db->escape_string($_POST["No_Registrasi"]);
        $ID_Perawat    = $db->escape_string($_POST['ID_Perawat']);
        $Nama_Pasien   = $db->escape_string($_POST["Nama_Pasien"]);
        $Jam           = $db->escape_string($_POST["Jam"]);
        $Diagnosa      = $db->escape_string($_POST["Diagnosa"]);
        $Tindak_Keperawatan = $db->escape_string($_POST["Tindak_Keperawatan"]);
        $No_Ruang      = $db->escape_string($_POST["No_Ruang"]);
        $Keterangan    = $db->escape_string($_POST["Keterangan"]);
        
        // Susun query update
        $sql="UPDATE tabel_tindakan SET 
        No_Registrasi='$No_Registrasi', ID_Perawat='$ID_Perawat', Nama_Pasien='$Nama_Pasien', Jam='$Jam', Diagnosa='$Diagnosa', Tindak_Keperawatan='$Tindak_Keperawatan', No_Ruang='$No_Ruang', Keterangan='$Keterangan' WHERE No_Registrasi='$No_Registrasi'";

        // Eksekusi query update
        $res=$db->query($sql);
        if($res){
        if($db->affected_rows>0){ // jika ada update data
        ?>
        <script>
          alert('Data berhasil diupdate!');
          document.location.href = 'tindakan.php';
        </script>
        <?php
        }
        else{ // Jika sql sukses tapi tidak ada data yang berubah
        ?>
        <script>
          alert('Data Berhasil diupdate tapi tidak ada perubahan!');
          document.location.href = 'tindakan.php';
        </script>
        <?php
        }
        }
        else{ // gagal query
        ?>
        <script>
        alert('Data Gagal diupdate!');
        document.location.href = 'edit_tindakan.php';
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