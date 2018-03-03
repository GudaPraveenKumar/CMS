<?php 

$active_page = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

?> 

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Home</a></li>
            
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php
                    
                    if($active_page == '' || $active_page == 'index.php'){
                        $dashboard_active = 'active';
                    }else{
                        $dashboard_active = '';
                    }
                    
                    ?>
                    <li class="<?php echo $dashboard_active ?>">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <?php
                    
                    if($active_page == 'posts.php'){
                        $posts_active = 'active';
                    }else{
                        $posts_active = '';
                    }
                    
                    ?>
                    <li class="<?php echo $posts_active ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="posts.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_new_post">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    
                    <?php
                    
                    if($active_page == 'categories.php'){
                        $categories_active = 'active';
                    }else{
                        $categories_active = '';
                    }
                    
                    ?>
                    
                    <li class="<?php echo $categories_active ?>">
                        <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    <?php
                    
                    if($active_page == 'users.php'){
                        $users_active = 'active';
                    }else{
                        $users_active = '';
                    }
                    
                    ?>
                    <li class="<?php echo $users_active ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_new_user">Add User</a>
                            </li>
                        </ul>
                    </li>
                   
                    <?php
                    
                    if($active_page == 'comments.php'){
                        $comment_active = 'active';
                    }else{
                        $comment_active = '';
                    }
                    
                    ?>
                    <li class="<?php echo $comment_active ?>">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments </a>
                    </li>
                    
                    <?php
                    
                    if($active_page == 'profile.php'){
                        $profile_active = 'active';
                    }else{
                        $profile_active = '';
                    }
                    
                    ?>
                    <li class="<?php echo $profile_active ?>">
                    
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
