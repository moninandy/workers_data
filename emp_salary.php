<?php include 'config.php'; ?>
<?php

?>
<?php 
if(isset($_POST['submit'])){
    $emp_id=$_POST['emp_id'];
    $salary = $_POST['salary'];
$dallowance = 0.4 * $salary;
$house_rent = 0.2 * $salary;
//To Compute the gross Salary
$gross_salary = $salary + $dallowance + $house_rent;
echo "Basic Salary : ".$salary."/-";
echo "Dearness Allowance: " .$dallowance."/-";
echo "House Rent : " .$house_rent ."/-";
echo "Gross Salary : " .$gross_salary ."/-";
    $res=mysqli_query($conn,"INSERT INTO emp_salary values('','$emp_id','$salary','','','','','','')");
    
    if($res){
        
        echo
        "<script> alert('Data saved Sucessfully!');
        window.location='emp_basic.php';
        </script>";
        
    }
    else{
        echo"<script> alert('failed')</script>";
    }
}

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emp salary</title>
    <link rel="stylesheet " href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <div>
    <form class="row g-3" action="" method="POST">
  <div class="col-md-6">
    <label for="emp_id" class="form-label">Emp_id</label>
    <input type="number" class="form-control" id="emp_id" name="emp_id" value="<?php echo $row['emp_id'];?>">
  </div>
  
  <div class="col-md-6">
    <label for="salary" class="form-label">salary</label>
    <input type="number" class="form-control" id="salary" value="<?php echo $sal;?>" name="salary">
  </div>
  <!--div class="col-md-6">
    <label for="hra" class="form-label">Hra</label>
    <input type="number" class="form-control" id="hra" value="<?php echo $hra;?>" name="hra">
  </div>
  <div class="col-md-6">
    <label for="da" class="form-label">Da</label>
    <input type="number" class="form-control" id="da"  value="<?php echo $da;?>"name="da">
  </div>
  <div class="col-md-6">
    <label for="ta" class="form-label">ta</label>
    <input type="number" class="form-control" id="ta"  value="<?php echo $ta;?>"name="ta">
  </div>
  <div class="col-md-6">
    <label for="ma" class="form-label">Ma</label>
    <input type="number" class="form-control" id="ma" value="<?php echo $ma;?>" name="ma">
  </div>
  <div class="col-md-6">
    <label for="pf" class="form-label">pf</label>
    <input type="number" class="form-control" id="pf"  value="<?php echo $pf;?>"name="pf">
  </div>
  <div class="col-md-6">
    <label for="Net" class="form-label">Netsalary</label>
    <input type="number" class="form-control" id="net"  value="<?php echo $net;?>"name="net">
  </div>
  <div class="col-md-6"-->
    
    <input type="submit" value="submit" class="form-control" name="submit">
  </div>
</form>
    
</body>
</html>