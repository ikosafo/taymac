<?php include ('../../config.php');

$query = $mysqli->query("select * from service ORDER BY id DESC");

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
    <div class="card-body" id="service-table">

        <table id="bs4-table" class="table table-bordered"
               style="width:100% !important;">
            <thead>
            <tr>
                <th>Service and <br/>Maintenance Type</th>
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
                        echo $service_type = $res['servicetype'];
                        if ($service_type == 'Other') {
                            echo ",".$res['servicetypeother'];
                        }
                        ?>
                    </td>
                    <td>
                        Tenant Name: <b>
                            <?php
                            $tenantid = $res['servicetenant'];
                            $getname = $mysqli->query("select * from tenants where id = '$tenantid'");
                            $resname = $getname->fetch_assoc();
                            echo $tenantname = $resname['tenantname'];
                            ?></b> <br/>
                        Cost: <b>
                            <?php
                            echo $res['servicecost'];
                            ?></b> <br/>
                        Date: <b>
                            <?php
                            echo $res['servicedate'];
                            ?></b> <br/>
                    </td>

                    <td>
                        <?php
                        echo $res['servicedescription'];
                        ?>

                    </td>


                    <td align="center">
                        <button type="button"
                                class="btn btn-info btn-sm edit_service"
                                i_index="<?php echo $res['id']; ?>"
                                title="Edit"><i
                                class="icon-pencil" style="color:#fff !important;"></i>
                        </button> <br/>
                        <button type="button"
                                class="btn btn-danger btn-sm delete_service"
                                i_index="<?php echo $res['id']; ?>"
                                title="Delete">
                            <i class="icon-trash" style="color:#fff !important;"></i>
                        </button> <br/>
                        <button type="button"
                                class="btn btn-warning btn-sm print_service"
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

    $(document).on('click', '.edit_service', function () {
        var i_index = $(this).attr('i_index');
        //alert(i_index);
        $.ajax({
            type: "POST",
            url: "ajax/forms/service_form_edit.php",
            data: {
                i_index: i_index
            },
            success: function (text) {
                $('#service_form_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $(document).on('click', '.print_service', function () {
        var i_index = $(this).attr('i_index');
        //alert(i_index);
        $.ajax({
            type: "POST",
            url: "ajax/forms/print_servicebills.php",
            data: {
                i_index: i_index
            },
            success: function (text) {
                $('#service_row').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $(document).off('click', '.delete_service').on('click', '.delete_service', function () {
        var i_index = $(this).attr('i_index');
        $.confirm({
            title: 'Delete Service and Maintenance Record!',
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
                            url: "ajax/tables/service_table.php",
                            success: function (text) {
                                $('#service_table_div').html(text);
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
                            url: "ajax/queries/deleteservice.php",
                            data: {
                                i_index: i_index
                            },
                            dataType: "html",
                            success: function (text) {
                                $.alert('Service and Maintenance is Deleted!');
                                $.ajax({
                                    url: "ajax/tables/service_table.php",
                                    success: function (text) {
                                        $('#service_table_div').html(text);
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
