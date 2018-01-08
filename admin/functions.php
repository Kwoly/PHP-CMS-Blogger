<?php 

function insert_categories() {
    global $connection;
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
}

function find_all_categories() {
    global $connection;
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
}

function delete_category() {
    global $connection;
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
}





























?>