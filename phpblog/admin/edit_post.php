<?php include './includes/header.php'; ?>
<?php
// $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$id = $_GET['id'];

// Create DB Object
$db = new Database();

// Create Query
$query = "SELECT * FROM posts WHERE id = " . $id;
// Run Query
$post = $db->select($query)->fetch_assoc();

// Create categories query
$query = "SELECT * FROM categories";
// Run Query
$categories = $db->select($query);
?>
<?php
    if(isset($_POST['submit']))
    {
     //Assign Var
        $title=mysqli_real_escape_string($db->link,$_POST['title']);
        $body=mysqli_real_escape_string($db->link,$_POST['body']);
        $category=mysqli_real_escape_string($db->link,$_POST['category']);
        $author=mysqli_real_escape_string($db->link,$_POST['author']);
        $tags=mysqli_real_escape_string($db->link,$_POST['tags']);

        //simble validation
        if($title =='' || $body =='' || $category =='' || $author =='' || $tags =='' )
        {
            echo "Please insert all the filed";
        } else
        {
            $query = "UPDATE posts SET 
                      title = '{$title}', 
                      body = '{$body}',
                      category = '{$category}',
                      author = '{$author}',
                      tags = '{$tags}'
                      WHERE id =".$id;

            $insert_row=$db->update($query);        
        }
          
    }
?>

<?php
    if(isset($_POST['delete']))
    {
        $query="DELETE FROM posts WHERE id =".$id;
        $delete_row=$db->delete($query);
    }
?>
<form method="post" action="edit_post.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" value="<?php echo $post['title']; ?>">
    </div>

    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <?php while ($row = $categories->fetch_assoc()): ?>
                <?php $selected = ($row['id'] == $post['category']) ? "selected" : ""; ?>
                <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Post Author</label>
        <input name="author" type="text" class="form-control" value="<?php echo $post['author']; ?>">
    </div>

    <div class="form-group">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" value="<?php echo $post['tags']; ?>">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit">
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete">
    </div><br>
</form>

<?php include './includes/footer.php'; ?>