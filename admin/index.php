<?php include("includes/header.php"); ?>
        
<?php 

  $db= new DB();

   $query="SELECT posts.*, categories.Name  FROM posts
            INNER JOIN categories
            ON posts.category = categories.id
            ORDER BY posts.ID";
       
  $post=$db->select($query);

    $query="SELECT * FROM categories";

   $cat=$db->select($query);


  

?>
        
  <table class="table table-striped table-bordered  table-hover">
      <tr>
          <th>Post ID</th>
          <th>Post Title</th>
          <th>Category</th>
          <th>Author</th>
          <th>Date</th>   
      </tr>
       <?php while($row = $post->fetch_assoc()): ?>
       <tr>
       
          <th><?php echo $row["ID"]; ?></th>
          <th><a href="edit_post.php?id= <?php echo $row["ID"]; ?> "><?php echo $row["title"]; ?></a></th>
          <th><?php echo $row["Name"]; ?></th>
          <th><?php echo $row["author"]; ?></th> 
          <th><?php echo formatDate($row['date']) ?></th> 
       
      </tr>
       <?php endwhile; ?>
  </table>

<br />
 <table class="table table-striped table-bordered table-hover">
      <tr>
          <th>Category ID</th>
          <th>Category Name</th>
            
      </tr>
      <?php while($cate = $cat->fetch_assoc()): ?>
       <tr>
       
          <th><?php echo $cate["ID"]; ?></th>
          <th><a href="edit_category.php?id= <?php echo $cate["ID"]; ?> "><?php echo $cate["Name"];?></a></th>
      
           
       </tr>
       <?php endwhile; ?>
  </table>
        
        
        
            
<?php include("includes/footer.php"); ?>
                  

       