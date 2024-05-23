<?php

        $db = mysqli_connect("localhost","root","","robot_live");
        if(!$db){
            echo "error".mysqli_connect_errno();
        }

        $sql = "INSERT INTO `buy`(`mahsol`, `price`, `number`, `cked`) VALUES ('3','3','3','3')";
        if(mysqli_query($db,$sql)===true){
            echo "new";
        }
        
        mysqli_query($db,$sql);
        mysqli_close($db); 
