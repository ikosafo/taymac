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
                                class="btn btn-info edit_property"
                                i_index="<?php echo $res['id']; ?>"
                                title="Edit"><i
                                class="icon-pencil" style="color:#fff !important;"></i>
                        </button>
                        <button type="button"
                                data-type="confirm"
                                class="btn btn-danger js-sweetalert delete_property"
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

    $('#bs4-table').DataTable({
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    });

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

</script>
