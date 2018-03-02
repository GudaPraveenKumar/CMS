<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php 
            $query = "select * from posts";
            $result = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($result)){
                
                    $post_id = $row['id'];
                    $post_author = $row['author'];
                    $post_title = $row['title'];
                    $post_category = $row['category_id'];
                    $post_status = $row['status'];
                    $post_image = $row['image'];
                    $post_tags = $row['tags'];
                    $post_comments = $row['comment_count'];
                    $post_date = $row['date'];

                    echo "<tr>";
                    echo "<td>{$post_id}</td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
                    
                    $category_query = "select * from categories where cat_id = {$post_category}";
                    $category_result = mysqli_query($connection, $category_query);
                    check_query_execution($category_result);
                
                    while($row = mysqli_fetch_assoc($category_result)){
                        $cat_title = $row['cat_title'];
                        echo "<td>{$cat_title}</td>";
                    }   
                    
                    echo "<td>{$post_status}</td>";
                    echo "<td><img width=100em class='img-responsive' src='../images/{$post_image}'</td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_comments}</td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td><div><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></div>
                                <div><a href='posts.php?delete_post={$post_id}'>Delete</a></div></td>";
                    echo "<tr>";

            }
               
            

        ?>
        
        <?php
        
        if(isset($_GET['delete_post'])){
            $post_id = $_GET['delete_post'];
            $query = "Delete from posts where id = {$post_id}";
            
            $result = mysqli_query($connection, $query);
            
            check_query_execution($result);
            header("Location:posts.php");
        }
        
        ?>

    </tbody>
</table>