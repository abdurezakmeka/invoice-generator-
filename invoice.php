<?php
include_once 'db_conn.php';
$result = mysqli_query($conn,"SELECT * FROM test ORDER BY id DESC LIMIT 1");
?>


<!DOCTYPE html>
<html>
 <head>

    <meta charset="utf-8">
    
    <title>invoice order receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet" media="screen">

    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 <title> Retrive data</title>
 </head>
<body>
    
    
<?php
if (mysqli_num_rows($result) > 0) {
?>
  
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>




<div class="container">
<div class="row">
                    <!-- BEGIN INVOICE -->
                    <div class="col-xs-12">
                        <div class="grid invoice">
                            <div class="grid-body">
                                <div class="invoice-title">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h1 style="color:#8686BF;font-family: 'Rock Salt', cursive;">zip<span style="color:#FF7F2A;font-family: 'Rock Salt', cursive;">Youth</span></h1>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2 style="text-align: right;">INVOICE<br>
                                            <span class="small" style="color:red;">TO BE PAID</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <address>
                                            <strong>Billed To:</strong><br>

                                            <span style="color:#8686BF;">zip<span style="color:#FF7F2A;">Youth</span></span><br>

                                            <span style="color: #6bbfcd;"> Address: </span>Addis Ababa, W06<br>
                                            <abbr style="color: #6bbfcd;" >Phone:</abbr> (+251) 901-112-274
                                        </address>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <address>
                                            <strong>Bill Info:</strong><br>
                                            <span style="color: #6bbfcd;"> Invoice Number: </span> <?php
                                    $today=date('hIyI');

                                        echo $today;                                    
                                    ?><br>
                                            <span style="color: #6bbfcd;"> Invoice Date: </span> <?php echo $row["invdate"]; ?><br>
                                    
                                    <span style="color: #6bbfcd;"> Due date: </span>

                                            <?php
                                    $today=date('Y-m-d H:i:s');
                                    
                                    //we set up our row to expire 3 days after login_date
                                    
                                    $expire=date('Y-m-d H:i:s', strtotime($row['login_date']. '+1 days + 80 minutes'));
 /*
                                    if ($today>=$expire){
 
                                        //if you wanted to delete row if expired you can do so by substituting the code in the comment below
                                        
                                        //$conn->query("delete `user` where userid='".$row['userid']."'");
 
                                        $conn->query("update `user` set status='Expire' where userid='".$row['userid']."'");
                                        
                                        echo $expire;
                                    }
                                    else{
                                    
                                        echo $expire;
                                    }*/
                                    echo $expire;
                                ?>



                                        

                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <address>
                                            <strong>Payment Alternatives:</strong><br>
                                            <span style="color: #6bbfcd;">Dashen Bank Account No: </span>0000213108<br>

                                            <span style="color: #6bbfcd;">Awash Bank Account No: </span>01335925471600<br>

                                            <span style="color: #6bbfcd;">CBE Account No: </span>1000274198207<br>
                                    
                                        </address>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <address>
                                            <strong>Customer Info:</strong><br>
                                            <span style="color: #6bbfcd;">Name: </span> <?php echo $row["name"]; ?><br>
                                            <span style="color: #6bbfcd;"> Country: </span> <?php echo $row["country"]; ?><br>
                                            
                                            <span style="color: #6bbfcd;"> States: </span> <?php echo $row["states"]; ?><br>

                                             <span style="color: #6bbfcd;">National ID No.: </span> <?php echo $row["nationalid"]; ?><br>

                                             <span style="color: #6bbfcd;"> Phone Number: </span> +<?php echo $row["phone"]; ?><br>

                                             <span style="color: #6bbfcd;"> Request Date: </span> <?php echo $row["invdate"]; ?><br>

                                                                                  
                                        </address>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>ORDER SUMMARY</h3>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="line">
                                                    <td><strong>#</strong></td>
                                                    <td class="text-center"><strong>Description</strong></td>
                                                    <td class="text-center"><strong>HRS</strong></td>
                                                    <td class="text-right"><strong>RATE</strong></td>
                                                    <td class="text-right"><strong>SUBTOTAL</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><strong>Subscription Fee</strong><br>A subscription fee for full course in html, css and javascript.</td>
                                                    <td class="text-center">5</td>
                                                    <td class="text-center">35 Birr</td>
                                                    <td class="text-right">175.00 Birr</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="text-right"><strong>Taxes</strong></td>
                                                    <td class="text-right"><strong>N/A</strong></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                    </td><td class="text-right"><strong>Total</strong></td>
                                                    <td class="text-right"><strong>175.00 Birr</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>                                  
                                </div>
                                
                            </div>

                            <div><button id="prbtn" onClick="window.print()">Print this page
</button><br><br><br><br>

</div>
                        </div>

                    </div>
                    <!-- END INVOICE -->

                </div>
</div>

<style type="text/css">


body{margin-top:20px;
background:#eee;
}

.invoice {
    padding: 30px;
}

.invoice h2 {
    margin-top: 0px;
    line-height: 0.8em;
}

.invoice .small {
    font-weight: 300;
}

.invoice hr {
    margin-top: 10px;
    border-color: #ddd;
}

.invoice .table tr.line {
    border-bottom: 1px solid #ccc;
}

.invoice .table td {
    border: none;
}

.invoice .identity {
    margin-top: 10px;
    font-size: 1.1em;
    font-weight: 300;
}

.invoice .identity strong {
    font-weight: 600;
}


.grid {
    position: relative;
    width: 100%;
    background: #fff;
    color: #666666;
    border-radius: 2px;
    margin-bottom: 25px;
    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}

@media only screen and (max-width: 375px) {

.row {
  display: grid;
  grid-template-columns: auto;
  padding: 0px;
  grid-row-gap: 0px;


}

.col-xs-6{


  padding: 20px;
  width: 90%;
  font-size: 14px;
  text-align: center;
}



.text-right{


 
  padding: 20px;
  font-size: 14px;
  text-align: center;
}
.col-md-12{


  padding: 20px;
  font-size: 14px;
  text-align: center;
}

tr {
    display: grid;
    text-align: center;
}


}

@page { margin: 0; }



<?php
$i++;
}
?>

 <?php
}
else{
    echo "No result found";
}
?>


 </body>
</html>