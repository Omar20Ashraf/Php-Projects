
<?php include './includes/header.php';

$db=new Database();

//Create query for posts
$query="SELECT * FROM posts";
//run the query
$posts=$db->select($query);

//Create query for categories
$query="SELECT * FROM categories";
//run the query
$categories=$db->select($query);
?>
<?php if($posts) : ?>
<?php while( $row=$posts->fetch_assoc() ) : ?>    
    <div class="blog-post">
    <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>

    <p class="blog-post-meta"><?php echo formatDate($row['date']) ; ?>
    by <a href="#"><?php echo $row['author']; ?></a></p>

    <p><?php echo shortenText($row['body']) ; ?></p>

    <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']) ?>"> 
        Read More
    </a>

    </div><!-- /.blog-post -->
<?php endwhile; ?>

<?php else : ?>
<p>There is no posts yet.</p>

<?php endif; ?>
<?php include './includes/footer.php';