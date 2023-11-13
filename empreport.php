
<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="reports">
    <div class="icons">
  <a href="index.php" title=" Home"><i class="fa-solid fa-house "></i></a>
 <a href="logout.php" title="Logout"> <i class="fa-solid fa-right-from-bracket fa-1x"></i></a>
</div>
    <h2 id="h2">Employee Basic  Reports</h2>
<?php 
$query="SELECT * FROM tb_details";
$result=mysqli_query($conn,$query);

//echo $total;
?>
<div class="section3">

<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Designation</th>
      <th scope="col">Salary</th>
      <th scope="col">Gender</th>
      
    </tr>
  </thead>
  <tbody>
   
    <tr>
    <?php
    while($row = mysqli_fetch_assoc($result)){
    
    ?>
      <th scope="row"><?php echo $row['emp_id'];?></th>
      <td> <?php echo $row['name'];?> </td>
      <td> <?php echo $row['email'];?></td>
      <td> <?php echo $row['dob'];?></td>
      <td> <?php echo $row['designation'];?></td>
      <td> <?php echo $row['salary'];?></td>
      <td> <?php echo $row['gender'];?></td>
      
    </tr><?php
    }

    $sal=$row['salary'];
    ?>
    
  </tbody>
</table>
  </div>
  </div>
    
</body>
</html>