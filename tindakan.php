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

    <title>Tindakan!</title>
  </head>
  <body>
    <?php
    $db=dbConnect();
    if($db->connect_errno==0){
      $sql = "SELECT * FROM tabel_tindakan";
      $res = $db->query($sql);
      if($res) { ?>
    <div class="container" style="margin-top: 100px;">
      <div class="card text-center">
        <div class="card-header">
          <a href="add_tindakan.php" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Tindakan</a>
          <a href="index.php" class="btn btn-primary"><i class="fas fa-hand-point-left"></i> Home</a>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No. Registrasi</th>
                <th scope="col">ID Perawat</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Jam</th>
                <th scope="col">Diagnosa</th>
                <th scope="col">Tindak Keperawatan</th>
                <th scope="col">No. Ruang</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              //Pengambilan Seluruh Baris Data Dengan Index Nama
              $data=$res->fetch_all(MYSQLI_ASSOC);
              foreach($data as $barisdata) {
                ?>
              <tr>
                <td><?php echo $barisdata["No_Registrasi"]?></td>
                <td><?php echo $barisdata["ID_Perawat"]?></td>
                <td><?php echo $barisdata["Nama_Pasien"]?></td>
                <td><?php echo $barisdata["Jam"]?></td>
                <td><?php echo $barisdata["Diagnosa"]?></td>
                <td><?php echo $barisdata["Tindak_Keperawatan"]?></td>
                <td><?php echo $barisdata["No_Ruang"]?></td>
                <td><?php echo $barisdata["Keterangan"]?></td>
                <td>  
                  <a href="edit_tindakan.php?No_Registrasi=<?php echo $barisdata["No_Registrasi"]; ?>" class="btn btn-primary"><i class="fas fa-user-edit"></i> Ubah</a>
                  <a href="delete_tindakan.php?No_Registrasi=<?php echo $barisdata["No_Registrasi"]; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            </tbody>
            <?php 
            }
            ?>
          </table>
          <?php
          } else {
            echo "Error : ".$db->error."<br>";
          }
          } else {
          echo "Error Koneksi Database";
          }
          ?>
        </div>
        <div class="card-footer text-muted">
          Bonaventura Aldino Senda Seni
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>