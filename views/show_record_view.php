<?php 
$PageTitle = "View Records"; 
include "templates/header.php" ?>

<div class="alert-display">
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
		if($emptyinfo){
    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Message: </strong> <?=$emptyinfo?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
		}
	?>
</div>

<?php
if ($records->num_rows > 0) {
?>
<table class="table table-striped table-dark table-condensed">
    <tr class="text-center">
        <th>Date</th>
        <th>Description</th>
        <th>Category</th>
        <th>Amount</th>
        <th>Action</th>
    </tr>

<?php 
    while($record = $records->fetch_assoc()){ 
?>

    <tr>
        <td class = "text-center"><?= $record['date']; ?></td>
        <td><?= $record['description']; ?></td>
        <td class="text-center"><?= $record['category_name']; ?></td>
        <td class="text-end"><?= number_format($record['amount'], 2, '.', ','); ?></td>
        <td class="text-center">
            <form method="post" style="display:inline">
                <input type="hidden" name="record_id" value="<?=$record['id']; ?>">
                <a class="btn btn-info btn-sm" href="/edit-record?id=<?php echo $record['id']; ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>&nbsp;
                <button class="btn btn-danger btn-sm" href="#" type="submit" value="record_delete" name="record_delete">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </td>
    </tr>

<?php 
    }
?>
    </table>
<?php 
}
?>


<?php include "templates/footer.php" ?>