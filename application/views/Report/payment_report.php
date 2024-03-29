<?php
// echo "<pre>";
// print_r($from_date);
// echo "<br>";
// print_r($to_date);	
// die();
?><!DOCTYPE html>
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


   
</head>

<body>
	<div class="box">
	<div class="container-fluid">
	<div class="main">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
				<div class="intro">
					 <h2><center><?php echo $payments[0]['property_name'];?></center></h2>
							 <h4><center>Receiver Payments Report</center></h4>
							</div>
					
						<div class="intro">
							 <h4 style="font-style:italic;"><center>Receiver Name: <span style="font-weight:normal; font-style:italic;"><?php echo $payments[0]['payment_receiver'];?></span></center></h4>
							</div>
						<div class="intro">
							<h5 style="font-style:italic;"><center><span>From: <span style="font-weight:normal; font-style:italic;"><?php echo $from_date;?> </span></span> 

								<span> &#x00A0; &#x00A0; &#x00A0;&#x00A0;&#x00A0;To: <span style="font-weight:normal; font-style:italic;"><?php echo $to_date;?> </span></span></center>

							</h5>
						</div>
						
						
						<br>
						 <h6><b>Printed On: </b><span id='date-time' style="font-style: italic;"></span></h6>
					 <!-- <div id="report">  -->
						 <!-- <div class="on-print">  -->
						<div class="row">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<!-- <tr>
										<th style="text-align: center;" colspan="3">Receiver Name</th>
										<td style="text-align: center;"><?php //echo $payments[0]['payment_receiver'];?></td>
                                    </tr> -->
									<tr>
										<th style="text-align: center;">S.No.</th>
										<th style="text-align: center;">Flat Name</th>
										<th style="text-align: center;">Received From</th>
										<th style="text-align: center;">Payment Date</th>
										<th style="text-align: center;">Reference Id / Payment Mode</th>
										<th style="text-align: center;">Amount </th>
									</tr>
								</thead>
								<tbody>
									<?php 
										 $i = 1;
										  foreach ($payments as $row) { ?>
										<tr>
										<td style="text-align: center;"><?php echo $i; ?></td>
										<td style="text-align: center;"><?php echo $row['flat_no']." ( ". $row['flat_name']." )"; ?></td>
										<td><?php echo $row['tenant_name']." ( ". $row['contact']." )"; ?></td>
										<td style="text-align: center;"><?php echo date('d-M-Y',strtotime($row['payment_date'])); ?></td>											

										<?php if(!empty($row['reference_id'])){ ?>
											<td style="text-align: center;"><?php echo $row['reference_id']; ?></td>
										<?php } else {?>
											<td style="text-align: center;"> Offline Payment </td>
											<?php }?>
										
										<td style="text-align: center;"><?php echo $row['amount'] ?></td>
									 <?php $i++; }?>
									<tr>
									<td style="text-align: center; color:blue; font-weight:bold; font-size:20px;" colspan="5">Total </td>
									<td style="text-align: center; font-weight:bold;"><?php echo $total[0]['total']; ?></td>
									</tr>
									<tr>
									<td style="text-align: center; color:blue; font-weight:bold; font-size:20px;" colspan="5">Receiver Expenditure </td>
									<td style="text-align: center; font-weight:bold;"><?php echo $receiver_expenditure[0]['amount']; ?></td>
									</tr>	
									<tr>
									<td style="text-align: center; color:red; font-weight:bold; font-size:20px;" colspan="5">Grand Total (Amount Received - Expenditure)</td>
									<td style="text-align: center; font-weight:bold;"><?php echo $total[0]['total'] - $receiver_expenditure[0]['amount']; ?></td>
									</tr>	
								</tbody>
							</table>
						</div>
					
				</div>
			</div>
		</div>
	</div>
	</div>
  </div>
</div>
</body>
</html>

<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>


