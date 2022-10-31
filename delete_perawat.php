<?php
include_once("functions.php");
?>
<?php
  if (isset($_GET['ID_Perawat'])) {
  $db=dbConnect();
  if($db->connect_errno==0){
  $ID_Perawat = $db->escape_string($_GET['ID_Perawat']);
  
  $sql = "DELETE FROM tabel_perawat WHERE ID_Perawat='$ID_Perawat'";
  //echo $sql;
  $res=$db->query($sql);
  if($res){
    if($db->affected_rows > 0){
      ?>
      echo "
        <script>
          alert('Hapus Data Berhasil!');
          document.location.href = 'perawat.php';
        </script>
        ";
      <?php
    }
  }else{
    ?>
      echo "
      <script>
        alert('Hapus Data Gagal !');
        document.location.href = 'perawat.php';
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