<?php include "includes/header.php" ?>

    <div id="wrapper">

        <?php include "includes/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                            <!-- <small>Author</small> -->
                        </h1>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Images</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                global $connection;
                                $query = "SELECT * FROM posts";
                                $selectAllPosts = mysqli_query($connection, $query);
                            
                                while($row = mysqli_fetch_assoc($selectAllPosts)) {
                                  $postId =  $row['post_id'];
                                  $postAuthor =  $row['post_author'];
                                  $postTitle =  $row['post_title'];
                                  $catId =  $row['post_category_id'];
                                  $postStatus =  $row['post_status'];
                                  $postImage =  $row['post_image'];
                                  $postTags =  $row['post_tags'];
                                  $postCommentCount =  $row['post_comment_count'];
                                  $postDate =  $row['post_date'];
                                  echo "<tr>";
                                  echo "<td>{$postId}</td>";
                                  echo "<td>{$postAuthor}</td>";
                                  echo "<td>{$postTitle}</td>";
                                  echo "<td>{$catId}</td>";
                                  echo "<td>{$postStatus}</td>";
                                  echo "<td><img width='100' class='img-responsive' src='../images/{$postImage}' /></td>";
                                  echo "<td>{$postTags}</td>";
                                  echo "<td>{$postCommentCount}</td>";
                                  echo "<td>{$postDate}</td>";
                                  echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php" ?>
