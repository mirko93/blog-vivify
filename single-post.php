<?php 

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once 'connect.php';
include_once 'create-comment.php';

?>

<?php include_once 'header.php'; ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <form method="POST" action="delete-post.php">
                <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/>
                <button id="deletePost" class="btn btn-outline-danger">Delete post</button>
            </form>
            <br>

            <?php 
            if (isset($_GET['id'])) {
            $sql = "SELECT posts.id, posts.title, posts.body, posts.created_at, posts.user_id, users.first_name, users.last_name FROM users LEFT JOIN posts ON posts.id = {$_GET['id']}";
            
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

            <?php
            $sql = "SELECT * FROM posts inner join comments on comments.post_id = {$_GET['id']}";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $comment_post = $statement->fetchAll();

            
            ?>
            
            <button class="btn btn-outline-secondary" onclick="button()">Show / Hide comments</button>
            <br> <br>
    
            <form id="myDiv" method="GET" action="delete-comment.php">
                <?php foreach ($comment_post as $post_comm): ?>
                <h5> - <b><?php echo $post_comm["author"] ?></b></h5>
                <div>
                    <ul>
                        <li><?php echo $post_comm["text"] ?></li>
                    </ul>
                </div>
                <input type="hidden" value="<?php echo $post_comm["post_id"] ?>" name="id"/>
                <button class="btn btn-warning">Delete</button><br><br>
                <br> <br>
                <?php endforeach ?>
            </form>
            
            <?php } else {
                echo "PAGE NOT FOUND! <br>";
                echo '<a href="index.php">Back to Home Page</a>';
            } ?>

        </div><!-- /.blog-main -->

        <?php include_once 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once 'footer.php'; ?>