<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Change Role To</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php 
            $get_all_users_query = "SELECT * FROM users";
            $get_all_users_result = mysqli_query($connection, $get_all_users_query);
            
            while($row = mysqli_fetch_assoc($get_all_users_result)){
                
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];
                    $date = $row['date'];
                    

                    echo "<tr>";
                    echo "<td>{$user_id}</td>";
                    echo "<td>{$username}</td>";
                    echo "<td>{$user_firstname}</td>";
                    echo "<td>{$user_lastname}</td>";
                    echo "<td>{$user_email}</td>";
                    echo "<td>{$user_role}</td>";
                    echo "<td>{$date}</td>";
                
                    echo "<td><a href='users.php?make_subscriber&user_id={$user_id}'>Subscriber</a> / ";
                    echo " <a href='users.php?make_admin&user_id={$user_id}'>Admin</a> </td>";
                    echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a> / ";
                    echo " <a href='users.php?delete_user&user_id={$user_id}'>Delete</a> </td>";
                    echo "<tr>";

            }
               
            

        ?>
        
        <?php
        
        if(isset($_GET['delete_user'])){
            $user_id = $_GET['user_id'];
            $delete_user_query = "DELETE FROM users WHERE user_id = {$user_id}";
            
            $delete_user_result = mysqli_query($connection, $delete_user_query);
            
            check_query_execution($delete_user_result);
            header("Location:users.php");
            
        }
    
        if(isset($_GET['make_admin'])){
            $user_id = $_GET['user_id'];
            $make_admin_query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$user_id}";
            
            $make_admin_result = mysqli_query($connection, $make_admin_query);
            
            check_query_execution($make_admin_result);
            header("Location:users.php");
            
        }
    
        if(isset($_GET['make_subscriber'])){
            $user_id = $_GET['user_id'];
            $make_subscriber_query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$user_id}";
            
            $make_subscriber_result = mysqli_query($connection, $make_subscriber_query);
            
            check_query_execution($make_subscriber_result);
            header("Location:users.php");
            
        }
        
        ?>
        

    </tbody>
</table>