<?php include("includes/header.php") ; ?>


<?php

$id = $_GET['id'];
    $db = new DB();

   $query="SELECT * FROM posts WHERE ID=$id";

   $posts=$db->select($query);
   $row = $posts->fetch_assoc();

    $query="SELECT * FROM categories";
    $cat=$db->select($query);
    

?>
<div class="row">

        <div class="col-sm-8 blog-main">

    <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'] ; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']);  ?> by <a href="#"><?php echo $row['author']  ?></a></p>

              <p class="lead"> <?php echo $row['body'];  ?></p>
              
             
          </div><!-- /.blog-post -->
<?php include("includes/footer.php") ; ?>