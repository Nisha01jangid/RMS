<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi:ital@0;1&display=swap" rel="stylesheet">
    <style>
    *{
        margin:0px;
        padding:0px;   
    }
    </style>
  </head>
  <body>
    <div class="maindiv" style=" min-height:500px;
        max-width:400px;
        border:5px solid black;
        padding-left:5px;
        font-family: 'Tiro Devanagari Hindi', serif;
        ">
        <div class="upperdiv">
            <h5 style="text-align:center;margin-top:5px;"><u>हिसाब पर्ची</u></h5>
            <p><span>क्र. <?php if(isset($data['invoice'])){echo $data['invoice'];}else{ ?>...............<?php } ?></span><span style="margin-left:150px">दिनांक <?php if(isset($data['timestamp'])) echo date('d-m-Y',strtotime($data['timestamp'])) ?></span></p>
            <p>नाम श्री/श्रीमती <?php echo $data['tenant_name']; ?></p>
        </div>
        <div class="lowerdiv">

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>