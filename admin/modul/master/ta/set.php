
 <?php 
 $id = $_GET['id'];
if ($_GET['status']==0) {
$non = oci_parse ($con,"UPDATE tb_thajaran SET status=0 WHERE id_thajaran='$id' ");

echo " <script>
window.location='?page=master&act=ta';
</script>";
}else{
$aktifkan = oci_parse ($con,"UPDATE tb_thajaran SET status=1 WHERE id_thajaran='$id' ");
echo " <script>
window.location='?page=master&act=ta';
</script>";  
}
  ?>