<?php
include '../general/connect.php';
include '../general/function.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
$message=null;
$erros= [];
if(isset($_POST['send']))
{
    $name = ($_POST['name']);
    $level =  ($_POST['level']);



        $image_name = rand(0,1000) .  rand(0,1000) .$_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "./upload/$image_name";
        $img_size = $_FILES['image']['size'];
        $img_type = $_FILES['image']['type'];

   /*     if(trim($name)=="" || strlen($name) < 3 || strlen($name) >20){
            if(trim($name)==""){
                $erros[]="You must Enter Name";

            }
            if(strlen($name) < 3){
                $erros[]="You must Enter More than 3 Char";

            }
            if(strlen($name) >20){
                $erros[]="You must Enter less  than 20 Char";

            }
        }
     else   if(Numbervalidition($level)){
            $erros[]="You must Enter level";
                    }
      else  if(filter_size_file(    $image_name , $img_size , 1)){
         $erros[]="You must Enter image equal 1 mega or less";
         }
       else if(filterType_file($img_type,"image/jpeg" , "image/png" , "image/jpg")){
            $erros[]="You must Enter image type jpeg or png or jpg";


        }*/
        // else if(empty($erros)){

            move_uploaded_file($tmp_name, $location);
            $insert = "INSERT INTO doctor VALUES(NULL ,'$name' ,'$level', '$image_name')";
            $i = mysqli_query($conn, $insert);
            $message = testMessage($i , "Insert to DataBase");
     //    }
}



?>


<main id="main" class="main">
 <div class="container">

 
<?php if($message !=null):?>
    <div class="alert alert-success">

<?php echo $message;?>

    </div>
    <?php endif; ?>




 
    <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Add doctor</h5>
                        

                        <!-- Custom Styled Validation -->
                        <form class="row g-3 needs-validation"  method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Full name</label>
                                <input type="text" class="form-control" name="name" id="fullname" value="" required>
                            
                            </div>
                            
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Level</label>
                                <input type="text" class="form-control" name="level" id="level" required>
                           
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                             
                            </div>
                            <div class="col-12">
                                <button name="send" class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                        <!-- End Custom Styled Validation -->

                    </div>
                </div>
                

</div>
</main>

<?php
include '../shared/footer.php';
include '../shared/script.php';
?>