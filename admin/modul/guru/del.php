<?php 
$del = oci_parse ($con,"DELETE FROM tb_guru WHERE id_guru=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=guru';
		</script>";	
}

?>