<?php include "db.php"; ?>
<?php session_start(); ?>
<?php 

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
        $login_query = "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}'";
        $login_result = mysqli_query($connection, $login_query);
        
        if(!$login_result){
            die("Query Failed". mysqli_error($connection));
        }
        if(mysqli_num_rows($login_result) == 1){
            while($row = mysqli_fetch_assoc($login_result)){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['firstname'] = $row['user_firstname'];
                $_SESSION['lastname'] = $row['user_lastname'];
                $_SESSION['user_role'] = $row['user_role'];
            }
            
            
            header("Location: ../admin");
        }else if(mysqli_num_rows($login_result) !== 1){
            header("Location: ../index.php");
        }
    }

    

?>