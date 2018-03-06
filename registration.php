<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php

if(isset($_POST['register'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    if(!empty($username) && !empty($password) && !empty($email)){
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $email = mysqli_real_escape_string($connection, $email);

        $query = "SELECT randSalt FROM users";
        $select_rand_result = mysqli_query($connection, $query);

        if(!$select_rand_result){
            die("Query Failed". mysqli_error($connection));
        }
        
        $row = mysqli_fetch_assoc($select_rand_result);
        $password = crypt($password, $row['randSalt']);
        
        $create_user_query = "insert into users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role, date) values('$username', '$password', '', '', '$email', '', '', now())";
        
        $create_user_result = mysqli_query($connection, $create_user_query);
        
        if(!$create_user_result){
            die("Query Failed". mysqli_error($connection));
        }
        
    }else{
        echo "Please enter the values";
    }
   
}

?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" required id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" required id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" required id="key" class="form-control" placeholder="Password">
                        </div>
                        <div style="text-align:center">
                            <input type="submit" name="register" id="btn-login" class="btn btn-primary" value="Register">
                        </div>
                        
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
