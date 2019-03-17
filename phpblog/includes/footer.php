</div><!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p><?php echo $site_description; ?></p>
    </div>
    <div class="sidebar-module">
        <h4>Categories</h4>
        <?php if($categories) : ?>
        <?php while( $row = $categories->fetch_assoc()) : ?>
        <ol class="list-unstyled">
            <li><a href="posts.php?category=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>
        </ol>
        <?php endwhile; ?>

        <?php else : ?>
        <p>There is no categories.</p>
        <?php endif; ?>
    </div>

</div><!-- /.blog-sidebar -->

</div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
<p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
<p>
<a href="#">Back to top</a>
</p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>