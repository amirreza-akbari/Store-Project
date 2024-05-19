<?php

    if(isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['password1']) && !empty($_POST['password1']) &&
        isset($_POST['email']) && !empty($_POST['email'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $password1 = $_POST['password1'];
            $email = $_POST['email'];
        }else{
            exit("no f");
        }

        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
            exit("no e");
        }

        if($password != $password1){
            exit("no");
        }

        $db = mysqli_connect("localhost","root","","robot_live");
        if(!$db){
            echo "error".mysqli_connect_errno();
        }

        $sql = "INSERT INTO `users`(`username`, `password`, `email`) VALUES ('$username','$password','$email')";
        if(mysqli_query($db,$sql)===true){
            echo "new";
        }
        
        mysqli_query($db,$sql);
        mysqli_close($db); 
