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
              if(isset($_POST['submit'])) {
                  $search = $_POST['search'];
                  $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                  $searchQuery = mysqli_query($connection, $query);

                  if(!$searchQuery) {
                      die("Query Failed " . mysqli_error($connection));
                  }

                  $count = mysqli_num_rows($searchQuery);
                  if ($count != 0) {
                      echo "There are " . $count . " results";
      
                      while($row = mysqli_fetch_assoc($searchQuery)) {
                          $postTitle =  $row['post_title'];
                          $postAuthor =  $row['post_author'];
                          $postDate =  $row['post_date'];
                          $postImage =  $row['post_image'];
                          $postContent =  $row['post_content'];
      
                          
                          ?>
                          <!-- First Blog Post -->
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
                          <?php }
                  } else {
                      echo "There are no results";
                  }
              }
              ;
              ?>
            </div>

            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/foot.php" ?>
