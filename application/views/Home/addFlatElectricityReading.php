<?php 
// echo "<pre>";
// print_r($flat_entry);
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

    </style>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  </head>
<body>
  <main>  
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;height:100vh;">
    <h4><?php echo $_SESSION['user']; ?></h4>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo base_url('Home') ?>" class="nav-link text-white" aria-current="page">Home</a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('EntryForm') ?>" class="nav-link text-white" aria-current="page">Entry Form</a>
      </li>

      <li>
        <a href="<?php echo base_url('Payments') ?>" class="nav-link text-white">Payments</a>
      </li>
      <li>
        <a href="<?php echo base_url('Report/reportv') ?>" class="nav-link text-white">Report</a>
      </li>
    </ul>
    <hr>
  </div>

<div class="homediv">
<h2 style="color:red; font-style:italic; font-weight:bold; font-size:25px;"> Tenant Details</h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Full Name:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['tenant_name']; ?></span></label>
     </div>
     <div class="form-group col">
    <label for="exampleInputEmail1">Father's Name:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['father_name']; ?></span></label>
     </div>
</div>
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Date of Birth:&nbsp;  <span style="font-weight:normal;"><?php echo $flat_entry[0]['birth_date']; ?></span></label>
    </div>
    <div class="form-group col">
    <label for="exampleInputEmail1">Contact Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['contact']; ?></span></label>
    </div>
</div>
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Aadhaar Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['aadhaar_no']; ?></span></label>
    </div>
    <div class="form-group col">
    <label for="exampleInputPassword1">Joining Date:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['joining_date']; ?></span></label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['email']; ?></span></label>
    </div>
    <div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Family Members:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['members']; ?></span></label>
   
    </div>
    <div class="form-group col">
        <label for="exampleInputPassword1">Rent of Flat:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['rent']; ?></span></label>
      </div>
</div>

</div></div></div></div></div>

<br>


<h2 style=" color:red; font-style:italic; font-weight:bold; font-size:22px;"> Electricity Reading</h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">


<div style="display:flex; justify-content:center;">
                    <form action="<?php echo base_url("Home/getFlatElectricityReading"); ?>" method="get">
                    <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                    <input type="hidden" name="flat_no" value="<?php echo $flat_no; ?>">
                    <input
                        id="month"
                        type="month"
                        name="month"
                        min="2000-01"
                        max="<?php echo date("Y-m"); ?>"
                        value="<?php echo $month; ?>"
                        style="height:100%;margin-right:10px;"
                        required
                        />
                    <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                    </div>
                    <br>
                <form action="<?php echo base_url("Home/insertFlatElectricityReading"); ?>" method="post">
                <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                <input type="hidden" name="flat_no" value="<?php echo $flat_no; ?>">
                <input type="hidden" name="month" value="<?php echo $month; ?>">
                    <div class="row">
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Flat No.</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th scope="col" style="text-align:center;">Reading</th>
                            <th scope="col" style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row" style="text-align:center;">1</th>
                            <td style="text-align:center;"><?php echo "Flat No. ".$flat_no; ?></td>
                            <td style="text-align:center;"><?php echo $month_name; ?></td>
                            <td style="text-align:center;"><input type="text" name="reading" value="<?php echo $reading; ?>"></td>
                            <td style="text-align:center;"><input type="submit" value="Submit" class="btn btn-primary"></td>
                            </tr>   
                        </tbody>
                        </table>
                    </div>
                </form>
                    
                </div>

</div></div></div></div></div>
</div>
</main>
</body>
</html>