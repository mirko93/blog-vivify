<?php
include_once 'header.php';
?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">Sample blog post</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
            </div>

            <div class="all-comment-post">
                <ul style="border: 1px solid #000; padding: 20px;">
                    <li>Name: </li>
                    <li>Comment: </li>
                </ul>
            </div>

        </div><!-- /.blog-main -->

        <?php include_once 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php 
include_once 'footer.php';
?>
