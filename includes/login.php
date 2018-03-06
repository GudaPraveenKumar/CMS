<?php include "db.php"; ?>
<?php session_start(); ?>
<?php 

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
        $login_query = "SELECT * FROM users WHERE username = '{$username}'";
        $login_result = mysqli_query($connection, $login_query);
        
//        $query = "SELECT randSalt FROM users";
//        $select_rand_result = mysqli_query($connection, $query);
//
//        if(!$select_rand_result){
//            die("Query Failed". mysqli_error($connection));
//        }
//        
//        $row = mysqli_fetch_assoc($select_rand_result);
//        $password = crypt($password, $row['randSalt']);
        
    
        if(!$login_result){
            die("Query Failed ". mysqli_error($connection));
        }
        if(mysqli_num_rows($login_result) == 1){
            while($row = mysqli_fetch_assoc($login_result)){
                
                $db_user_id = $row['user_id'];
                $db_username = $row['username'];
                $db_password = $row['user_password'];
                $db_user_firstname = $row['user_firstname'];
                $db_user_lastname = $row['user_lastname'];
                $db_user_role = $row['user_role'];
            
            }
            
            if($username !== $db_username && $password === ){
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