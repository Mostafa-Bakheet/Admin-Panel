<?php
include '../general/connect.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
$message=null;


$selectDoctor = "SELECT * FROM `doctor`  ";
$doctor = mysqli_query($conn , $selectDoctor);
$Selectdates = "SELECT * FROM `dates`  ";
$dates = mysqli_query($conn , $Selectdates);

if(isset($_POST['send']))

{
$doctorid= $_POST['doctorid'];

$dateid =$_POST['dateid'];

$insert = "INSERT INTO `doctor-dates` VALUES (NULL, $doctorid, $dateid)";
$i = mysqli_query($conn, $insert);
$message = testMessage($i , "Insert to DataBase");

}?>


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
                        <form class="row g-3 needs-validation"  method="POST">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Doctor</label>
                              <select name="doctorid" class="form-control" id=""> 
                               <?php foreach($doctor as $data) :  ?>


                                 <option value="<?= $data['id']?>">  <?= $data['name'] ?> </option>
                                
                                
                                 <?php endforeach; ?>
                              </select>
                             </div>
                            
                             <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">dates</label>
                              <select name="dateid" class="form-control" id=""> 
                               <?php foreach($dates as $data) :  ?>


                                 <option value="<?= $data['id']?>">  <?= $data['day'] ?> </option>
                                
                                
                                 <?php endforeach; ?>
                              </select>
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