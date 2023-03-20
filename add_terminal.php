<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_drivers.php?id='.$_SESSION['USER_ID']);
	die();
}
$terminals='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from terminals where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$terminals=$row['terminals'];
}
if(isset($_POST['terminals'])){
	$terminals=mysqli_real_escape_string($con,$_POST['terminals']);
	if($id>0){
		$sql="update terminals set terminals='$terminals' where id='$id'";
	}else{
		$sql="insert into terminals(terminals) values('$terminals')";
	}
	mysqli_query($con,$sql);
	header('location:index.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>terminals</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
								<label for="terminals" class=" form-control-label">terminals Name</label>
								<input type="text" value="<?php echo $terminals?>" name="terminals" placeholder="Enter your terminals name" class="form-control" required></div>
							   <button  type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>