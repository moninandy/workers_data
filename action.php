<?php
include 'config.php';

if(isset($_POST['country_id'])){
    $country_id=$_POST['country_id'];
    $sql = mysqli_query($conn,"SELECT * FROM state  Where country_id='$country_id' ORDER BY state_name");
    ?>
    <select name="state"  class="form-control">
        <option value="" selected="selected"> Select state</option>
        <?php
        while($row = mysqli_fetch_array($sql)){
?>
<option value="<?php echo $row['id'];?>"><?php echo $row['state_name'];?></option>;

<?php
 }
?>
</select>
 <?php 
}

if(isset($_POST['s_country_id']) && isset($_POST['state_id'])){
    $s_country_id= $_POST['s_country_id'];
    $state_id= $_POST['state_id'];
    $sql1=mysqli_query($conn,"SELECT * from city where state_id='$state_id' and country_id= '$s_country_id' order by city_name");
?>
<select name="city" class="form-control">
    <option value="" selected="selected">select city </option>
<?php
while ($row1 = mysqli_fetch_array($sql1)) {
?>
<option value="<?php echo $row1['id'];?>"><?php echo $row1['city_name'];?></option>
<?php
}
?>
</select>
<?php
}
 
?>
    






