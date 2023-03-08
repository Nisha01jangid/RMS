<?php 
	// echo "<pre>";
	// print_r($month_of_payment);
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
    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">


    <style>
	.on-print{
		display: none;
	}
</style>
<noscript>
	<style>
		.text-center{
			text-align:center;
		}
		.text-right{
			text-align:right;
		}
		table{
			width: 100%;
			border-collapse: collapse
		}
		tr,td,th{
			border:1px solid black;
		}
	</style>
</noscript>
</head>

<body>

	<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
				
						<!-- <div class="row">
							<div class="col-md-12 mb-2">
							<button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
							</div>
						</div> -->
					<div id="report">
						<div class="on-print">
							 <p><center>Rental Payments Report</center></p>
							 <p><center>for the Month of <b><?php echo date('F ,Y',strtotime($month_of_payment.'-1')) ?></b></center></p>
						</div>
						<div class="row">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Tenant</th>
										<th>House #</th>
										<th>Invoice</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									
									$tamount = 0;

									if(!empty($payments)){

										while($row=$payments){
											$tamount += $row['amount'];

										<?php $i = 1; foreach ($payments as $row) { ?>
										<tr>
										<td><?php echo $i++ ?></td>
										<td><?php echo date('M d,Y',strtotime($row['date_created'])) ?></td>
										<td><?php echo ucwords($row['name']) ?></td>
										<td><?php echo $row['house_no'] ?></td>
										<td><?php echo $row['invoice'] ?></td>
										<td class="text-right"><?php echo number_format($row['amount'],2) ?></td>
										</tr>
									 <?php } ?> 
										}
										
									}
									
									?>
									
								
								<?php else ?>
									<tr>
										<th colspan="6"><center>No Data.</center></th>
									</tr>
								<?php endif; ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total Amount</th>
										<th class='text-right'><?php echo number_format($tamount,2) ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('#print').click(function(){
		var _style = $('noscript').clone()
		var _content = $('#report').clone()
		var nw = window.open("","_blank","width=800,height=700");
		nw.document.write(_style.html())
		nw.document.write(_content.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
		nw.close()
		},500)
	})
	$('#filter-report').submit(function(e){
		e.preventDefault()
		location.href = 'index.php?page=payment_report&'+$(this).serialize()
	})
</script>
</body>
</html>


