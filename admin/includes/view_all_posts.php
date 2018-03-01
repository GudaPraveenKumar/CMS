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
        </tr>
    </thead>
    <tbody>

        <?php 
            $query = "select * from posts";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0){
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
                    echo "<td>{$post_title}</td>";
                    echo "<td>{$post_category}</td>";
                    echo "<td>{$post_status}</td>";
                    echo "<td><img width=100em class='img-responsive' src='../images/{$post_image}'</td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_comments}</td>";
                    echo "<td>{$post_date}</td>";
                    echo "<tr>";

                }
            }

        ?>

    </tbody>
</table>