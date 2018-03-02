<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>Post</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <?php
        
        if(isset($_GET['delete_comment'])){
            $comment_id = $_GET['c_id'];
            $delete_comment_query = "Delete from comments where comment_id = {$comment_id}";
            
            $delete_comment_result = mysqli_query($connection, $delete_comment_query);
            
            check_query_execution($delete_comment_result);
            
        }
        
        ?>
    <tbody>

        <?php 
            $query = "select * from comments";
            $result = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($result)){
                
                    $comment_id = $row['comment_id'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_email = $row['comment_email'];
                    $comment_status = $row['comment_status'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_date = $row['comment_date'];
                    

                    echo "<tr>";
                    echo "<td>{$comment_id}</td>";
                    echo "<td>{$comment_author}</td>";
                    echo "<td>{$comment_content}</td>";
                    echo "<td>{$comment_email}</td>";
                    echo "<td>{$comment_status}</td>";
                
                    $post_query = "select * from posts where id = {$comment_post_id}";
                    $post_result = mysqli_query($connection, $post_query);
                    check_query_execution($post_result);
                
                    while($row = mysqli_fetch_assoc($post_result)){
                        $post_title = $row['title'];
                        $post_id = $row['id'];
                        echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
                    }   
                    
                    echo "<td>{$comment_date}</td>";

                    echo "<td><div><a href='view_all_comments.php?source=approve_comment&c_id={$comment_id}'>Approve</a></div></td>";
                    echo "<td><div><a href='view_all_comments.php?source=unapprove_comment&c_id={$comment_id}'>Unapprove</a></div></td>";
                    echo "<td><div><a href='comments.php?delete_comment&c_id={$comment_id}'>Delete</a></div></td>";
                    echo "<tr>";

            }
               
            

        ?>
        

    </tbody>
</table>