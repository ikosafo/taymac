<?php include('../../../config.php');
$pinq = $mysqli->query("select * from admin_taymac_sm ORDER BY id DESC");
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
                    <th>Service Details</th>
                    <th>Service Cost</th>
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
                            <b>Service Type : </b><?php echo $sm_type = $fetch['sm_type'];
                            if($sm_type == "") {
                                echo $fetch['sm_type_other'];
                            }
                            ?> <br/>
                            <b>Tenant :</b> <?php $tenant =  $fetch['sm_tenant'];
                            $gettenant = $mysqli->query("select * from admin_taymac_tenant where id = '$tenant'");
                            $restenant = $gettenant->fetch_assoc();
                            echo $restenant['tenant_name'];
                            ?> <br/>
                            <b>Currency : </b> <?php echo $currency = $fetch['sm_currency']; ?> <br/>
                        </td>
                        <td>
                            <b>Total Bill : </b>  <?php echo getCurrency($currency).' '.number_format($fetch['sm_amount'],2); ?> <br/>
                            <b>Debt : </b>  <?php echo getCurrency($currency).' '.number_format(($fetch['sm_amount'] - $fetch['amt_paid']),2); ?> <br/>

                        </td>
                        <td><?php echo $fetch['sm_description']; ?></td>
                        <td>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-success pay_sm"
                                    i_index="<?php echo $fetch['id']; ?>"
                                    title="Pay Bill">
                                Pay
                            </button>
                            <p></p>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-warning print_sm"
                                    i_index="<?php echo $fetch['id']; ?>"
                                    title="Print">
                                <i class="flaticon2-print ml-1" style="color:#fff !important;"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-primary edit_sm"
                                    i_index="<?php echo $fetch['id']; ?>"
                                    title="Edit">
                                <i class="flaticon2-edit ml-1" style="color:#fff !important;"></i>
                            </button>
                            <p></p>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-danger delete_sm"
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

    $(document).off('click', '.delete_sm').on('click', '.delete_sm', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex)
        $.confirm({
            title: 'Delete sm!',
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
                            url: "ajax/queries/delete_adminsm.php",
                            data: {
                                i_index: theindex
                            },
                            dataType: "html",
                            success: function (text) {
                                $.ajax({
                                    url: "ajax/tables/adminsm_table.php",
                                    beforeSend: function () {
                                        KTApp.blockPage({
                                            overlayColor: "#000000",
                                            type: "v2",
                                            state: "success",
                                            message: "Please wait..."
                                        })
                                    },
                                    success: function (text) {
                                        $('#smtable_div').html(text);
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

    $(document).off('click', '.edit_sm').on('click', '.edit_sm', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex);

        $.ajax({
            type: "POST",
            url: "ajax/forms/adminsm_formedit.php",
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
                $('#smform_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                KTApp.unblockPage();
            },
        });
    });

    $(document).off('click', '.pay_sm').on('click', '.pay_sm', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex);

        $.ajax({
            type: "POST",
            url: "ajax/forms/adminsmpay_form.php",
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
                $('#smform_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                KTApp.unblockPage();
            },
        });
    });


    $(document).off('click', '.print_sm').on('click', '.print_sm', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex);

        $.ajax({
            type: "POST",
            url: "ajax/forms/adminsmprint_form.php",
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
                $('#smform_div').html(text);
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