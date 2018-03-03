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
                            Welcome admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
<!--
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
-->
                    </div>
                </div>
               
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <div class='huge'>
                                          <?php
                                          $query = "SELECT * FROM posts";
                                          $select_all_posts_result = mysqli_query($connection, $query);
                                          
                                          $post_count = mysqli_num_rows($select_all_posts_result);
                                            echo $post_count;
                                          ?>
                                        </div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <div class='huge'>
                                        
                                        <?php
                                          $comments_query = "SELECT * FROM comments";
                                          $select_all_comments_result = mysqli_query($connection, $comments_query);
                                          
                                          $comment_count = mysqli_num_rows($select_all_comments_result);
                                            echo $comment_count;
                                          ?>
                                         
                                        </div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'>
                                        
                                        <?php
                                          $users_query = "SELECT * FROM users";
                                          $select_all_users_result = mysqli_query($connection, $users_query);
                                          
                                          $users_count = mysqli_num_rows($select_all_users_result);
                                            echo $users_count;
                                          ?>
                                         
                                        </div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'>
                                        
                                        <?php
                                          $category_query = "SELECT * FROM categories";
                                          $select_all_categories_result = mysqli_query($connection, $category_query);
                                          
                                          $category_count = mysqli_num_rows($select_all_categories_result);
                                            echo $category_count;
                                          ?>
                                         
                                        </div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                <?php
                
                    $draft_posts_query = "SELECT * FROM posts WHERE status = 'Draft'";
                    $select_draft_posts_result = mysqli_query($connection, $draft_posts_query);
                    $draft_posts_count = mysqli_num_rows($select_draft_posts_result);
                
                    $published_posts_query = "SELECT * FROM posts WHERE status = 'Published'";
                    $select_published_posts_result = mysqli_query($connection, $published_posts_query);
                    $published_posts_count = mysqli_num_rows($select_published_posts_result);
                
                    $unapproved_comments_query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                    $select_unapproved_comments_result = mysqli_query($connection, $unapproved_comments_query);
                    $unapproved_comments_count = mysqli_num_rows($select_unapproved_comments_result);
                
                    $subscriber_query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
                    $select_subscriber_users_result = mysqli_query($connection, $subscriber_query);
                    $subscriber_users_count = mysqli_num_rows($select_subscriber_users_result);
                    
                
                ?>
                
                <div class="row">
                
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Data', 'Count'],
                                
                                <?php
                                
                                $element_text = ['Posts', 'Publihsed Posts', 'Draft Posts', 'Comments', 'Unapproved Comments', 'Users', 'Subscriber Users', 'Categories'];
                                $element_count = [$post_count, $published_posts_count, $draft_posts_count, $comment_count, $unapproved_comments_count, $users_count, $subscriber_users_count, $category_count];
                                
                                for($i = 0; $i < count($element_text); $i++){
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                                
                                ?>
                              
                            ]);

                            var options = {
                              chart: {
                                title: 'CMS Performance',
                                subtitle: '',
                              },
                              bars: 'vertical',
                              vAxis: {format: 'decimal'},
                              height: 400,
                              colors: ['#1b9e77', '#d95f02', '#7570b3']
                            };

                            var chart = new google.charts.Bar(document.getElementById('chart_div'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));

                            var btns = document.getElementById('btn-group');

                            btns.onclick = function (e) {

                              if (e.target.tagName === 'BUTTON') {
                                options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
                                chart.draw(data, google.charts.Bar.convertOptions(options));
                              }
                            }
                          }
                    
                    </script>
                    <div id="chart_div"></div>
                    
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php"; ?>