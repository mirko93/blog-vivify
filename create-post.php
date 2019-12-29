<?php 
include_once 'connect.php';
include_once 'post-create.php';

$sql = "SELECT users.id, posts.id, posts.user_id, posts.title, posts.body, posts.created_at FROM posts LEFT JOIN users ON users.id = posts.user_id ORDER BY created_at DESC";

$statement = $conn->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$post = $statement->fetch();

?>

<?php include_once 'header.php'; ?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title" style="text-decoration: none;">Create New Post</h2>
            </div>
            <div class="create-post">
                <form action="post-create.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <input type="text" name="title" placeholder="Title" required><br> <br>
                    <textarea id="text" name="body" cols="30" rows="10" placeholder="Body text" required></textarea><br><br>
                    <button class="btn btn-outline-primary" name="button">Post comment</button><br> <br>
                </form>
            </div>


        </div><!-- /.blog-main -->

        <?php include_once 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php 
include_once 'footer.php';
?>
