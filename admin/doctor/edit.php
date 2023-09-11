<?php
include '../general/connect.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
$message=null;
if($_GET['edit']){
$id = $_GET['edit'];
$select = "SELECT * FROM `doctor` where id=$id";
$s = mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
if(isset($_POST['send']))
{
    $name = $_POST['name'];
    $level =  $_POST['level'];

if(empty($_FILES['image']['name'])){
    $image_name = $row['image'];
}
else{
$oldimage = $row['image'];
unlink("./upload/$oldimage");
    $image_name = rand(0,1000) .  rand(0,1000) .$_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);
}


    $update = "UPDATE  doctor SET  name = '$name' , level = '$level' , image = '$image_name' where  id= $id";
    $i = mysqli_query($conn, $update);
    $message = testMessage($u , "update to DataBase");
}
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
                        <h5 class="card-title">Update doctor</h5>
                        

                        <!-- Custom Styled Validation -->
                        <form class="row g-3 needs-validation"  method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Full name</label>
                                <input type="text" class="form-control" value="<?= $row['name']?>" name="name" id="fullname" value="" required>
                              
                            </div>
                            
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Level</label>
                                <input type="text" class="form-control" value="<?= $row['level']?>" name="level" id="level" required>
                    
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                             
                            </div>
                            <div class="col-12">
                                <button name="send" class="btn btn-warning" type="submit">update form</button>
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