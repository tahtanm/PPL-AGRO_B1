<?php 
include 'koneksi.php';


    $namaLengkap = $_POST["nama_lengkap"];
    $tempatLahir = $_POST["tempat_lahir"];
    $tanggalLahir = $_POST["tanggal_lahir"];
    $jenisKelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $noHP = $_POST["no_hp"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if($password == $password2){
        $query = "SELECT * FROM pelanggan WHERE username='$username'";
        $result = mysqli_query($conn, $query);


    // cek username sudah ada atau belum
        if(!$result->num_rows > 0) {
            $query = "INSERT INTO pelanggan (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, email, username, password) VALUES ('$namaLengkap', '$tempatLahir', '$tanggalLahir', '$jenisKelamin', '$alamat', '$noHP','$email', '$username', '$password')";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($conn)."-".mysqli_error($conn));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='login.php';</script>";
            }
        }else{
        echo "<script>alert('Username sudah terpakai');window.location='registrasi.php';</script>";
        }
    }else{
        echo "<script>alert('Username sudah terpakai');window.location='registrasi.php';</script>";
    }              
        
?>