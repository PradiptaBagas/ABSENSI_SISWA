<?php
include 'connect.php';
$sql = 'SELECT * FROM TB_GURU';
$tampil = oci_parse($con, $sql);
oci_execute($tampil);

while (oci_fetch($tampil)) {
    echo oci_result($tampil, 'NAMA_GURU') . " ";
    echo oci_result($tampil, 'EMAIL') . "<br>\n";
}

oci_free_statement($tampil);
oci_close($con);