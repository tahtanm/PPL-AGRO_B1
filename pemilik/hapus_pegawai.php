<?php
include '../koneksi.php';

    $id = @$_GET['id'];

    $sql = $conn -> query ("DELETE FROM pegawai WHERE id = '".$id."'");

    header("location: datapegawai.php");

?>

<script type="text/javascript">
    window.location.href="datapegawai.php";
</script>




