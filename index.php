<?php 
include_once 'connect.php';

?>

<?php include_once 'header.php'; ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php 
            $sql = "SELECT posts.id, posts.title, posts.body, posts.created_at, posts.user_id, users.first_name, users.last_name FROM posts LEFT JOIN users ON users.id = posts.user_id ORDER BY created_at DESC LIMIT 5";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $posts = $statement->fetchAll();
            ?>

            <?php foreach ($posts as $post): ?>

            <div class="blog-post">

                <h2 class="blog-post-title"><a href="single-post.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h2>
                <p class="blog-post-meta"><?php echo $post['created_at'] ?> by <a href="#"><?php echo $post['first_name'] ?> <?php echo $post['last_name'] ?></a></p>

                <p><?php echo $post['body'] ?></p>
                <hr>

            </div><!-- /.blog-post -->

            <?php endforeach ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php include_once 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include_once 'footer.php'; ?>