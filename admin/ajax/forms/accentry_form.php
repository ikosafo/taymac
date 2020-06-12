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
                <label for="account_type">Select Account Type</label>
                <select id="account_type" style="width: 100%" onchange="SelectType(this.value);">
                    <option value="">Select Account Type</option>
                    <option value="Income">Income</option>
                    <option value="Expenditure">Expenditure</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <div id="show_income" style="display: none">
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="source_name">Source</label>
                    <input type="text" class="form-control" id="source_name"
                           placeholder="Enter Source">
                </div>
            </div>
        </div>

        <div id="show_expenditure" style="display: none">
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="expense">Expense</label>
                    <input type="text" class="form-control" id="expense"
                           placeholder="Enter Source">
                </div>
            </div>
        </div>

        <div id="show_other" style="display: none">
            <div class="form-group row">
                <div class="col-lg-12 col-md-12">
                    <label for="acc_type">Account Type</label>
                    <input type="text" class="form-control" id="acc_type"
                           placeholder="Enter Source">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="date_account">Date</label>
                <input type="text" class="form-control" id="date_account"
                       placeholder="Select Date">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount"
                       onkeypress="return isNumberKey(event)"
                       placeholder="Enter Amount">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12 col-md-12">
                <label for="payment_description">Description</label>
                <textarea class="form-control" id="payment_description"
                          placeholder="Enter Description"></textarea>
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <button type="button" class="btn btn-primary" id="saveincome">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>


    </div>

</form>
<!--end::Form-->


<script>
    function SelectType(val) {
        var element = document.getElementById('show_income');
        if (val == 'Income')
            element.style.display = 'block';
        else
            element.style.display = 'none';

        var element2 = document.getElementById('show_expenditure');
        if (val == 'Expenditure')
            element2.style.display = 'block';
        else
            element2.style.display = 'none';

        var element3 = document.getElementById('show_other');
        if (val == 'Other')
            element3.style.display = 'block';
        else
            element3.style.display = 'none';
    }

</script>


<script>

    $("#account_type").select2({placeholder: "Select Input Type"});

    $('#date_account').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom"
    });

    $('#date_pp').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom"
    });

    $('#date_po').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom"
    });

    $("#account_kg").keyup(function () {
        var account_kg = $(this).val();
        $("#account_g").val(account_kg * 1000);
    });
    $("#account_g").keyup(function () {
        var account_g = $(this).val();
        $("#account_kg").val(account_g / 1000);
    });
    $("#account_l").keyup(function () {
        var account_l = $(this).val();
        $("#account_ml").val(account_l * 1000);
    });
    $("#account_ml").keyup(function () {
        var account_ml = $(this).val();
        $("#account_l").val(account_ml / 1000);
    });

    $('#saveincome').click(function () {
        var source_name = $('#source_name').val();
        var account_kg = $('#account_kg').val();
        var account_g = $('#account_g').val();
        var amount = $('#amount').val();
        var date_account = $('#date_account').val();
        var account_type='Fertilizer';

        var error = '';
        if (source_name == "") {
            error += 'Please enter fertilizer name \n';
            $("#source_name").focus();
        }
        if (date_account == "") {
            error += 'Please enter date purchased \n';
        }
        if (account_kg == "" && account_g=="") {
            error += 'Please select fertilizer quantity in kg or g\n';
            $("#account_kg").focus();
        }
        if (amount  == "") {
            error += 'Please enter cost of item \n';
            $("#amount").focus();
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
                    source_name: source_name,
                    account_kg: account_kg,
                    account_g: account_g,
                    amount:amount,
                    account_type:account_type,
                    date_account:date_account
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


    $('#save_purchase_p').click(function () {
        var pesticide_name = $('#pesticide_name').val();
        var account_l = $('#account_l').val();
        var account_ml = $('#account_ml').val();
        var account_cost_p = $('#account_cost_p').val();
        var date_pp = $('#date_pp').val();
        var account_type='Pesticide';

        var error = '';
        if (pesticide_name == "") {
            error += 'Please enter pesticide name \n';
            $("#pesticide_name").focus();
        }
        if (date_pp == "") {
            error += 'Please enter date purchased \n';
        }
        if (account_l == "" && account_ml=="") {
            error += 'Please select pesticide quantity in l or ml\n';
            $("#account_l").focus();
        }
        if (account_cost_p  == "") {
            error += 'Please enter cost of item \n';
            $("#account_cost_p").focus();
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
                    source_name: pesticide_name,
                    account_kg: account_l,
                    account_g: account_ml,
                    amount:account_cost_p,
                    account_type:account_type,
                    date_account:date_pp
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


    $('#save_purchase_o').click(function () {
        var product_name = $('#product_name').val();
        var account_qty = $('#account_qty').val();
        var account_cost = $('#account_cost').val();
        var date_po = $('#date_po').val();
        var account_type='Other';

        var error = '';
        if (product_name == "") {
            error += 'Please enter product name \n';
            $("#product_name").focus();
        }
        if (date_po == "") {
            error += 'Please enter date purchased \n';
        }
        if (account_qty == "") {
            error += 'Please select quantity\n';
            $("#account_l").focus();
        }
        if (account_cost  == "") {
            error += 'Please enter cost of item \n';
            $("#account_cost_p").focus();
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
                    source_name: product_name,
                    account_kg: account_qty,
                    account_g: '',
                    amount:account_cost,
                    account_type:account_type,
                    date_account:date_po
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