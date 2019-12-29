<?php 
include_once 'connect.php';
include_once 'create-comment.php';

?>

<?php include_once 'header.php'; ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php 
            if (isset($_GET['id'])) {
                $sql = "SELECT posts.id, posts.title, posts.body, posts.created_at, posts.user_id, users.first_name, users.last_name, comments.id, comments.author, comments.text, comments.post_id FROM posts LEFT JOIN comments ON comments.post_id = {$_GET['id']} LEFT JOIN users ON users.id = posts.user_id ORDER BY posts.id = {$_GET['id']} DESC";
            
                $statement = $conn->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $single_post = $statement->fetch();
            ?>

            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $single_post['title'] ?></h2>
                <p class="blog-post-meta"><?php echo $single_post['created_at'] ?> by <a href="#"><?php echo $single_post['first_name'] ?> <?php echo $single_post['last_name'] ?></a></p>

                <p><?php echo $single_post['body'] ?></p>
                <hr>
            </div><!-- /.blog-post -->

            <div class="comments-post">
                <h3>Comment:</h3>
                <form action="create-comment.php" method="POST">
                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $_GET['id'] ?>">
                    <input type="text" name="author" placeholder="Name" required> <br> <br>
                    <textarea id="text" name="text" cols="30" rows="10" placeholder="Comment" required></textarea><br><br>
                    <button class="btn btn-outline-success" name="button">Post comment</button><br> <br>
                </form>
            </div>
            
            <?php $i = 1; while($i < $single_post['post_id']) { ?>

            <div class="all-comment-post" style="border: 1px solid #999; padding: 10px"><br>
                <h5> - <?php echo $single_post['author'] ?></h5>
                <ul>
                    <li><?php echo $single_post['text'] ?></li>
                </ul>
            </div>
            <br>
            <?php $i++; } ?>

            <?php } else {
                echo "PAGE NOT FOUND! <br>";
                echo '<a href="index.php">Back to Home Page</a>';
            } ?>

        </div><!-- /.blog-main -->

        <?php include_once 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php 
include_once 'footer.php';
?>
