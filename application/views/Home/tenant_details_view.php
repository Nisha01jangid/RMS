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
    <title>Rent Management System</title>

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
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height:100vh;" >
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="margin: 0% 5%;">
        <strong><?php echo $_SESSION['user']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo base_url('Home') ?>" class="nav-link text-white" aria-current="page">Home</a>
      </li>
      <!-- <li>
        <a href="#" class="nav-link text-white">Electricity Bill</a>
      </li>
      <li>
        <a href="<?php echo base_url('Bill/WaterBill') ?>" class="nav-link text-white">Water & Other Bills</a>
      </li> -->
      <li>
        <a href="#" class="nav-link text-white">Report</a>
      </li>
    </ul>
    <hr>
  </div>

<div class="homediv">
<h2 style="color:red; font-style:italic; font-weight:bold;"> Tenant Details</h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<form action="<?php echo base_url('Home/insert_tenant_details');?>" method="post">
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Full Name:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['tenant_name']; ?></span></label>
     </div>
     <div class="form-group col">
    <label for="exampleInputEmail1">Father's Name:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['father_name']; ?></span></label>
     </div>
</div>
<br>

<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Date of Birth:&nbsp;  <span style="font-weight:normal;"><?php echo $flat_entry[0]['birth_date']; ?></span></label>
    </div>
    <div class="form-group col">
    <label for="exampleInputEmail1">Contact Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['contact']; ?></span></label>
    </div>
</div>
<br>

<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Aadhaar Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['aadhaar_no']; ?></span></label>
    </div>
    <div class="form-group col">
    <label for="exampleInputPassword1">Joining Date:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['joining_date']; ?></span></label>
    </div>
</div>
<br>
    
<div class="form-group">
    <label for="exampleInputEmail1">Email address:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['email']; ?></span></label>
    </div>
     <br>
    <div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Family Members:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['members']; ?></span></label>
   
</div>
<div class="form-group col">
    <label for="exampleInputPassword1">Rent of Flat:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['rent']; ?></span></label>
   </div>
</div>
  <br>
</form>
</div></div></div></div></div></div>
</main>
</body>
</html>