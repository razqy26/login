<?php
    include "koneksi.php";

    $username=$_POST['username'];
    $password=$_POST['password'];

    $query="SELECT * FROM tbl_user WHERE username='$username'";
    $sql=mysqli_query($conn,$query);
    $data=mysqli_fetch_array($sql);

    if($data>0){
        if(password_verify($password,$data['password'])){
            session_start();
            $_SESSION['username']=$data['username'];
            header('location:index.php');
        }else{
            header('location:login.php?pesan=Password anda salah');
        }
    }else{
        header('location:login.php?pesan=Username anda salah');
    }
?>