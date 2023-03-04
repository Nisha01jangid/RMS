<?php 
// echo "<pre>";
// print($payment_details);
// die();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
	<title></title>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

<!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
	.card{
		margin-left: 15px;
		margin-right: 15px;
	}
</style>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
</head>
<body>
	<main>


<div class="homediv">
  <div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

						<b>List of Payments</b><br><br>

						<span class="float:right">
							<a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="<?php echo base_url("Payments/new_entry") ?>">
							<i class="fa fa-plus"></i> New Entry </a>

							<!-- <a href="<?php echo base_url("Bill/addWaterBill/").$h['house_no']."/".$h['month']; ?>" class="btn btn-warning">Edit Amount</a> -->


						</span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th class="">Date</th>
									<th class="">Tenant</th>
									<th class="">Invoice</th>
									<th class="">Amount</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								
									<?php $i=1; foreach ($payment_details as $row) { ?>
										

										<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<?php echo date('M d, Y',strtotime($row['date_created'])) ?>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['invoice']) ?></b></p>
									</td>
									<td class="text-right">
										 <p> <b><?php echo number_format($row['amount'],2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary edit_invoice" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_invoice" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php	} ?>
								
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>


	</main>

	<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_invoice').click(function(){
		uni_modal("New invoice","manage_payment.php","mid-large")
		
	})
	$('.edit_invoice').click(function(){
		uni_modal("Manage invoice Details","manage_payment.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_invoice').click(function(){
		_conf("Are you sure to delete this invoice?","delete_invoice",[$(this).attr('data-id')])
	})
	
	function delete_invoice($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_payment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
</body>
</html>
