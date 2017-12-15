<form action="" method="post">
  <div class="form-group">
  <label for="cat_title">Edit Category</label>
    <?php 

    if(isset($_GET['edit'])) {
      $catId = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE cat_id = $catId";
    $selectCategoryById = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($selectCategoryById)) {
      $catTitle =  $row['cat_title'];
      $catId =  $row['cat_id'];
    ?>  
      <input value="<?php if(isset($catTitle)) {echo $catTitle;} ?>" class="form-control" type="text" name="cat_title">                            
    <?php }} ?>

    <?php 
    if(isset($_POST['edit'])) {
      $catTitle = $_POST['cat_title'];
    $query = "UPDATE categories SET cat_title = '{$catTitle}' WHERE cat_id = {$catId} ";
    $updateCategoryQuery = mysqli_query($connection, $query);
    if(!$updateCategoryQuery) {
      die("Query Failed " . mysqli_error($connection));
    } else {
      header("Location: categories.php");
    }

    }
    ?>
  </div>
  <div class="formg-roup">
      <input class="btn btn-primary" type="submit" name="edit" value="Update">                            
  </div>
</form>