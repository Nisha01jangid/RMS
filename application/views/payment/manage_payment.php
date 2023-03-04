<?php 
// echo "<pre>";
// print_r($tenants);
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

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
</head>

<style>
    
    .card{
        margin-top: 27px;
        margin-left: 15px;
        margin-right: 15px;
    }

    .option-data {
  display: none;
}
</style>

<body>

<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

    <form action="<?php echo base_url("Payments/add_new_entry"); ?>" method="post" id="manage-payment">
        <h3><label >New Invoice</label></h3>
        <br>
        
        <!-- <div class= "form-group">
            <label id="Tenant" class="control-label">Tenant</label>

            <select name="tenant_id" id="tenant_id" class="custom-select select2">
                <option value=""></option>
                <?php foreach ($tenants as $key => $value) { ?>

                <option id="tenant-option" value="<?php echo $value['id'] ?>"><?php echo ucwords($value['name']) ?></option>

                <?php } ?>
        
            </select>
                     
        </div> -->


        <div class="form-group">
            <label id="Tenant" for="" class="control-label">Tenant</label>
            <select name="tenant_id" id="tenant_id" class="custom-select select2">
                <option value=""></option>

            <?php foreach ($tenants as $tenant) { ?>

            <option id="tenant-option" value="<?php echo $tenant['id'] ?>" <?php echo isset($tenant_id) && $tenant_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($tenant['name']) ?></option>
            <?php  } ?>
            </select>
        </div>
        <br>
        
        <div class= "form-group">
            <label id="invoice">Invoice</label>
            <input type="text" name="invoice" class="form-control">   
        </div>
        <br>
        <div class= "form-group">
            <label id="amount">Amount Paid</label>
            <input type="text" name="amount" class="form-control">   
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
</div>
</div>
</div>
</div>
</div>

<div id="details_clone" style="display: none">
    <div class='d'>
        <large><b>Details</b></large>
        <hr>
        <p>Tenant: <b class="tname"></b></p>
        <p>Monthly Rental Rate: <b class="price"></b></p>
        <p>Outstanding Balance: <b class="outstanding"></b></p>
        <p>Total Paid: <b class="total_paid"></b></p>
        <p>Rent Started: <b class='rent_started'></b></p>
        <p>Payable Months: <b class="payable_months"></b></p>
        <hr>
    </div>
</div>

<script>

    $(document).ready(function(){
        if('<?php echo isset($id)? 1:0 ?>' == 1)
             $('#tenant_id').trigger('change') 
    })

   $('.select2').select2({
    placeholder:"Please Select Here",
    width:"100%"
   })

    $('#tenant_id').change(function(){
    if($(this).val() <= 0)
        return false;

    start_load()
    $.ajax({
        url:'ajax.php?action=get_tdetails',
        method:'POST',
        data:{id:$(this).val(),pid:'<?php echo isset($id) ? $id : '' ?>'},
        success:function(resp){
            if(resp){
                resp = JSON.parse(resp)
                var details = $('#details_clone .d').clone()
                details.find('.tname').text(resp.name)
                details.find('.price').text(resp.price)
                details.find('.outstanding').text(resp.outstanding)
                details.find('.total_paid').text(resp.paid)
                details.find('.rent_started').text(resp.rent_started)
                details.find('.payable_months').text(resp.months)
                console.log(details.html())
                $('#details').html(details)
            }
        },
        complete:function(){
            end_load()
        }
    })
   })
</script>

</body>
</html>
