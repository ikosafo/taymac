<?php include ('../../config.php');

$query = $mysqli->query("select * from properties ORDER BY propertyname DESC");

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
    <div class="card-body" id="property-table">

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
                        Property Name: <b>
                            <?php
                            echo $res['propertyname']
                            ?></b> <br/>
                        Location: <b>
                            <?php
                            echo $res['propertylocation'];
                            ?></b> <br/>
                        Type: <b>
                            <?php
                            echo $res['propertytype'];
                            ?></b> <br/>
                        Address: <b>
                            <?php
                            echo $res['propertyaddress'];
                            ?></b> <br/>


                    </td>

                    <td>
                        <?php
                        echo $res['propertydescription'];
                        ?>

                    </td>

                    <td align="center">
                        <button type="button"
                                class="btn btn-info btn-sm edit_property"
                                i_index="<?php echo $res['id']; ?>"
                                title="Edit"><i
                                class="icon-pencil" style="color:#fff !important;"></i>
                        </button>
                        <button type="button"
                                class="btn btn-danger btn-sm delete_property"
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

    $(document).on('click', '.edit_property', function () {
        var i_index = $(this).attr('i_index');
        //alert(i_index);
        $.ajax({
            type: "POST",
            url: "ajax/forms/property_form_edit.php",
            data: {
                i_index: i_index
            },
            success: function (text) {
                $('#property_form_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
        });
    });


    $(document).off('click', '.delete_property').on('click', '.delete_property', function () {
        var i_index = $(this).attr('i_index');
        $.confirm({
            title: 'Delete Property!',
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
                            url: "ajax/tables/property_table.php",
                            success: function (text) {
                                $('#property_table_div').html(text);
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
                            url: "ajax/queries/deleteproperty.php",
                            data: {
                                i_index: i_index
                            },
                            dataType: "html",
                            success: function (text) {
                                $.alert('Data is deleted!');
                                $.ajax({
                                    url: "ajax/tables/property_table.php",
                                    success: function (text) {
                                        $('#property_table_div').html(text);
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
