
<form action="" method="post" enctype="multipart/form-data">
    
    <h3>Create A New Post</h3>
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <input type="text" name="category_id" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" name="author" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" name="status" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" name="tags" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="content">Post Cotents</label>
        <textarea class="form-control" name="content" id="" cols="25" row="10"></textarea>
        
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Create" >
     </div>

</form>