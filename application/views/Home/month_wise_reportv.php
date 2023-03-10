<?php
// echo "<pre>";
// print_r($tenant_entry_form_details);
// die();

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

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

        table {
          font-family: Comic Sans MS;
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
            background-color: #fcfbf8;
            color: black;
        }
        
    </style>
</head>
<body>
    <div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">

                    <br>
                    <div class="intro">
                        <h2 style="text-align:center;">Tenant Wise Details </h2>
                        <br>
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th scope="col" style="text-align:center;">Rent</th>
                            <th scope="col" style="text-align:center;">Meter Reading <br> (Current - Previous) * rate</th>
                            <th scope="col" style="text-align:center;">Water Pump Charges <br>no. of members * rate</th>
                            <th scope="col" style="text-align:center;">Waste </th>
                            <th scope="col" style="text-align:center;">Miscellaneous</th>
                            <th scope="col" style="text-align:center;">Total</th>
    
                            <th scope="col" style="text-align:center;">Payment</th>
                            <th scope="col" style="text-align:center;">Outstanding Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;
                                foreach ($tenant_entry_form_details as $key => $value) { ?>
                                    
                            <tr>
                            <td scope="row" style="text-align:center;"><?php echo $i ?></td>
                            <td style="text-align:center;"><?php echo $value['month'] ?></td>
                            <td style="text-align:center;"><?php echo $value['rent'] ?></td>
                            <td style="text-align:center;"><?php echo "( 100 - 94 ) * 100 = Rs 600" ; ?></td>
                            <td><?php echo $value['no_of_members']."*".$value['water_rate']."=".$value['no_of_members']*$value['water_rate'] ?></td> 
                            
                            <td><?php echo $value['waste'] ?></td>
                            <td><?php echo $value['miscellaneous'] ?></td>
                            <td><?php echo $value['rent']+( $value['no_of_members']*$value['water_rate'])+ $value['waste']+$value['miscellaneous']; ?></td>
                            <td> </td>
                            <td> </td>
                            </tr>   

                            <?php   $i++; } ?>

                            
                        </tbody>
                        </table>
                    </div>

                    
                </div>

</div></div></div></div></div>


</body>
</html>


