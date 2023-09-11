<?php
include '../general/connect.php';
include '../general/function.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';



$name = "";
$password = "";
$img ='';
$email = '';
$doc = '';
$suc = false;
$fail = false;
if(isset($_GET['up'])){

  $id = $_GET['up']; 
  
  $sql = "SELECT * FROM `admin` where id =$id ";
  $doc = mysqli_fetch_assoc( mysqli_query($conn , $sql));
  $name = $doc['name'];
  $password =$doc['password'];
  $email = $doc['email'];
  $img = $doc['img'];
  $img2 = $doc['img'];
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $password =$_POST['password'];
    $email = $_POST['email'];
    $img = rand(0,1000).rand(0,1000).$_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $folder = "upload/" . $img;
   /* if(validate($name) or validate($pass) or validate($email)   ){
      $fail = "Please fill all inputs";
    }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $fail = "Invalid email format";
    }
    else if(!isimg($_FILES['img']['type'] , "image/jpeg" , "image/jpg" , "image/png") && !isset($_FILES['img']['tmp_name']) ) {
      $fail = "please upload an image (jpeg , png , jpg)";
    }
    else if(imgSize($_FILES['img']['size'] , 1)) {
      $fail = "image cannot exceed 1 mega";
    }
  else if(len($pass , 8 , 50) ){
      $fail = "Password should be between 8 to 50 chararcters";
    }
   
    }else{
      $suc = "Data recorded successfully";
      
    $update ='';
    if(is_numeric($img) ){


      $update = "UPDATE `admin` SET name = '$name'  , email='$email'  , pass = '$pass' where id =$id ";
    }else{
        */
      $update = "UPDATE `admin` SET name = '$name' ,  password = '$password' , email='$email', img='$img'   where id =$id ";
      unlink("upload/$img2");
      move_uploaded_file($tmp ,$folder);
      mysqli_query($conn , $update);
    
    }
  //  echo "<script>location.replace('list.php?');</script>";
    }
    

  
    
    

 // }

else{
  echo "<script>location.replace('list.php?');</script>";
}
?>
  <main id="main" class="main">
  <form method="post" action= "" enctype= "multipart/form-data" >
    
  <?php
    if($suc):
    ?>
    <div class="alert alert-success"><?=$suc?></div>
    <?php
        elseif($fail):  
    ?>
    <div class="alert alert-danger"><?=$fail?></div>
    <?php endif; ?>
  <div class="form-group">
    
    <input type="text" value="<?=$name?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Doctor Name">
    
  </div>
  
  <br>
  <div class="form-group">
   
    <input type="email" value="<?=$email?>" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
  </div>
  <br>
  <div class="form-group">
    
    <input type="file" value="<?=$img?>" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">
    
  </div>
  <br>
  
  <div class="form-group">
   
    <input type="password" value="<?=$password?>" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <br>

  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
  </main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>