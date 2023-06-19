

 <?php 
 $id = $_GET['id'];
if ($_GET['status']==0) {
$non = oci_parse ($con,"UPDATE tb_semester SET status=0 WHERE id_semester='$id' ");

echo " <script>
window.location='?page=master&act=semester';
</script>";
}else{
$aktifkan = oci_parse ($con,"UPDATE tb_semester SET status=1 WHERE id_semester='$id' ");
echo " <script>
window.location='?page=master&act=semester';
</script>";  
}
  ?>
