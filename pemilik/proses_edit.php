<?php 
    include('../koneksi.php');

    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir= $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

            $query = "UPDATE pemilik SET nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_hp = '$no_hp', email = '$email', username = '$username', password = '$password' WHERE username = '$username'";
        
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($conn)."-".mysqli_error($conn));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='profil.php';</script>";
            }
?>