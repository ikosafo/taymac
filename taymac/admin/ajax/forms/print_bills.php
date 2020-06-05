<?php

include ('../../config.php');

$i_index = $_POST['i_index'];
$getdetails = $mysqli->query("select * from billing where id = '$i_index'");
$resdetails = $getdetails->fetch_assoc();

//$user_id = $_SESSION['user_id'];
?>


<style>
    @media print{@page {size: landscape}}
    ul {
        list-style-type: none;
    }

    tr td {
        font-size: small;
    }

    tr th {
        font-size: small;
    }
</style>


<script>

    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>



<button type="button"
        class="btn btn-primary btn-sm go_back"
        title="Print">
    Go Back
</button>
<br/>
<br/>

<div class="row" id="print_this">
<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-header border-bottom">
                    <div class="row">

                        <div class="col-md-12" align="center">
                            <img src="../assets/img/logo.jpeg" style="width: 20% !important;"/>

                            <h4 style="font-weight: bold;">
                                GROUND FLOOR, LE PIERRE, 14 SENCHI STREET, AIRPORT RESIDENTIAL AREA, ACCRA - GHANA</h4>
                            <h6>TEL: 0302-789-025 / 0266-107-130</h6>
                            <hr class="dashed">
                            INVOICE
                            <hr class="dashed">
                        </div>

                    </div>
                    <div class="invoice-summary">
                        <div class="row">
                            <div class="col-md-6" style="font-size: small">
                                <i class="icon-user"></i> <span style="font-weight: bold">TAYMAC</span>  <br/>
                                <i class="icon-location-pin"></i> GROUND FLOOR, LE PIERRE, 14 SENCHI STREET, AIRPORT RESIDENTIAL AREA <br/>
                                ACCRA - GHANA <br/>
                                <i class="icon-envelope-letter"></i> P.O. BOX AN 7310 <br/>
                                <i class="icon-envelope"></i> josh.kpakpah@taymac.net
                            </div>

                            <div class="col-md-6" style="font-size: small;text-transform: uppercase">
                                <i class="icon-people"></i> PREPARED FOR: <span style="font-weight: bold">
                                    <?php
                                    $tenantid = $resdetails['billingtenant'];
                                    $getname = $mysqli->query("select * from tenants where id = '$tenantid'");
                                    $resname = $getname->fetch_assoc();
                                    echo $tenantname = $resname['tenantname'];
                                    ?>
                                </span>  <br/>
                                <i class="icon-pencil"></i> CUSTOMER REF: <?php
                                echo preg_replace('/\b(\w)|./', '$1', $tenantname).'/'.$resdetails['id'].'/'.date('dmy',strtotime($resdetails['billingdate']));
                                ?><br/>
                                <i class="icon-user"></i> ATTENTION: <?php echo $tenantname ?> <br/>
                                <i class="icon-note"></i> INVOICE No. : <?php
                                echo preg_replace('/\b(\w)|./', '$1', $tenantname).'/TAYMAC/'.$resdetails['id'].'/'.date('Y',strtotime($resdetails['billingdate']));
                                ?> <br/>
                                <i class="icon-user"></i> FROM: <?php echo "TAYMAC" ?> <br/>
                                <i class="icon-calendar"></i> DATE: <?php echo date('Y-m-d') ?> <br/>
                            </div>
                        </div>
                        <hr class="dashed">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <?php
                                        echo $billing_type = $resdetails['billingtype'];
                                        if ($billing_type == 'Other') {
                                            echo ",".$resdetails['billingtypeother'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $resdetails['billingdescription'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $resdetails['billingamount'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        TOTAL
                                    </td>
                                    <td colspan="2"></td>
                                    <td><span style="font-weight: bold;font-size: small !important;">
                                             <?php
                                             $currency = $resdetails['billingcurrency'];
                                             if ($currency == 'US Dollars') {
                                                 $sign = "&dollar;";
                                             }
                                             else if ($currency == 'GH Cedis') {
                                                 $sign = "GHS";
                                             }
                                             else if ($currency == 'GB Pounds') {
                                                 $sign = "&pound;";
                                             }
                                             else if ($currency == 'Eu Euros') {
                                                 $sign = "&euro;";
                                             }
                                             else {
                                                 $sign = '';
                                             }
                                             echo $sign.' '.number_format($resdetails['billingamount'],2);
                                             ?>
                                         </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>Joshua M.K Kpakpah (Jnr.) <br/>
                            For & Behalf of Taymac </p>
                        <br/>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-header border-bottom">
                    <div class="row">

                        <div class="col-md-12" align="center">
                            <img src="../assets/img/logo.jpeg" style="width: 20% !important;"/>

                            <h4 style="font-weight: bold;">
                                GROUND FLOOR, LE PIERRE, 14 SENCHI STREET, AIRPORT RESIDENTIAL AREA, ACCRA - GHANA</h4>
                            <h6>TEL: 0302-789-025 / 0266-107-130</h6>
                            <hr class="dashed">
                            INVOICE
                            <hr class="dashed">
                        </div>

                    </div>
                    <div class="invoice-summary">
                        <div class="row">
                            <div class="col-md-6" style="font-size: small">
                                <i class="icon-user"></i> <span style="font-weight: bold">TAYMAC</span>  <br/>
                                <i class="icon-location-pin"></i> GROUND FLOOR, LE PIERRE, 14 SENCHI STREET, AIRPORT RESIDENTIAL AREA <br/>
                                ACCRA - GHANA <br/>
                                <i class="icon-envelope-letter"></i> P.O. BOX AN 7310 <br/>
                                <i class="icon-envelope"></i> josh.kpakpah@taymac.net
                            </div>

                            <div class="col-md-6" style="font-size: small;text-transform: uppercase">
                                <i class="icon-people"></i> PREPARED FOR: <span style="font-weight: bold">
                                    <?php
                                    $tenantid = $resdetails['billingtenant'];
                                    $getname = $mysqli->query("select * from tenants where id = '$tenantid'");
                                    $resname = $getname->fetch_assoc();
                                    echo $tenantname = $resname['tenantname'];
                                    ?>
                                </span>  <br/>
                                <i class="icon-pencil"></i> CUSTOMER REF: <?php
                                echo preg_replace('/\b(\w)|./', '$1', $tenantname).'/'.$resdetails['id'].'/'.date('dmy',strtotime($resdetails['billingdate']));
                                ?><br/>
                                <i class="icon-user"></i> ATTENTION: <?php echo $tenantname ?> <br/>
                                <i class="icon-note"></i> INVOICE No. : <?php
                                echo preg_replace('/\b(\w)|./', '$1', $tenantname).'/TAYMAC/'.$resdetails['id'].'/'.date('Y',strtotime($resdetails['billingdate']));
                                ?> <br/>
                                <i class="icon-user"></i> FROM: <?php echo "TAYMAC" ?> <br/>
                                <i class="icon-calendar"></i> DATE: <?php echo date('Y-m-d') ?> <br/>
                            </div>
                        </div>
                        <hr class="dashed">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <?php
                                        echo $billing_type = $resdetails['billingtype'];
                                        if ($billing_type == 'Other') {
                                            echo ",".$resdetails['billingtypeother'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $resdetails['billingdescription'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $resdetails['billingamount'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        TOTAL
                                    </td>
                                    <td colspan="2"></td>
                                    <td><span style="font-weight: bold;font-size: small !important;">
                                             <?php
                                             $currency = $resdetails['billingcurrency'];
                                             if ($currency == 'US Dollars') {
                                                 $sign = "&dollar;";
                                             }
                                             else if ($currency == 'GH Cedis') {
                                                 $sign = "GHS";
                                             }
                                             else if ($currency == 'GB Pounds') {
                                                 $sign = "&pound;";
                                             }
                                             else if ($currency == 'Eu Euros') {
                                                 $sign = "&euro;";
                                             }
                                             else {
                                                 $sign = '';
                                             }
                                             echo $sign.' '.number_format($resdetails['billingamount'],2);
                                             ?>
                                         </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>Joshua M.K Kpakpah (Jnr.) <br/>
                            For & Behalf of Taymac </p>
                        <br/>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card-footer bg-light">
        <button class="btn btn-primary pull-right m-t-20 m-b-20"
                onclick="printContent('print_this')"><i class="icon-printer"></i> Print Invoice
        </button>
    </div>
</div>



<script>
    $(".go_back").click(function () {
        location.reload();
    });
</script>