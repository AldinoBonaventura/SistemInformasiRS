<?php
include_once("functions.php");
?>
<?php
  if (isset($_GET['No_RM'])) {
  $db=dbConnect();
  if($db->connect_errno==0){
  $No_RM = $db->escape_string($_GET['No_RM']);
  
  $sql = "DELETE FROM tabel_pasien WHERE No_RM='$No_RM'";
  //echo $sql;
  $res=$db->query($sql);
  if($res){
    if($db->affected_rows > 0){
      ?>
      echo "
        <script>
          alert('Hapus Data Berhasil!');
          document.location.href = 'pasien.php';
        </script>
        ";
      <?php
    }
  }else{
    ?>
      echo "
      <script>
        alert('Hapus Data Gagal !');
        document.location.href = 'pasien.php';
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