<?php
include '../general/connect.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
$message = null;

if (isset($_GET['edit'])) {


    $id = $_GET['edit'];

    $selectDoctor = "SELECT * FROM `doctor` ";
    $doctorResult = mysqli_query($conn, $selectDoctor);
    $doctor = mysqli_fetch_assoc($doctorResult);

    $selectDates = "SELECT * FROM `dates` ";
    $datesResult = mysqli_query($conn, $selectDates);
    $dates = mysqli_fetch_assoc($datesResult);

    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $day = $_POST['day'];
        $update = "UPDATE `doctor-dates` SET name = '$name', day = '$day' WHERE id = $id";
        $i = mysqli_query($conn, $update);
        $message = "Updated data in the database";
    }
}
?>



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
        <form class="row g-3 needs-validation" method="POST">
            <div class="col-md-4">
                <label for="fullname" class="form-label">Full name</label>
                <select name="doctorid" class="form-control" id=""> 
                               <?php foreach($doctorResult as $data) :  ?>


                                 <option value="<?= $data['id']?>">  <?= $data['name'] ?> </option>
                                
                                
                                 <?php endforeach; ?>
                              </select>
            </div>

            <div class="col-md-3">
                <label for="day" class="form-label">Day</label>
                <select name="dateid" class="form-control" id=""> 
                               <?php foreach($datesResult as $data) :  ?>


                                 <option value="<?= $data['id']?>">  <?= $data['day'] ?> </option>
                                
                                
                                 <?php endforeach; ?>
                              </select>
            </div>

            <div class="col-12">
                <button name="send" class="btn btn-warning" type="submit">Update Form</button>
            </div>
        </form>
        <!-- End Custom Styled Validation -->

    </div>
</div>

</main>

<?php
include '../shared/footer.php';
include '../shared/script.php';
?>