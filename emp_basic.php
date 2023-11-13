<?php include 'config.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Basic Details</title>
    <link rel="stylesheet " href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >
    <script type="text/javascript">
        $(document).ready(function(){
            $(".country").on('change',function(){
var country_id=$(this).val();
$.ajax({
    url:"action.php",
    method:"POST",
    data:{country_id:country_id},
    success:function(data){
        $(".state").html(data);
       
    }
});
            });
        

        $(".state").on('change',function(){
var s_country_id=$(".country").val();
var state_id=$(this).val();

$.ajax({
    url:"action.php",
    method:"POST",
    data:{s_country_id:s_country_id,state_id:state_id},
    success:function(data){
        $(".city").html(data);
    }
});
            });
        });
        </script>



<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $designation=$_POST['designation'];
    $salary=$_POST['salary'];
    $dob=$_POST['dob'];
    $doj=$_POST['doj'];
    $streetno=$_POST['streetno'];
    $address=$_POST['address'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $check=$_POST['check'];
    $gender=$_POST['gender'];

    $res=mysqli_query($conn,"INSERT INTO tb_details values('','$name','$email','$dob','$doj','$designation','$salary','$streetno','$address','$country','$state','$city','$check','$gender')
    ");
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
    
    
    <div class="section2">
    <form class="row g-3" action="" method="POST">
  <div class="col-md-6">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="col-md-6">
    <label for="dob" class="form-label">DOB</label>
    <input type="date" class="form-control" id="dob" name="dob">
  </div>
  <div class="col-md-6">
    <label for="doj" class="form-label">DOJ</label>
    <input type="date" class="form-control" min="1997-12-31"max="2021-12-31" id="doj" name="doj">
  </div>
  <div class="col-md-6">
    <label for="designation" class="form-label">Designation</label>
    <input type="text" class="form-control" id="designation" name="designation">
  </div>
  <div class="col-md-6">
    <label for="salary" class="form-label">Salary</label>
    <input type="number" class="form-control" name="salary">
  </div>
  <div class="col-12">
    <label for="streetno" class="form-label">Street No</label>
    <input type="number" class="form-control" id="address" placeholder="37/A" name="streetno">
  </div>
  <div class="col-3">
    <label for="address" class="form-label">Address </label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-3">
    <label for="country" class="form-label"> Country</label>
    <select name="country" class="country form-select" > 
                <option value="" >select country</option>
                <?php 
                
                $sql=mysqli_query($conn,"SELECT * FROM  country ORDER BY  country_name");
                while($row=mysqli_fetch_array($sql)){
                ?>
            <option value="<?php echo $row['id'];?>">
            <?php echo $row['country_name'];?></option> 
             <?php 
                }
                ?>

            </select>
  </div>
  <div class="col-md-3">
  <label for="state" class="form-label">State</label>
    <select  name="state" class="state form-select">
    <option selected="selected">select state</option>
    </select>
  </div>
  <div class="col-md-3">
  <label for="city" class="form-label"> City</label>
    <select name="city" class="city form-select" > 
                <option selected="selected">select city</option>
    </select> 
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="check" name="check" require>
      <label class="form-check-label" for="Check">
        Agree Terms and condition
      </label>
    </div>
  </div>
  <div class="col-6">
    <label for="gender" class="form-label"> Gender</label>
 </div>
  <div class="col-3">
    <input type="radio" name="gender" value="Male" id="gender"> Male
 </div>
 <div class="col-3">
    <input type="radio" name="gender" value="Female"  id="gender"> Female
 </div>

  <div class="col-12">
    <button type="submit" name="submit" value ="submit"class="btn btn-primary ">submit</button>
  </div>
</form>

            </div>
            

</body>
</html>