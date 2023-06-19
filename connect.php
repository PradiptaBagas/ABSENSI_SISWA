<?php
$con = oci_connect("DIPTAA","12345678","localhost/XE");
// oci_connect("username","pass","connect string service oracle kita ygy")
if (!$con) {
    $e = oci_error();
    echo $e['message'];
} else {
    echo "";
}