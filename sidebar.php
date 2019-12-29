<?php include_once 'connect.php'; ?>

<?php
$sql = "SELECT id, title, created_at FROM posts ORDER BY created_at DESC LIMIT 5";
$statement = $conn->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$sidebar = $statement->fetchAll();
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module">
                <h4>Latest Posts</h4>
                <ol class="list-unstyled">
                    <?php foreach ($sidebar as $latest_post): ?>
                    <li><a href="single-post.php?id=<?php echo $latest_post['id'] ?>"><?php echo $latest_post['title'] ?></a></li>
                    <?php endforeach ?>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->