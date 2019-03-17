<?php include './includes/header.php'; ?>
<?php 
// $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$id = $_GET['id'];

// Create DB Object
$db = new Database();

// Create Query
$query = "SELECT * FROM categories WHERE id = " . $id;
// Run Query
$category = $db->select($query)->fetch_assoc();

// Create categories query
$query = "SELECT * FROM categories";
// Run Query
$categories = $db->select($query);
?>
<?php
    if(isset($_POST['submit']))
    {
     //Assign Var
        $name=mysqli_real_escape_string($db->link,$_POST['name']);

        //simble validation
        if($name =='' )
        {
            echo "Please insert all the filed";
        } else
        {
            $query = "UPDATE categories SET 
                      name = '{$name}'
                      WHERE id =".$id;

            $update_row=$db->update($query);        
        }
          
    }
?>
<?php
    if(isset($_POST['delete']))
    {
        $query="DELETE FROM categories WHERE id =".$id;
        $delete_row=$db->delete($query);
    }
?>
<form method="post" action="edit_category.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control" value="<?php echo $category['name'] ?>">
    </div>
    
    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit">
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete">
    </div><br>
</form>
<?php include './includes/footer.php'; ?>