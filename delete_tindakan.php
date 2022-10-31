<?php
include_once("functions.php");
?>
<?php
  if (isset($_GET['No_Registrasi'])) {
  $db=dbConnect();
  if($db->connect_errno==0){
  $No_Registrasi = $db->escape_string($_GET['No_Registrasi']);
  
  $sql = "DELETE FROM tabel_tindakan WHERE No_Registrasi='$No_Registrasi'";
  //echo $sql;
  $res=$db->query($sql);
  if($res){
    if($db->affected_rows > 0){
      ?>
      echo "
        <script>
          alert('Hapus Data Berhasil!');
          document.location.href = 'tindakan.php';
        </script>
        ";
      <?php
    }
  }else{
    ?>
      echo "
      <script>
        alert('Hapus Data Gagal !');
        document.location.href = 'tindakan.php';
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