<?php 
$PageTitle = "Create Record"; 
include "templates/header.php" ?>

	<div class="alert-display">
		<?php
			if($errors){
				foreach($errors as $error){ 
		?>
					<div class="alert alert-danger alert-dismissible fade show" role= "alert">
						<strong>Error: </strong> <?=$error?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
		<?php
				}
			}
		?>

		<?php
			if($success){
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success: </strong> <?=$success?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php
			}
			
		?>
	</div>

	<div class = "container">
		<div class="card bg-dark text-white border-0" style="margin:auto;">
			<div class="card-body">
			<form action="" method="post" autocomplete="off">
				<div class="form-group">
					<label class="form-label" >Amount:</label> <br>
					<input class="form-control" type="text" name="record_amount"> <br>
				</div>
				
				<div class="form-group">
					<label class="form-label" >Description:</label> <br>
					<textarea class="form-control" type="text" name="record_description" placeholder="Enter Description"></textarea> <br>
				</div>
				
				<div class="form-group row">
					<div class="form-group w-50">
						<label class="form-label" for="record_category">Type:</label> <br>
						<select class="form-select" aria-label="Type" name="record_category" id="record_category">
						<?php
						if ($categories->num_rows > 0) {
							while($category = $categories->fetch_assoc()){ 
						?>	
								<option value="<?=$category['id']?>"><?=$category['name']?></option>
						<?php
							}
						}
						?>
						</select> <br>
					</div>

					<div class="form-group w-50">
						<label class="form-label" for="record_date">Date:</label> <br>
						<input class="form-control" type="date" name="record_date" id="record_date"> <br>
					</div>
				</div>
			
				<div class="d-grid col-12" style="margin-top: 30px">
					<button class="btn btn-success" type="Submit">Submit</button>
				</div>
			</form>
			</div>
		</div>	
	</div>
   
<?php include "templates/footer.php" ?>
