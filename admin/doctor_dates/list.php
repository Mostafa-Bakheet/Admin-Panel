<?php
include '../general/connect.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include_once("C:/xampp/htdocs/medical/admin/general/function.php");
$select = "SELECT * FROM `joindate` ";
$s = mysqli_query($conn , $select);
$message=null;

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `doctor` WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $delete);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $d = mysqli_stmt_execute($stmt);

    if ($d) {
        testMessage(true, "Delete Doctor");
        $message = testMessage(true, "Delete from DataBase");
    } else {
        testMessage(false, "Delete Doctor");
        $message = testMessage(false, "Failed to delete from DataBase");
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
        <h5 class="card-title">List doctor page</h5>
                    <div class="card-body table-striped">
                     <table class="table">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>day</th>
                            <th colspan="2" >action</th>

                        </tr>
                        <?php foreach($s as $data) : ?>
                            <tr>  
                            <td> <?= $data['dateid']?></td>
                            <td> <?= $data['name']?></td>
                            <td> <?= $data['day']?></td>
                          
                            <th> <a href="<?= url("doctor_dates/list.php") ?>?delete=<?= $data['dateid'] ?>" class="btn btn-danger">Remove</a></th>
                            <th> <a href="<?= url("doctor_dates/edit.php") ?>?edit=<?= $data['dateid'] ?>" class="btn btn-primary">edit</a></th>

                            </tr>
                            <?php endforeach; ?>
                     </table>
                </div>
         </div>
   </div>
</main>

<?php
include '../shared/footer.php';
include '../shared/script.php';
?>