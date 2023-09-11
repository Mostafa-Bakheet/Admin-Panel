<?php
include '../general/connect.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include_once("C:/xampp/htdocs/medical/admin/general/function.php");
$select = "SELECT * FROM `doctor` ";
$s = mysqli_query($conn , $select);
$message=null;

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $selectOne = "SELECT * FROM `doctor` where id = $id ";
$sOne = mysqli_query($conn , $selectOne);

$row = mysqli_fetch_assoc($sOne);
$image = $row['image'];
unlink("./upload/$image");



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
                            <th>Level</th>
                            <th>image</th>
                            <th colspan="2" >action</th>

                        </tr>
                        <?php foreach($s as $data) : ?>
                            <tr>  
                            <td> <?= $data['id']?></td>
                            <td> <?= $data['name']?></td>
                            <td> <?= $data['level']?></td>
                            <td> <img style="width: 50px;" src="./upload/<?= $data['image']?>" alt=""> </td>

                            <th> <a href="<?= url("doctor/list.php") ?>?delete=<?= $data['id'] ?>" class="btn btn-danger">Remove</a></th>
                            <th> <a href="<?= url("doctor/edit.php") ?>?edit=<?= $data['id'] ?>" class="btn btn-primary">edit</a></th>

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