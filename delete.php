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

    <title>View Data!</title>
  </head>
  <body>

    <?php
    if(isset($_GET['No_Registrasi'])){
      $db=dbConnect();

      $sql = "SELECT u.No_RM, u.Nama, u.Alamat, u.Jenis_Kelamin, u.TTL, v.ID_Perawat, v.ID_Poliklinik, t.Diagnosa, t.No_Registrasi, t.No_Ruang FROM tabel_tindakan t JOIN tabel_pasien u ON t.Nama_Pasien = u.Nama JOIN tabel_perawat v ON t.ID_Perawat = v.ID_Perawat";
      $res = $db->query($sql);
      if($res) 
         { ?>
    <div class="container" style="margin-top: 20px; margin-left: 400px;">
      <div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
        <div class="card-header">View Data</div>
        <div class="card-body">
          <form method="post">
              <?php 
              $data=$res->fetch_all(MYSQLI_ASSOC);
              foreach($data as $barisdata) {
              ?>
              <div class="form-group">
                <label for="formGroupExampleInput">No. RM</label>
                <input type="text" class="form-control" value="<?php echo $barisdata["No_RM"]?>" id="formGroupExampleInput" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Nama Pasien</label>
                <input type="text" class="form-control" value="<?php echo $barisdata["Nama"]?>" id="formGroupExampleInput2" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Jenis Kelamin</label>
                <input type="text" class="form-control" value="<?php echo $barisdata["Jenis_Kelamin"]?>" id="formGroupExampleInput2" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Alamat</label>
                <input type="text" class="form-control" value="<?php echo $barisdata["Alamat"]?>" id="formGroupExampleInput2" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">TTL</label>
                <input type="text" class="form-control" value="<?php echo $barisdata["TTL"]?>" id="formGroupExampleInput2" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">ID Perawat</label>
                <input type="text" class="form-control" value="<?php echo $barisdata["ID_Perawat"]?>" id="formGroupExampleInput2" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">ID Poliklinik</label>
                <input type="text" class="form-control" value="<?php echo $barisdata["ID_Poliklinik"]?>" id="formGroupExampleInput2" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Diagnosa</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $barisdata["Diagnosa"]?>" readonly>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">No. Ruang</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $barisdata["No_Ruang"]?>" readonly>
              </div>
              <?php 
                }
              ?>
              <div class="form-group">
                <a href="index.php" class="btn btn-danger"> Kembali</a>
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

  </body>
</html>