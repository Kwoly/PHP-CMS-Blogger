<?php include "includes/db.php" ?>
<?php include "includes/head.php" ?>
<?php include "includes/nav.php" ?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
                <?php 
                $query = "SELECT * FROM posts";
                $selectAllPostsQuery = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($selectAllPostsQuery)) {
                    $postTitle =  $row['post_title'];
                    $postAuthor =  $row['post_author'];
                    $postDate =  $row['post_date'];
                    $postImage =  $row['post_image'];
                    $postContent =  $row['post_content'];

                    
                    ?>
                    <!-- First Blog Post -->
                    <div>
                    <h2>
                        <a href="#"><?php echo $postTitle ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $postAuthor ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postDate ?></p>
                    <hr>
                    <img class="img-responsive" src="images\<?php echo $postImage ?>" alt="">
                    <hr>
                    <p><?php echo $postContent ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    </div>
                    <?php } ?>

                

            </div>

            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/foot.php" ?>
