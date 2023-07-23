<?php
    session_start();
    include 'AdminPanel/db.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
            
        $query = "select * from register where (username = '$username') and password = '$password'";

        $res = mysqli_query($conn,$query);

        
        $row = mysqli_fetch_array($res);
        if($row["username"] == "Admin"){
             header("location:AdminPanel/admin.php");
        }else if($row["username"] == $username && $row["password"] == $password){
            $_SESSION["username"] = $username;
          
            header("location:collect/form1.php");
        }
        else{
            header("location:sign.php?Error=invalid username or password");
        }
            // if($row["username"] == "Admin")
            // {
            //     // $_SESSION["admin"] = $username;
            //     header("location:AdminPanel/admin.php");
               
            // }
            // else
            // {
            //     header("location:sign.php?Error=invalid username or password");
            //     // $error[] = 'incorrect credentials';
            // }


}