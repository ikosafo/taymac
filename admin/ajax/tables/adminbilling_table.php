<?php include('../../../config.php');
$pinq = $mysqli->query("select * from admin_taymac_billing ORDER BY id DESC");
?>
<style>
    .dataTables_filter {
        display: none;
    }
</style>


<div class="kt-section">

    <div class="kt-section__content responsive">
        <div class="kt-searchbar">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">
                                <i class="la la-search"></i>
                            </span></div>
                <input type="text" id="data_search" class="form-control"
                       placeholder="Search..." aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="table-responsive">
            <table id="data-table" class="table" style="margin-top: 3% !important;">
                <thead>
                <tr>
                    <th>Billing Details</th>
                    <th>Billing Amount(s)</th>
                    <th>Description</th>
                    <th>Bill</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <?php
                while ($fetch = $pinq->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <b>Billing Type : </b><?php echo $billing_type = $fetch['billing_type'];
                             if($billing_type == "") {
                                 echo $fetch['billing_type_other'];
                             }
                            ?> <br/>
                            <b>Tenant :</b> <?php $tenant =  $fetch['billing_tenant'];
                            $gettenant = $mysqli->query("select * from admin_taymac_tenant where id = '$tenant'");
                            $restenant = $gettenant->fetch_assoc();
                            echo $restenant['tenant_name'];
                            ?> <br/>
                            <b>Billing Currency : </b> <?php echo $currency = $fetch['billing_currency']; ?> <br/>
                            <b>Billed For : </b> <?php echo $fetch['billing_period']; ?> <br/>
                            <b>Bill Sent : </b> <?php echo $fetch['billing_delivered']; ?> <br/>
                        </td>
                        <td>
                            <b>Amt Per Month : </b>  <?php echo getCurrency($currency).' '.number_format($fetch['billing_amount'],2); ?> <br/>
                            <b>Number of Months : </b>  <?php echo $fetch['billing_months']; ?> <br/>
                            <b>Total Bill : </b>  <?php echo getCurrency($currency).' '.number_format($fetch['billing_total'],2); ?> <br/>
                            <b>Debt : </b>  <?php echo getCurrency($currency).' '.number_format(($fetch['billing_total'] - $fetch['amt_paid']),2); ?> <br/>

                           </td>
                        <td><?php echo $fetch['billing_description']; ?></td>
                        <td>
                               <button type="button"
                                        data-type="confirm"
                                        class="btn btn-sm btn-success pay_billing"
                                        i_index="<?php echo $fetch['id']; ?>"
                                        title="Pay Bill">
                                    Pay
                                </button>
                            <p></p>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-warning print_billing"
                                    i_index="<?php echo $fetch['id']; ?>"
                                    title="Print">
                                <i class="flaticon2-print ml-1" style="color:#fff !important;"></i>
                            </button>
                            </td>
                            <td>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-primary edit_billing"
                                    i_index="<?php echo $fetch['id']; ?>"
                                    title="Edit">
                                <i class="flaticon2-edit ml-1" style="color:#fff !important;"></i>
                            </button>
                            <p></p>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-danger delete_billing"
                                    i_index="<?php echo $fetch['id']; ?>"
                                    title="Delete">
                                <i class="flaticon2-trash ml-1" style="color:#fff !important;"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<script>
    oTable = $('#data-table').DataTable({
        "bLengthChange": false
    });

    $('#data_search').keyup(function () {
        oTable.search($(this).val()).draw();
    });

    $(document).off('click', '.delete_billing').on('click', '.delete_billing', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex)
        $.confirm({
            title: 'Delete Billing!',
            content: 'Are you sure to continue?',
            buttons: {
                no: {
                    text: 'No',
                    keys: ['enter', 'shift'],
                    backdrop: 'static',
                    keyboard: false,
                    action: function () {
                        $.alert('Data is safe');
                    }
                },
                yes: {
                    text: 'Yes, Delete it!',
                    btnClass: 'btn-blue',
                    action: function () {
                        $.ajax({
                            type: "POST",
                            url: "ajax/queries/delete_adminbilling.php",
                            data: {
                                i_index: theindex
                            },
                            dataType: "html",
                            success: function (text) {
                                $.ajax({
                                    url: "ajax/tables/adminbilling_table.php",
                                    beforeSend: function () {
                                        KTApp.blockPage({
                                            overlayColor: "#000000",
                                            type: "v2",
                                            state: "success",
                                            message: "Please wait..."
                                        })
                                    },
                                    success: function (text) {
                                        $('#billingtable_div').html(text);
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
                                    },
                                    complete: function () {
                                        KTApp.unblockPage();
                                    },
                                });
                            },

                            complete: function () {
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            }
                        });
                    }
                }
            }
        });
    });

    $(document).off('click', '.edit_billing').on('click', '.edit_billing', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex);

        $.ajax({
            type: "POST",
            url: "ajax/forms/adminbilling_formedit.php",
            beforeSend: function () {
                KTApp.blockPage({
                    overlayColor: "#000000",
                    type: "v2",
                    state: "success",
                    message: "Please wait..."
                })
            },
            data:{
                theindex:theindex
            },
            success: function (text) {
                $('#billingform_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                KTApp.unblockPage();
            },
        });
    });

    $(document).off('click', '.pay_billing').on('click', '.pay_billing', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex);

        $.ajax({
            type: "POST",
            url: "ajax/forms/adminbillingpay_form.php",
            beforeSend: function () {
                KTApp.blockPage({
                    overlayColor: "#000000",
                    type: "v2",
                    state: "success",
                    message: "Please wait..."
                })
            },
            data:{
                theindex:theindex
            },
            success: function (text) {
                $('#billingform_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                KTApp.unblockPage();
            },
        });
    });


    $(document).off('click', '.print_billing').on('click', '.print_billing', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex);

        $.ajax({
            type: "POST",
            url: "ajax/forms/adminbillingprint_form.php",
            beforeSend: function () {
                KTApp.blockPage({
                    overlayColor: "#000000",
                    type: "v2",
                    state: "success",
                    message: "Please wait..."
                })
            },
            data:{
                theindex:theindex
            },
            success: function (text) {
                $('#billingform_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                KTApp.unblockPage();
            },
        });
    });
</script>