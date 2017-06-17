<?php include ("includes/header.php");?>

<?php
   
    $db = new DB();

 //  $query="SELECT * FROM posts WHERE ID=$id";

  // $posts=$db->select($query);
  // $row = $posts->fetch_assoc();

    $query="SELECT * FROM categories";
    $cat=$db->select($query);
    

?>

<?php
 
 if(isset($_POST['submit'])){
     
     $title= mysqli_real_escape_string($db->link,htmlentities($_POST['Title']));
     $body= mysqli_real_escape_string($db->link,htmlentities($_POST['body']));
     $category= mysqli_real_escape_string($db->link,htmlentities($_POST['category']));
     $author= mysqli_real_escape_string($db->link,htmlentities($_POST['author']));
     $tag= mysqli_real_escape_string($db->link,htmlentities($_POST['tag']));
     
     if ($title =="" ||$body =="" ||$category =="" ||$tag =="" || $author == ""){
         
         echo "Please Fill all Fields To proceed.";
     }
     else{
         $query= "INSERT INTO posts (category,title,body,author,tags)
                 VALUES ($category,'$title','$body','$author','$tag');
                ";
         
         $insert_row = $db->insert($query);
     }
     
 }
     

 

?>


<form role="form" method="post" action="add_post.php" style="margin:10px; width:75%">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input name="Title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
  </div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Post Body</label>
    <textarea name="body" class="form-control"  placeholder="Enter Title"></textarea>
  </div>
    
 <div class="form-group" style="width:25%">
    <label for="exampleInputEmail1">Post Category</label>
      <select name="category" class="form-control">
       <?php while($cate = $cat->fetch_assoc()): ?>      
        <option value="<?php echo $cate["ID"] ;?>"><?php echo $cate["Name"] ;?></option> 
        <?php endwhile; ?>
     </select>
    
  </div>
    
   <div class="form-group">
    <label for="exampleInputEmail1">Post Author</label>
    <input name="author" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Author">
  </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Tags</label>
    <input name="tag" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Tag">
  </div>
    
    
    
  <input type="submit" name="submit" class="btn btn-primary" value="submit">
  <a href=index.php class="btn btn-danger">Cancel</a>
</form>

<?php include ("includes/footer.php");?>