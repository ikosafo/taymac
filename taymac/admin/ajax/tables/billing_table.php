<?php include ('../../config.php');

$query = $mysqli->query("select * from billing ORDER BY id DESC");

?>

<style>
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


<div class="card">
    <div class="card-body" id="billing-table">

        <table id="bs4-table" class="table table-bordered"
               style="width:100% !important;">
            <thead>
            <tr>
                <th>Bill Type</th>
                <th>Details</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            while ($res = $query->fetch_assoc()) {

                ?>
                <tr>
                    <td>
                        <?php
                        echo $billing_type = $res['billingtype'];
                        if ($billing_type == 'Other') {
                            echo ",".$res['billingtypeother'];
                        }
                        ?>
                    </td>
                    <td>
                        Tenant Name: <b>
                            <?php
                            $tenantid = $res['billingtenant'];
                            $getname = $mysqli->query("select * from tenants where id = '$tenantid'");
                            $resname = $getname->fetch_assoc();
                            echo $tenantname = $resname['tenantname'];
                            ?></b> <br/>
                        Billing For: <b>
                            <?php
                            echo $res['billingfor'];
                            ?></b> <br/>
                        Currency: <b>
                            <?php
                            echo $res['billingcurrency'];
                            ?></b> <br/>
                        Amount Per Month: <b>
                            <?php
                            echo $res['billingamount'];
                            ?></b> <br/>
                        Number of Months: <b>
                            <?php
                            echo $res['billingmonthnumber'];
                            ?></b> <br/>
                        Date: <b>
                            <?php
                            echo $res['billingdate'];
                            ?></b> <br/>
                        Bill Delivered: <b>
                            <?php
                            echo $res['billdelivered'];
                            ?></b> <br/>

                    </td>

                    <td>
                        <?php
                        echo $res['billingdescription'];
                        ?>

                    </td>


                    <td align="center">
                        <button type="button"
                                class="btn btn-info btn-sm edit_billing"
                                i_index="<?php echo $res['id']; ?>"
                                title="Edit"><i
                                class="icon-pencil" style="color:#fff !important;"></i>
                        </button> <br/>
                        <button type="button"
                                class="btn btn-danger btn-sm delete_billing"
                                i_index="<?php echo $res['id']; ?>"
                                title="Delete">
                            <i class="icon-trash" style="color:#fff !important;"></i>
                        </button> <br/>
                        <button type="button"
                                class="btn btn-warning btn-sm print_billing"
                                i_index="<?php echo $res['id']; ?>"
                                title="Print">
                            <i class="icon-printer" style="color:#fff !important;"></i>
                        </button>


                    </td>


                </tr>

                <?php
            }
            ?>
            </tbody>
            <tfoot>

        </table>



    </div>
</div>





<script>

    $('#bs4-table').DataTable();

    $(document).on('click', '.edit_billing', function () {
        var i_index = $(this).attr('i_index');
        //alert(i_index);
        $.ajax({
            type: "POST",
            url: "ajax/forms/billing_form_edit.php",
            data: {
                i_index: i_index
            },
            success: function (text) {
                $('#billing_form_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $(document).on('click', '.print_billing', function () {
        var i_index = $(this).attr('i_index');
        //alert(i_index);
        $.ajax({
            type: "POST",
            url: "ajax/forms/print_bills.php",
            data: {
                i_index: i_index
            },
            success: function (text) {
                $('#billing_row').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $(document).off('click', '.delete_billing').on('click', '.delete_billing', function () {
        var i_index = $(this).attr('i_index');
        $.confirm({
            title: 'Delete Billing Record!',
            content: 'Are you sure to continue?',
            buttons: {
                no: {
                    text: 'No',
                    keys: ['enter', 'shift'],
                    backdrop: 'static',
                    keyboard: false,
                    action: function () {
                        $.alert('Data is safe');
                        $.ajax({
                            url: "ajax/tables/billing_table.php",
                            success: function (text) {
                                $('#billing_table_div').html(text);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            },
                        });
                    }

                },
                yes: {
                    text: 'Yes, Delete it!',
                    btnClass: 'btn-blue',
                    action: function () {
                        $.ajax({
                            type: "POST",
                            url: "ajax/queries/deletebilling.php",
                            data: {
                                i_index: i_index
                            },
                            dataType: "html",
                            success: function (text) {
                                $.alert('Bill is deleted!');
                                $.ajax({
                                    url: "ajax/tables/billing_table.php",
                                    success: function (text) {
                                        $('#billing_table_div').html(text);
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status + " " + thrownError);
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


</script>
