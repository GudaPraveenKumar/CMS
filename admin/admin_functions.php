<?php

function check_query_execution($query_result){
    global $connection;
    
    if(!$query_result){
        echo "Query Failed". mysqli_error($connection);
    }
}

function create_category(){
    global $connection;
    if(isset($_POST['createCategory'])){
        $cat_title = $_POST['categoryname'];
        $query = "insert into categories(cat_title) values('$cat_title')";
        if(empty($cat_title) || $cat_title = ""){
            echo "<small style='color:red'>Please enter the category title</small>";
        }else{
            $result = mysqli_query($connection, $query);
            if(!$result){
                die('Query failed'. mysqli_error($connection));
            }
        }

    }
}

function get_all_categories(){
    global $connection;
    $query = "select * from categories";
    $results = mysqli_query($connection, $query);
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr>";
            echo"<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a> ";
            echo " <a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>";
        }
    }
}

function delete_category(){
    global $connection;
if(isset($_GET['delete'])){
    $cat_id = $_GET['delete'];
    $query = "delete from categories where cat_id={$cat_id}";
    $result = mysqli_query($connection, $query);
    if(!result){
        die('query failed'.mysqli_error($connection));
    }else{
        header("Location:categories.php");
    }
}
                                    
}

?>