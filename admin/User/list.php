<?php
include '../general/connect.php';
include '../general/function.php';
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
$sql= "SELECT * FROM `admin`";
$data = mysqli_query ($conn , $sql);

if(isset($_GET['del'])){
    $did = $_GET['del'];
    $del = "DELETE FROM `admin` where id = $did";
    $s1 = "SELECT * FROM `admin` where id = $did";
    $s = mysqli_fetch_assoc(mysqli_query($conn , $s1));
    $s = $s['img'];
    unlink("upload/$s");
    mysqli_query($conn , $del);
}
?>
  <main id="main" class="main">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      
      <th scope="col" colspan='2'>action</th>
    </tr>
  </thead>
  <?php
  foreach ($data as $d):
    ?>
   
  <tbody>
    <tr>
      <th scope="row"><?=$d['id']?></th>
      <td><?=$d['name']?></td>
      <td><?=$d['email']?></td>
      <td><a href="?del=<?=$d['id']?>" class="btn btn-danger">Delete</a></td>
      <td><a href="edit.php?up=<?=$d['id']?>" class="btn btn-info"> Update</a></td>
    </tr>
    
  </tbody>



    <?php
  endforeach;
  ?>
  </table>
  </main>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>