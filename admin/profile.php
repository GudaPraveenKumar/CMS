<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                
<?php 

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

    }

?>

<?php 
    
    $select_user_by_id_query = "SELECT * FROM users WHERE user_id = {$user_id}";
    $select_user_by_id_result = mysqli_query($connection, $select_user_by_id_query);
    if(!$select_user_by_id_result){
        die("Query Failed".mysqli_error($connection));
    }else{
        while($row = mysqli_fetch_assoc($select_user_by_id_result)){
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            $date = $row['date'];
            
        }
    }
    

?>

<?php 
    if(isset($_POST['updateProfile'])){
       
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_image = $_FILES['user_image']['name'];
        $image_temp = $_FILES['user_image']['tmp_name'];
        $user_role = $_POST['user_role'];
        $date = date('d-m-y');
        
        move_uploaded_file($image_temp, "../images/$user_image");
        
        if(empty($user_image)){

            $select_user_query = "SELECT * FROM users WHERE user_id = {$user_id}";

            $select_user_result = mysqli_query($connection, $select_user_query);
            check_query_execution($select_user_result);
            while($row = mysqli_fetch_assoc($select_user_result)){
                $user_image = $row['user_image'];
            }
        }

        
        $update_user_query = "UPDATE users SET username = '{$username}', user_password = '{$user_password}', user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_email = '{$user_email}', user_image = '{$user_image}', user_role = '{$user_role}', date = now() WHERE user_id = {$user_id}";
        
        $update_user_result = mysqli_query($connection, $update_user_query);
        
        check_query_execution($update_user_result);
        
    }

?>



<form action="" method="post" enctype="multipart/form-data">
    
    <h3>Profile</h3>
    
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="status">Email</label>
        <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="user_password" value="<?php echo $user_password; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="role">Select Role </label>
        <select name="user_role" id="">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php
                if($user_role == 'Admin'){
                    echo "<option value='Subscriber'>Subscriber</option>";
                }else{
                    echo "<option value='Admin'>Admin</option>";
                }
            ?>
            
            
        </select>
    </div>
    
    <div class="form-group">
        <label for="image">Image</label>
        <img width="100" src="../images/<?php echo $user_image; ?>">
        <input type="file" name="user_image">
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update Profile" name="updateProfile">
     </div>

</form>
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php"; ?>