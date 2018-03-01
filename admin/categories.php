<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome admin categories
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                            
                            <?php
                            if(isset($_POST['createCategory'])){
                                create_category();
                            }
                            ?>
                            
                            
                            <form action="" method="post">
                                <div class="form-group">Add a category</div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="categoryname">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Create" name="createCategory">
                                </div>
                            </form>
                            
                            
<!--          ----    Updating the category-->
                            <?php
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "includes/update_category.php";
                            }
                            
                            ?>
                                                    
                        </div>
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
        <!--                    // ------------------------- Getting the list of categories -------------->

                                    <?php
                                        get_all_categories();
                                    ?>  
                                    
<!--             ------    -------------  php code for deleting the category ---------- -------->
                                    <?php
                                    if(isset($_GET['delete'])){
                                        delete_category();
                                    }
                                    ?>                            
                                
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php"; ?>