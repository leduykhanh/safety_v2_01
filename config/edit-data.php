<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$description = $_POST['description'];
	
	if($crud->update($id,$description))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>
<div class="container">
<a href="add-data-risk.php?hazard_id=<?php echo $_GET['edit_id']; ?>" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Risk Controls</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>ID</td>
            <td><?php echo $id; ?></td>
        </tr>
 
        <tr>
            <td>description</td>
            <td><input type='text' name='description' class='form-control' value="<?php echo $description; ?>" required></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
 
    </table>

</form>
    <div class="row"><h2>List of risk controls</h2></div>
    <table class='table table-bordered'>
    	<tr>
            <th>#</th>
     		<th>description</th>
            <th colspan="2" align="center">Actions</th>
        </tr>
	 	<?php
			$query = "SELECT * FROM risk_control where hazard_id=" . $_GET['edit_id'];       
			$records_per_page=10;
			$newquery = $crud->paging($query,$records_per_page);
			$crud->dataview_risk($newquery);
		 ?>
    </table>
</div>

<?php include_once 'footer.php'; ?>