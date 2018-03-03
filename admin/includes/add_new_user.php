<?php 
    if(isset($_POST['createUser'])){
       
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
        
        $create_user_query = "insert into users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role, date) values('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email', '$user_image', '$user_role', now())";
        
        $create_user_result = mysqli_query($connection, $create_user_query);
        
        check_query_execution($create_user_result);
?>

<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> User has been created!
  </div>

<?php
        
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    
    <h3>Create A New User</h3>
    
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="status">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="user_password" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="role">Select Role</label>
        <select name="user_role" id="">
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="user_image">
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Create" name="createUser">
     </div>

</form>