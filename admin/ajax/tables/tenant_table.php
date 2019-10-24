<?php include ('../../config.php');

$query = $mysqli->query("select * from tenants ORDER BY tenantname DESC");

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
    <div class="card-body" id="tenant-table">

        <table id="bs4-table" class="table table-bordered"
               style="width:100% !important;">
            <thead>
            <tr>
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
                        Tenant Name: <b>
                            <?php
                            echo $res['tenantname']
                            ?></b> <br/>
                        Property: <b>
                            <?php
                            $propertyid = $res['tenantproperty'];
                            $getname = $mysqli->query("select * from properties where id = '$propertyid'");
                            $resname = $getname->fetch_assoc();
                            echo $propertyname = $resname['propertyname'];
                            ?></b> <br/>
                        Telephone: <b>
                            <?php
                            echo $res['tenanttelephone'];
                            ?></b> <br/>
                        Email: <b>
                            <?php
                            echo $res['tenantemail'];
                            ?></b> <br/>
                        Date Commenced: <b>
                            <?php
                            echo $res['tenantdatecommenced'];
                            ?></b> <br/>
                        Date Completed: <b>
                            <?php
                            echo $res['tenantdatecompleted'];
                            ?></b> <br/>
                        Rates: <b>
                            <?php
                            echo $res['tenantrates'];
                            ?></b> <br/>

                    </td>

                    <td>
                        <?php
                        echo $res['tenantdescription'];
                        ?>

                    </td>

                    <td align="center">
                        <button type="button"
                                class="btn btn-info btn-sm edit_tenant"
                                i_index="<?php echo $res['id']; ?>"
                                title="Edit"><i
                                class="icon-pencil" style="color:#fff !important;"></i>
                        </button>
                        <button type="button"
                                class="btn btn-danger btn-sm delete_tenant"
                                i_index="<?php echo $res['id']; ?>"
                                title="Delete">
                            <i class="icon-trash" style="color:#fff !important;"></i>
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

    $(document).on('click', '.edit_tenant', function () {
        var i_index = $(this).attr('i_index');
        //alert(i_index);
        $.ajax({
            type: "POST",
            url: "ajax/forms/tenant_form_edit.php",
            data: {
                i_index: i_index
            },
            success: function (text) {
                $('#tenant_form_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $(document).off('click', '.delete_tenant').on('click', '.delete_tenant', function () {
        var i_index = $(this).attr('i_index');
        $.confirm({
            title: 'Delete Tenant!',
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
                            url: "ajax/tables/tenant_table.php",
                            success: function (text) {
                                $('#tenant_table_div').html(text);
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
                            url: "ajax/queries/deletetenant.php",
                            data: {
                                i_index: i_index
                            },
                            dataType: "html",
                            success: function (text) {
                                $.alert('Tenant is deleted!');
                                $.ajax({
                                    url: "ajax/tables/tenant_table.php",
                                    success: function (text) {
                                        $('#tenant_table_div').html(text);
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
