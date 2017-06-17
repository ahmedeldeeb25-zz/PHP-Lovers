<?php include ("includes/header.php");?>

<?php
    $id = $_GET['id'];
    $db = new DB();

   $query="SELECT * FROM categories WHERE ID=$id";

   $posts=$db->select($query);
   $row = $posts->fetch_assoc();

    
    

?>


<?php
 
 if(isset($_POST['submit'])){
     
     $name= mysqli_real_escape_string($db->link,htmlentities($_POST['category']));
    
     if ($name =="" ){
         
         echo "Please Fill all Fields To proceed.";
     }
     else{
        
         $query= "UPDATE categories SET 
         Name='$name'  
         WHERE ID=$id;
                ";
         
         $update_row = $db->update($query);
     }
     
 }
     

 

?>

<?php

if(isset($_POST['delete'])){
     
     $query = "DELETE FROM categories WHERE ID =$id";
     
     $delete_row = $db->delete($query);
     
 }

?>

<form role="form" method="post" action="edit_category.php?id=<?php echo $id;?>" style="margin:10px; width:75%">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input name="category" type="text" class="form-control" id="exampleInputEmail1" placeholder=" Category Name" value="<?php echo $row['Name']; ?>">
  </div>
    
  <input type="submit" name="submit" class="btn btn-primary" value="submit">
  <a href=index.php class="btn btn-danger">Cancel</a>
    <input type="submit" name="delete" class="btn btn-primary" value="Delete">
</form>

<?php include ("includes/footer.php");?>