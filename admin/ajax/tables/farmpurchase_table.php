<?php include('../../../config.php');
$pinq = $mysqli->query("select * from farm_purchases ORDER BY id DESC");
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
                    <th>Item Name</th>
                    <th>Type</th>
                    <th>Date Purchased</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <?php
                while ($fetch = $pinq->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $fetch['item_name']; ?></td>
                        <td><?php echo $fetch['input_type']; ?></td>
                        <td><?php echo $fetch['date_pf']; ?></td>
                        <td><?php echo $fetch['input_kg'];
                            if ($fetch['input_type'] == 'Fertilizer') {
                               echo " kg";
                            }
                            if ($fetch['input_type'] == 'Pesticide') {
                                echo " litres";
                            }
                            ?></td>
                        <td><?php echo $fetch['input_cost']; ?></td>
                        <td>
                            <button type="button"
                                    data-type="confirm"
                                    class="btn btn-sm btn-danger delete_purchase"
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

    $(document).off('click', '.delete_purchase').on('click', '.delete_purchase', function () {
        var theindex = $(this).attr('i_index');
        //alert(theindex)
        $.confirm({
            title: 'Delete Purchase!',
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
                            url: "ajax/queries/delete_farmpurchase.php",
                            data: {
                                i_index: theindex
                            },
                            dataType: "html",
                            success: function (text) {
                                $.ajax({
                                    url: "ajax/tables/farmpurchase_table.php",
                                    beforeSend: function () {
                                        KTApp.blockPage({
                                            overlayColor: "#000000",
                                            type: "v2",
                                            state: "success",
                                            message: "Please wait..."
                                        })
                                    },
                                    success: function (text) {
                                        $('#farmpurchasetable_div').html(text);
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

</script>