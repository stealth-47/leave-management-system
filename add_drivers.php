<?php
require('top.inc.php');
$name='';
$email='';
$mobile='';
$terminals_id='';
$address='';
$date_of_birth='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if($_SESSION['ROLE']==2 && $_SESSION['USER_ID']!=$id){
		die('Access denied');
	}
	$res=mysqli_query($con,"select * from drivers where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$name=$row['name'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	$terminals_id=$row['id'];
	$address=$row['address'];
	$date_of_birth=$row['date_of_birth'];
}
if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$terminals_id=mysqli_real_escape_string($con,$_POST['terminals_id']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$date_of_birth=mysqli_real_escape_string($con,$_POST['date_of_birth']);
	if($id>0){
		$sql="update drivers set name='$name',email='$email',mobile='$mobile',password='$password',id='$terminals_id',address='$address',date_of_birth='$date_of_birth' where id='$id'";
	}else{
		$sql="insert into drivers(name,email,mobile,password,terminals_id,address,date_of_birth,role) values('$name','$email','$mobile','$password','$terminals_id','$address','$date_of_birth','2')";
	}
	mysqli_query($con,$sql);
	header('location:drivers.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>MY DETAILS</strong></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
									<label class=" form-control-label">Name</label>
									<input type="text" value="<?php echo $name?>" name="name" placeholder="Enter drivers name" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Email</label>
									<input type="email" value="<?php echo $email?>" name="email" placeholder="Enter drivers email" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Mobile</label>
									<input type="text" value="<?php echo $mobile?>" name="mobile" placeholder="Enter drivers mobile" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Password</label>
									<input type="password"  name="password" placeholder="Enter drivers password" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Terminals</label>
									<select name="terminals_id" required class="form-control">
										<option value="">Select terminals</option>
										<?php
										$res=mysqli_query($con,"select * from terminals order by terminals desc");
										while($row=mysqli_fetch_assoc($res)){
											if($terminalss_id==$row['id']){
												echo "<option selected='selected' value=".$row['id'].">".$row['terminals']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['terminals']."</option>";
											}
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Address</label>
									<input type="text" value="<?php echo $address?>" name="address" placeholder="Enter drivers address" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">date_of_birth</label>
									<input type="date" value="<?php echo $date_of_birth?>" name="date_of_birth" placeholder="Enter drivers date_of_birth" class="form-control" required>
								</div>
								<button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							</button>
						<?php if($_SESSION['ROLE']==1){?>
							   <?php } 
							   ?>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php require('footer.inc.php'); 
?>