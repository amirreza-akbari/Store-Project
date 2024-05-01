<?php

    if(isset($_POST['username']) && ! empty($_POST['username']) &&
    isset($_POST['password']) && ! empty($_POST['password'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
    }else{
        exit("no f");
    }

    $db = mysqli_connect("localhost","root","","robot_live");
    if(!$db){
        echo "error",mysqli_connect_errno();
    }

    $sql = "SELECT * FROM `users` WHERE username = '$username' and password = '$password'";

    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    if($row){
        echo "hello";
    }else{
        echo "no";
    }
