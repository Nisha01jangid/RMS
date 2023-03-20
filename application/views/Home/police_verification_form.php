<?php 
  // echo "<pre>";
  // print_r($details_for_police_verification);
  // print_r($family_member_details);
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

    <style>
        main{
            display:flex;
            width:100%;
            height:100%;

        }

      .bd-placeholder-img {
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
      }
    
    .homediv{
        width:75%;
        height:100%;
        margin:3%;  

    }

    label{
        font-style:italic; 
        font-weight:bold; 
        font-size:20px;
    }

    .details{
      font-style: italic;
      font-weight:bold; 
      font-size: 13px;
    }

    </style>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  </head>
<body>
  <main> 

<div class="homediv" style="margin:auto;">
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row">
<center><img src="https://static.abplive.com/wp-content/uploads/sites/2/2020/06/09032227/mp-police.jpg?impolicy=abp_cdn&amp;imwidth=640"  style="width: 80px; height: 80px;"></center>

<strong><center>TENANT/ SERVANT/ WORKER POLICE VERIFICATION FORM </center></strong>
<strong><center><h6>Dist- Singrauli (MP) </h6></center></strong><br> 
<div style="border:1px solid black; font-size:13px; margin-bottom:6px;">
Name of Landlord……………………………………………………Father Name………………………………………………………………….
Full address………………………………………………………………………………………………………………….
Mobile No……………………………………… Police station…………………………………………………………………………<br>
  </div>


<div style="font-size:13px;">

  <br>Name of Tanent/Servant/Labour : <span class="details"><?php echo $details_for_police_verification[0]['tenant_name']; ?></span>&nbsp;&nbsp;&nbsp;Age <span class="details"><?php echo $details_for_police_verification[0]['age']; ?></span>&nbsp;&nbsp;  <span class="details"></span> &nbsp;&nbsp;Gender : <span class="details"><?php echo $details_for_police_verification[0]['gender']; ?></span>

<br>Fathers Name : <span class="details"><?php echo $details_for_police_verification[0]['father_name']; ?></span>

<br>Mobile No : <span class="details"><?php echo $details_for_police_verification[0]['contact']; ?></span>	&nbsp;&nbsp;Email ID : <span class="details"><?php echo $details_for_police_verification[0]['email']; ?></span>

<br>Complete Permanent Address : <span class="details"><?php echo $details_for_police_verification[0]['address']; ?></span>

<br>District : <span class="details"><?php echo $details_for_police_verification[0]['district']; ?></span>	&nbsp;&nbsp;State : <span class="details"><?php echo $details_for_police_verification[0]['state']; ?></span>&nbsp;&nbsp;Police Station : <span class="details"><?php echo $details_for_police_verification[0]['polic_station']; ?></span>
  </div>
  <br>
Detail of Family Members

<table class="table table-bordered" style="text-align:center; font-size:13px;">
<thead class="thead-dark">
    <th>S.No.</th>
    <th>Name</th>
    <th>Father Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Relation</th>
    <th>Mobile No.</th>
    <th>Aadhaar</th>
</thead>
<tbody>
  <?php  
    $i=1;
    foreach ($family_member_details as $key => $value) { ?>

    <tr style="text-align:center;">
    <td><?php echo $i ?></td>
    <td><?php echo $value['name'] ?></td>
    <td></td>
    <td><?php echo $value['age'] ?></td>
    <td><?php echo $value['gender'] ?></td>
    <td><?php echo $value['relation'] ?></td>
    <td><?php echo $value['mobile_no'] ?></td>
    <td><?php echo $value['aadhar'] ?></td>
    </tr>

    <?php $i++; } ?>
</tbody>
</table>
<div style="font-size:13px;">
<br>
Total Number of family member : <span class="details"><?php echo $details_for_police_verification[0]['members']; ?></span>&nbsp;&nbsp;Male : <span class="details"><?php echo $details_for_police_verification[0]['no_of_male']; ?></span>&nbsp;&nbsp; Female : <span class="details"><?php echo $details_for_police_verification[0]['no_of_female']; ?></span>&nbsp;&nbsp; Children Below 5 Year : <span class="details"><?php echo $details_for_police_verification[0]['no_of_children_below_5']; ?></span>&nbsp;&nbsp; 

<br>Vehicle detail:      Two Wheeler : <span class="details"><?php echo $details_for_police_verification[0]['two_wheeler']; ?></span>&nbsp;&nbsp;	Four wheeler : <span class="details"><?php echo $details_for_police_verification[0]['four_wheeler']; ?></span>

<br> Occupation of the Tenant : <span class="details"><?php echo $details_for_police_verification[0]['tenant_occupation']; ?></span>		

<br>Office/College/School Address : <span class="details"><?php echo $details_for_police_verification[0]['tenant_occupation_address']; ?></span>

<br>Office contact Number : <span class="details"><?php echo $details_for_police_verification[0]['occupation_contact']; ?></span>
<br>Local Identifier/ Granter Name With Full Address   

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(1) Name : <span class="details"><?php echo $details_for_police_verification[0]['granter1_name']; ?></span>

						<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Address : <span class="details"><?php echo $details_for_police_verification[0]['granter1_address']; ?></span>

						<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;District : <span class="details"><?php echo $details_for_police_verification[0]['granter1_district']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;State : <span class="details"><?php echo $details_for_police_verification[0]['granter1_state']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Police Station : <span class="details"><?php echo $details_for_police_verification[0]['granter1_police_station']; ?></span>

						<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Mobile No : <span class="details"><?php echo $details_for_police_verification[0]['granter1_contact']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Email ID : <span class="details"><?php echo $details_for_police_verification[0]['granter1_email']; ?></span>

						<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(2) Name : <span class="details"><?php echo $details_for_police_verification[0]['granter2_name']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Address : <span class="details"><?php echo $details_for_police_verification[0]['granter2_address']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;District : <span class="details"><?php echo $details_for_police_verification[0]['granter2_district']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;State : <span class="details"><?php echo $details_for_police_verification[0]['granter2_state']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Police Station : <span class="details"><?php echo $details_for_police_verification[0]['granter2_police_station']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Mobile No : <span class="details"><?php echo $details_for_police_verification[0]['granter2_contact']; ?></span>

            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Email ID : <span class="details"><?php echo $details_for_police_verification[0]['granter2_email']; ?></span>

                        <br><br><br><br>Signature of Landlord/Owner				
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Signature of Tanent/Servant/Labour <br><br><br>
  </div>	

<div style="border:1px solid black; font-size:13px;">
<strong><center>Declaration</center></strong>
I <span class="details"><?php echo $details_for_police_verification[0]['tenant_name']; ?></span> hereby state that all the information mentioned above is true to the best of my knowledge and I shall be held responsible for any discrepancy found later.
<br>
<div style="float:right; font-size:12px;">
<br><br>Signature of Tanent/Servant/Labour
</div>
</div>



</div>

</div></div></div></div></div>
</div>
</main>
</body>
</html>