<?php  
    // echo "<pre>";
    // print_r($outstanding_report_details);
    // die();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>RMS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
            font-family: Times New Roman;
        }

        table {
          background-color: #fcfbf8;
          font-family: Times New Roman;
          border-collapse: collapse;
          width: 100%;
        }

        th {
          
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
/*            background-color: #fcfbf8;*/
            color: black;
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
                  <div class="row" style="overflow-x: hidden; overflow-y: auto;">
                    <div style="font-family:Times New Roman;"><h2 style="text-align:center;"><b>Oustanding Amount Report (<?php echo $property_name[0]['property_name']; ?>)</b></h2>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Flat No</th>
                            <th scope="col" style="text-align:center;">Tenant Name</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th scope="col" style="text-align:center;">Total Amount</th>
                            <th scope="col" style="text-align:center;">Paid Amount</th>
                            <th scope="col" style="text-align:center;">Outstanding Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;
                                foreach ($outstanding_report_details as $key => $value) { ?>
                            <tr>
                              <td style="text-align: center;"><?php echo $i ?></td>
                              <td style="text-align: center;"><?php echo $value['flat_no'] ." (".$value['flat_name'].")" ?></td>
                              <td style="text-align: center;"><?php echo $value['tenant_name']." (".$value['contact'].")"?></td>
                              <td style="text-align: center;"><?php echo$value['month'] ?></td>
                               <td style="text-align: center;"><?php echo $value['total'] ?></td>
                              <?php if(!empty($value['amount_received'])){ ?>
                              <td style="text-align: center;"><?php echo $value['amount_received'] ?><br><span style="color:blue";><?php echo "(".$value['payment_date'].")"?></span></td>
                              <?php } else{ ?>
                              <td style="text-align: center;"><?php echo $value['amount_received'] ?></td>
                              <?php } ?>
                              <td style="text-align: center;"><?php echo $value['outstanding_amount'] ?></td>
                           </tr> 

                            <?php $i++; } ?>

                        </tbody>
                        </table>
                    
                </div>
            </div>      		
            </div>	
        </div>
    </div>
</div>
  </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="<?php echo base_url('js/sidebars.js') ?>"></script>
  </body>
</html>
 