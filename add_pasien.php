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

    <title>Tambah Pasien!</title>
  </head>
  <body>
    <?php
    $db=dbConnect();
    if($db->connect_errno==0){
      $sql = "SELECT * FROM tabel_pasien";
      $res = $db->query($sql);
      if($res) { ?>
    <div class="container" style="margin-top: 20px; margin-left: 400px;">
      <div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
        <div class="card-header">Input Data Pasein</div>
        <div class="card-body">
          <form method="post">
              <div class="form-group">
                <label for="formGroupExampleInput">No. RM</label>
                <input type="text" class="form-control" name="No_RM" id="formGroupExampleInput" placeholder="No. RM" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Nama</label>
                <input type="text" class="form-control" name="Nama" id="formGroupExampleInput2" placeholder="Nama" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Alamat</label>
                <input type="text" class="form-control" name="Alamat" id="formGroupExampleInput2" placeholder="Alamat" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">TTL</label>
                <input type="text" class="form-control" name="TTL" id="formGroupExampleInput2" placeholder="Bandung, 12 Februari 1998" required>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Tanggal Lahir</label>
                <select class="form-control" id="exampleFormControlSelect1" name="Jenis_Kelamin">
                  <option>Pilih Jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Pekerjaan</label>
                <input type="text" class="form-control" name="Pekerjaan" id="formGroupExampleInput2" placeholder="Pekerjaan" required>
              </div>
              <div class="form-group">
                <input type="Submit" name="TblSimpan" value="Simpan" class="btn btn-primary">
                <a href="pasien.php" class="btn btn-danger"> Kembali</a>
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
  if (isset($_POST["TblSimpan"])) {
  $db=dbConnect();
  if($db->connect_errno==0){
  $No_RM         = $db->escape_string($_POST["No_RM"]);
  $Nama          = $db->escape_string($_POST['Nama']);
  $Alamat        = $db->escape_string($_POST["Alamat"]);
  $TTL           = $db->escape_string($_POST["TTL"]);
  $Jenis_Kelamin = $db->escape_string($_POST["Jenis_Kelamin"]);
  $Pekerjaan     = $db->escape_string($_POST["Pekerjaan"]);
  
  $sql = "INSERT INTO tabel_pasien (No_RM, Nama, Alamat, TTL, Jenis_Kelamin, Pekerjaan)
      VALUES('','$Nama','$Alamat','$TTL','$Jenis_Kelamin','$Pekerjaan')";
  //echo $sql;
  $res=$db->query($sql);
  if($res){
    if($db->affected_rows > 0){
      ?>
      echo "
        <script>
          alert('Tambah Data Berhasil!');
          document.location.href = 'pasien.php';
        </script>
        ";
      <?php
    }
  }else{
    ?>
      echo "
      <script>
        alert('Tambah Data Gagal !');
        document.location.href = 'add_pasien.php';
      </script>
      ";
    <?php
    echo "Error Query : ".$db->error."</br>";
  }
  
}else{
  echo "Error : ".$db->connect_error."</br>";
}
}
?>

  </body>
</html>