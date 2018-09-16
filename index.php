<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD App</title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="Hover-master/css/hover.css">
</head>
<body>
	<div class="container">
		<a href="#" class="btn btn-primary btn-lg hvr-pulse" data-toggle = "modal" id="btn" data-target = "#add" >
			<i class="glyphicon glyphicon-plus"></i>
			Add New Record
		</a>
		<table class="table table-striped"></table>
	</div>

		<!-- Add Modal -->

		<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		  	<form class="form" id="form" method="POST" action="add_record.php">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Add New Record</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="status" ></div>
						</div>
			        	<div class="form-group">
			        		<input type="text" class="form-control" name="fname" placeholder="First Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="text" name="lname" class="form-control" placeholder="Last Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="email" class="form-control" name="email" placeholder="Eamil">
			        	</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new Record</button>
					</div>
				</div>
			</form>
		  </div>
		</div>

		<!-- Update Modal -->

		<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		  	<form class="form" id="update-form" method="POST" action="update_record.php">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Record</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id" class="id">
						<div class="form-group">
							<div class="status" ></div>
						</div>
			        	<div class="form-group">
			        		<input type="text" class="form-control fname" name="fname" placeholder="First Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="text" name="lname" class="form-control lname" placeholder="Last Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="email"  class="form-control email" name="email" placeholder="Eamil">
			        	</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" name="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Update Record</button>
					</div>
				</div>
			</form>
		  </div>
		</div>

		<!-- Delete Modal -->

		<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		  	<form class="form" id="delete-form" method="POST" action="delete_record.php">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Do You Really Want to Delete This Record?</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id" class="id">
						<div class="form-group">
							<div class="status" ></div>
						</div>
			        	<div class="form-group">
			        		<input type="text" class="form-control fname" name="fname" placeholder="First Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="text" name="lname" class="form-control lname" placeholder="Last Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="email" class="form-control email" name="email" placeholder="Eamil">
			        	</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" name="submit" class="btn btn-danger">Delete Record</button>
					</div>
				</div>
			</form>
		  </div>
		</div>

	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/script.js"></script>

</body>
</html>