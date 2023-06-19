<?php 
$del = oci_parse ($con,"DELETE FROM tb_siswa WHERE id_siswa=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=siswa';
		</script>";	
}

 ?>