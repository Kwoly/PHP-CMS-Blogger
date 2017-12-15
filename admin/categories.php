<?php include "includes/header.php" ?>

    <div id="wrapper">

        <?php include "includes/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin.
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                        <?php 
                        
                        if(isset($_POST['submit'])) {
                          $catTitle = $_POST['cat_title'];

                          if($catTitle == "" || empty($catTitle)) {
                            echo "This field can not be empty";
                          } else {
                            $query = "INSERT INTO categories(cat_title) ";
                            $query .= "VALUE('{$catTitle}') ";
                            $createCategoryQuery = mysqli_query($connection, $query);
                            if(!$createCategoryQuery) {
                              die('Query Failed ' . mysqli_error());
                            }
                          }
                        }
                        
                        ?>
                          <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">Category Title</label>
                                <input class="form-control" type="text" name="cat_title">                            
                            </div>
                            <div class="formg-roup">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">                            
                            </div>
                          </form>
                        </div>

                        <div class="col-xs-6">
                        <?php 
                          $query = "SELECT * FROM categories";
                          $selectAllCategories = mysqli_query($connection, $query);
                        ?>
                          <table class="table table-bordered table-hover"><thead>
                            <tr>
                              <th>ID</th>
                              <th>Category Title</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            while($row = mysqli_fetch_assoc($selectAllCategories)) {
                              $catTitle =  $row['cat_title'];
                              $catId =  $row['cat_id'];
                              echo "<tr>";
                              echo "<td>{$catId}</td>";
                              echo "<td>{$catTitle}</td>";
                              echo "</tr>";
                            }
                            ?>
                          </tbody>
                          </table>
                        </div>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
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
