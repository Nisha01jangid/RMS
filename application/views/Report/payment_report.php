<?php 
	// echo "<pre>";
	// print_r($payments);
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

		.box{
		  padding: 20px 10px;
		  max-width: 100%;
		  margin: 0 auto;
		}

		.intro{
			font-family: Comic Sans MS;
		}

		/*.main {
		  background-color: lightgrey;
		  width: 100%;
		  border: 6px solid #FFFDD0;
		  padding: 50px;
		  margin: 20px;
		}*/
  
		table {
		  font-family: Arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		th {
		  background-color: #0077b6;
		  color: black;
		  font-size: 16px;
		  font-weight: bold;
		  text-align: center;
		  padding: 10px;
		  border: 1px solid #ddd;
		}

		td {
		  text-align: center;
		  padding: 10px;
		  border: 1px solid #ddd;
		}

		tr:nth-child(even) {
		  background-color: #f6f4eb;
		}

		tr:hover {
		  background-color: #ddd;
		}

		tbody td:first-child {
		  text-align: left;
		}

		tbody td:last-child {
		  font-weight: bold;
		  color: #0077b6;
		}

		body {
            background-color: #fcfbf8;
            color: black;
        }
        
  
		/*/*/
		/*table{
			width: 100%;
			border-collapse: collapse
		}*/
		/*tr,td,th{
			border:1px solid black;
		}
*/
		/* main{
            display:flex;
            width:100%;
            height:100%;
        }*/
     /* .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }*/
    
    /*.homediv{
        width:75%;
        height:100%;
        margin:3%;    
    }*/
	</style>

</head>

<body>
	<div class="box">
	<!-- <div class="container-fluid"> -->
		<div class="main">
	<div class="col-lg-12">
		<!-- <div class="card"> -->
			<div class="card-body">
				<div class="col-md-12">
				
				<div class="intro">
							 <h3><center>Month of Payment </center></h3>
							 
							</div>
	
					<br>
					<form id="filter-report" action="<?php echo base_url('Report/payment_report') ?>" method=post id=date>
						<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right" id="date">To: </label>
							<input type="date" name="date" class='from-control col-md-4'>
							</div>
							<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right" id="date">From: </label>
							<input type="date" name="date" class='from-control col-md-4'>
							</div><br>
							<div class="row form-group">
							<button class="btn btn-sm btn-block btn-primary col-md-2 ml-1 offset-md-2"> Filter</button>
							</div>
					</form>
							<div class="intro">
							 <h3><center>Rental Payments Report</center></h3>
							 <h5><center>for the Month of <b><?php echo date('F ,Y',strtotime($month_of_payment.'-1')) ?></b></center></h5>
							</div>
						
						<div class="row">
							<div class="col-md-12 mb-2">
							<button class="btn btn-sm btn-block btn-success col-md-2 ml-1 float-right" type="button" id="print"><i class="fa fa-print"></i> Print</button>
							</div>
						</div> 
						<br>
					 <!-- <div id="report">  -->
						 <!-- <div class="on-print">  -->
						<div class="row">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="text-align: center;">S.No</th>
										<th style="text-align: center;">Date</th>
										<th style="text-align: center;">Tenant</th>
										<th style="text-align: center;">Property </th>
										<th style="text-align: center;">Flat No </th>
										<th style="text-align: center;">Invoice</th>
										<th style="text-align:center;">Rent</th>
										<th style="text-align: center;">Amount Paid</th>
										<th style="text-align: center;"> Outstanding Amount</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									
									$tamount = 0;

									if(!empty($payments)){

										// while($row=$payments){
											// $tamount += $row['amount'];

										 $i = 1; foreach ($payments as $row) { ?>

										 <?php $tamount += $row['amount'];  ?>
										<tr>
										<td style="text-align: center;"><?php echo $i++ ?></td>
										<td><?php echo date('M d,Y',strtotime($row['date_created'])) ?></td>
										<td><?php echo ucwords($row['tenant_name']) ?></td>
										<td><?php echo $row['house_no'] ?></td>
										<td><?php echo $row['flat_no'] ?></td>
										<td><?php echo $row['invoice'] ?></td>
										<td><?php echo $row['rent'] ?></td>
										<td class="text-right"><?php echo number_format($row['amount'],2) ?></td>
										<td><?php echo $row['rent']-$row['amount']?></td>
										</tr>
									 <?php } 
										// }
										
									}else{ ?>
									<tr>
										<th colspan="6"><center>No Data.</center></th>
									</tr>
								<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="7">Total Amount</th>
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
	<!-- </div> -->
<!-- </div> -->


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


