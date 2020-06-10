<?php include ('../../../config.php');
$random = rand(1,10000).date("Ymd");
?>
<!--begin::Form-->

<script>
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode != 46 && charCode > 31
                    && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }

</script>


<form class="" autocomplete="off">
    <div class="kt-portlet__body">

        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="input_type">Select Input Type</label>
                <select id="input_type" style="width: 100%" onchange="SelectType(this.value);">
                    <option value="">Select Input Type</option>
                    <option value="Fertilizer">Fertilizer</option>
                    <option value="Pesticide">Pesticide</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <div id="show_fertilizer" style="display: none">
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="fertilizer_name">Fertilizer Name</label>
                    <input type="text" class="form-control" id="fertilizer_name"
                           placeholder="Enter Fertilizer Name">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="date_pf">Date Purchased</label>
                    <input type="text" class="form-control" id="date_pf"
                           placeholder="Enter Date Purchased">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="input_kg">Specify Quantity (in kg)</label>
                    <input type="text" class="form-control" id="input_kg"
                           onkeypress="return isNumberKey(event)"
                           placeholder="Enter Date Purchased">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="input_kg">Specify Quantity (in g)</label>
                    <input type="text" class="form-control" id="input_g"
                           onkeypress="return isNumberKey(event)"
                           placeholder="Enter Date Purchased">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="input_cost_f">Cost</label>
                    <input type="text" class="form-control" id="input_cost_f"
                           onkeypress="return isNumberKey(event)"
                           placeholder="Enter Cost">
                </div>
            </div>

            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="button" class="btn btn-primary" id="save_purchase_f">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>



    </div>

</form>
<!--end::Form-->


<script>
    function SelectType(val) {
        var element = document.getElementById('show_fertilizer');
        if (val == 'Fertilizer')
            element.style.display = 'block';
        else
            element.style.display = 'none';

       /* var element2 = document.getElementById('show_pesticide');
        if (val == 'Pesticide')
            element2.style.display = 'block';
        else
            element2.style.display = 'none';

        var element3 = document.getElementById('show_other');
        if (val == 'Other')
            element3.style.display = 'block';
        else
            element3.style.display = 'none';*/
    }

</script>


<script>

    $("#input_type").select2({placeholder: "Select Input Type"});

    $('#date_pf').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom"
    });

    $("#input_kg").keyup(function () {
        var input_kg = $(this).val();
        $("#input_g").val(input_kg * 1000);
    });
    $("#input_g").keyup(function () {
        var input_g = $(this).val();
        $("#input_kg").val(input_g / 1000);
    });
    $("#input_l").keyup(function () {
        var input_l = $(this).val();
        $("#input_ml").val(input_l * 1000);
    });
    $("#input_ml").keyup(function () {
        var input_ml = $(this).val();
        $("#input_l").val(input_ml / 1000);
    });

    $('#save_purchase_f').click(function () {
        var fertilizer_name = $('#fertilizer_name').val();
        var input_kg = $('#input_kg').val();
        var input_g = $('#input_g').val();
        var input_cost_f = $('#input_cost_f').val();
        var date_pf = $('#date_pf').val();
        var input_type='Fertilizer';

        var error = '';
        if (fertilizer_name == "") {
            error += 'Please enter fertilizer name \n';
            $("#fertilizer_name").focus();
        }
        if (date_pf == "") {
            error += 'Please enter date purchased \n';
        }
        if (input_kg == "" && input_g=="") {
            error += 'Please select fertilizer quantity in kg or g\n';
            $("#input_kg").focus();
        }
        if (input_cost_f  == "") {
            error += 'Please enter cost of item \n';
            $("#input_cost_f").focus();
        }

        if (error == "") {
            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_farmpurchase.php",
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: "#000000",
                        type: "v2",
                        state: "success",
                        message: "Please wait..."
                    })
                },
                data: {
                    fertilizer_name: fertilizer_name,
                    input_kg: input_kg,
                    input_g: input_g,
                    input_cost_f:input_cost_f,
                    input_type:input_type,
                    date_pf:date_pf
                },
                success: function (text) {

                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/farmpurchase_form.php",
                        beforeSend: function () {
                            KTApp.blockPage({
                                overlayColor: "#000000",
                                type: "v2",
                                state: "success",
                                message: "Please wait..."
                            })
                        },
                        success: function (text) {
                            $('#farmpurchaseform_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },
                        complete: function () {
                            KTApp.unblockPage();
                        },
                    });

                    $.ajax({
                        type: "POST",
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
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
                complete: function () {
                    KTApp.unblockPage();
                },
            });

        }
        else {
            $.notify(error, {position: "top center"});
        }
        return false;
    });

</script>