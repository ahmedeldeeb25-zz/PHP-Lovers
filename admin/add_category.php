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
     
     $categ= mysqli_real_escape_string($db->link,htmlentities($_POST['category']));
    
     if($categ ==" " ){
         
         $error= "Please Fill all Fields To proceed.";
     }
     else{
         $query= "INSERT INTO categories (Name)
                 VALUES ('$categ');
                ";       
         $insert_row = $db->insert($query);
     }    
 }
     

 

?>


<form role="form" method="post" action="add_category.php" style="margin:10px; width:75%">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input name="category" type="text" class="form-control" id="exampleInputEmail1" placeholder=" Category Name">
    
  </div>
    
  
    
  <input type="submit" name="submit" class="btn btn-primary" value="submit">
    <a href=index.php class="btn btn-danger">Cancel</a>
 
</form>

<?php include ("includes/footer.php");?>