<?php
// echo "<pre>";
// print_r($property_name);
// die();  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
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
/*            font-family: Comic Sans MS;*/
               font-family: Times New Roman;
        }

        table {
          background-color: #fcfbf8;
    /*  font-family: Comic Sans MS;*/
            font-family: Times New Roman;
          border-collapse: collapse;
          width: 100%;
        }

        th {
          
          color: black;
          font-size: 14px;
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
/*            font-family: Comic Sans MS;*/
            font-family: Times New Roman;
        }
        
    </style>
</head>
<body>
   
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h2><center><?php echo $property_name[0]['property_name'];?></center></h2>
                <h4 style="text-align:center;text-decoration:underline; color:red;">COMBINED TR REPORT</h4>

                        <div class="intro">
                            <h5 style="font-style:italic;"><center><span><b>From:</b><span style="font-weight:normal; font-style:italic;"><?php echo $from_date;?> </span></span> 

                                <span> &#x00A0; &#x00A0; &#x00A0;&#x00A0;&#x00A0;<b>To:</b> <span style="font-weight:normal; font-style:italic;"><?php echo $to_date;?> </span></span></center>

                            </h5>
                        </div>

                        <br>
                         <!-- <h6 style="text-align:center;"><b>Printed On: </b><span id='date-time' style="font-style: italic;"></span></h6> -->
                         <h6 style=""><b>Printed On: </b><span id='date-time' style="font-style: italic;"></span></h6>

                    <?php foreach ($flats as $flat) { ?>
                        <br>
                        <div class="intro">
                            <h6 style="text-align:center;color:blue;font-weight: bold;">Flat No. <?php echo $flat['flat_no']." (".$flat['flat_name'].")"; ?></h6>
                            <br>
                            <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" style="text-align:center;">S.No.</th>
                                        <th scope="col" style="text-align:center;">Month</th>
                                        <th scope="col" style="text-align:center;">Amount Received (Date)</th>
                                        <th scope="col" style="text-align:center;">Mode of Payment</th>
                                        <th scope="col" style="text-align:center;">Reference ID</th>
                                        <th scope="col" style="text-align:center;">Receiver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($flat_details[$flat['flat_no']] as $payment) { ?>
                                        <?php $rowspan = sizeof($payment['payments']); ?>
                                        <?php foreach ($payment['payments'] as $index => $payment_info) { ?>
                                            <?php if ($index === 0) { ?>
                                                <tr>
                                                    <td rowspan="<?php echo $rowspan; ?>" style="text-align: center; vertical-align: middle;"><?php echo $i; ?></td>
                                                    <td rowspan="<?php echo $rowspan; ?>" style="text-align: center; vertical-align: middle;"><?php echo $payment['month']; ?></td>
                                                    <td style="text-align: center;"><?php echo "Rs" . " " . $payment_info['amount'] . " (" . $payment_info['payment_date'] . ")"; ?></td>
                                                    <td style="text-align: center;"><?php echo $payment_info['pay_mode']; ?></td>
                                                    <td style="text-align: center;"><?php echo $payment_info['reference_id']; ?></td>
                                                    <td style="text-align: center;"><?php echo $payment_info['payment_receiver']; ?></td>
                                                </tr>
                                            <?php } else { ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo "Rs" . " " . $payment_info['amount'] . " (" . $payment_info['payment_date'] . ")"; ?></td>
                                                    <td style="text-align: center;"><?php echo $payment_info['pay_mode']; ?></td>
                                                    <td style="text-align: center;"><?php echo $payment_info['reference_id']; ?></td>
                                                    <td style="text-align: center;"><?php echo $payment_info['payment_receiver']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php $i++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    
</body>


</html>

<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>


