<?php include ("includes/header.php");?>

<?php
    $id = $_GET['id'];
    $db = new DB();

   $query="SELECT * FROM posts WHERE ID=$id";

   $posts=$db->select($query);
   $row = $posts->fetch_assoc();

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
        
         $query= "UPDATE posts SET 
         category=$category ,title='$title' ,body='$body' ,author='$author' ,tags='$tag' 
         WHERE ID=$id;
                ";
         
         $update_row = $db->update($query);
     }
     
 }
?>

<?php
 
 if(isset($_POST['delete'])){
     
     $query = "DELETE FROM posts WHERE ID =$id";
     
     $delete_row = $db->delete($query);
     
 }
?>

<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>" style="margin:10px; width:75%">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input name="Title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="<?php echo $row["title"] ;?>">
  </div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Post Body</label>
    <textarea rows="10" name="body" class="form-control"  placeholder="Enter Title"><?php echo $row["body"] ;?></textarea>
  </div>
    
 <div class="form-group" style="width:25%">
    <label for="exampleInputEmail1">Post Category</label>
    <select name="category" class="form-control">
      <?php while($cate = $cat->fetch_assoc()): ?>
        
        <?php if($cate["ID"] == $row["category"])
           $selected = "selected";
         else
             $selected = " ";      
        ?>
       
        <option <?php echo $selected ;?> value="<?php echo $cate["ID"] ?>"  ><?php echo $cate["Name"] ;?></option>
        <?php endwhile; ?>
     </select>
  </div>
    
   <div class="form-group">
    <label for="exampleInputEmail1">Post Author</label>
    <input name="author" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Author" value="<?php echo $row["author"] ;?>">
  </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Tags</label>
    <input name="tag" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Tag" value="<?php echo $row["tags"] ;?>">
  </div>
    
    
    
 <input type="submit" name="submit" class="btn btn-primary" value="submit">
    <a href=index.php class="btn btn-danger">Cancel</a>
    <input type="submit" name="delete" class="btn btn-primary" value="Delete">
</form>





<?php include ("includes/footer.php");?>