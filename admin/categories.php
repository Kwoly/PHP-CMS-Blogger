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

                          <?php if(isset($_GET['edit'])) {
                            $catId = $_GET['edit'];
                            include "includes/edit-categories.php";
                          } ?>
                        </div>

                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover"><thead>
                            <tr>
                              <th>ID</th>
                              <th>Category Title</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php // Find all categories
                            $query = "SELECT * FROM categories";
                            $selectAllCategories = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($selectAllCategories)) {
                              $catTitle =  $row['cat_title'];
                              $catId =  $row['cat_id'];
                              echo "<tr>";
                              echo "<td>{$catId}</td>";
                              echo "<td>{$catTitle}</td>";
                              echo "<td><a href='categories.php?delete={$catId}'><span class='fa fa-trash'></span></a></td>";
                              echo "<td><a href='categories.php?edit={$catId}'><span class='fa fa-pencil-square-o'></span></a></td>";
                              echo "</tr>";
                            }
                            ?>

                            <?php // Delete category query
                            if(isset($_GET['delete'])) {
                              $catId = $_GET['delete'];
                            $query = "DELETE FROM categories WHERE cat_id = {$catId} ";
                            $deleteCategoryQuery = mysqli_query($connection, $query);
                            if(!$deleteCategoryQuery) {
                              die("Query Failed " . mysqli_error());
                            } else {
                              header("Location: categories.php");
                            }

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
