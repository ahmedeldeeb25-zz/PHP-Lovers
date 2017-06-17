<?php include("includes/header.php") ; ?>


<?php
    $db = new DB();

   $query="SELECT * FROM posts";

   $posts=$db->select($query);

    $query="SELECT * FROM categories";

   $cat=$db->select($query);

?>
<div class="row">

        <div class="col-sm-8 blog-main">
            
            <?php if($posts): ?>
            <?php while($row = $posts->fetch_assoc()): ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']  ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date'])  ?> by <a href="#"><?php echo $row['author']  ?></a></p>

              <p class="lead"> <?php echo shortenText($row['body']);  ?></p>
              
              <a class="readmore" href="post.php?id=<?php echo $row['ID']  ?>">Read More</a>
          </div><!-- /.blog-post -->
            <?php endwhile; ?>
            
            <?php else : ?>
            <p>There are no post Now.</p>
            
            <?php endif; ?>

          <?php include("includes/footer.php") ; ?>

      