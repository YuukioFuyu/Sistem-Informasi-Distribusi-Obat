"use strict";
function cmbCode_bankbookonchange() {
    var t = $("#cmbCode").val(),
        e = ($("#cmbCode").text(), $("option:selected", $("#cmbCode")).text());
    $("#txtName").val(e), $("#txtCode").val(t);
}
function addaccountContravoucher(t) {
    var e = $("#headoption").val(),
        a = $("#debtAccVoucher tbody tr").length + 1,
        l = 0;
    if (500 == a) alert("You have reached the limit of adding " + a + " inputs");
    else {
        var n = document.createElement("tr");
        l = "cmbCode_" + a;
        ((n = document.createElement("tr")).innerHTML =
            "<td> <select name='cmbCode[]' id='cmbCode_" +
            a +
            "' class='form-control select2' onchange='load_dbtvouchercode(this.value," +
            a +
            ")' required></select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_" +
            a +
            "' ></td><td><input type='text' name='txtAmount[]' class='form-control total_price text-right valid_number' value='0' id='txtAmount_" +
            a +
            "' onkeyup='calculationContravoucher(" +
            a +
            ")'></td><td><input type='text' name='txtAmountcr[]' class='form-control total_price1 text-right valid_number' id='txtAmount1_" +
            a +
            "' value='0' onkeyup='calculationContravoucher(" +
            a +
            ")'></td><td><button  class='btn btn-danger-soft red' type='button'  onclick='deleteRowContravoucher(this)'><i class='far fa-trash-alt'></i></button></td>"),
            document.getElementById(t).appendChild(n),
            document.getElementById(l).focus(),
            $("#cmbCode_" + a).html(e),
            a++,
            $(".select2").select2();
    }
}
function calculationContravoucher(t) {
    var e = 0,
        a = 0;
    $(".total_price").each(function () {
        isNaN(this.value) || 0 == this.value.length || (a += parseFloat(this.value));
    }),
        $(".total_price1").each(function () {
            isNaN(this.value) || 0 == this.value.length || (e += parseFloat(this.value));
        }),
        $("#grandTotal").val(a.toFixed(2, 2)),
        $("#grandTotal1").val(e.toFixed(2, 2));
}
function deleteRowContravoucher(t) {
    if (1 == $("#debtAccVoucher > tbody > tr").length) alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e);
    }
    calculationContravoucher();
}
function load_dbtvouchercode(t, e) {
    var a = $("#base_url").val();
    $.ajax({
        url: a + "/account/debitvoucher_code/" + t,
        type: "GET",
        dataType: "json",
        success: function (t) {
            $("#txtCode_" + e).val(t);
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function addaccountdbt(t) {
    var e = $("#headoption").val(),
        a = $("#debtAccVoucher tbody tr").length + 1,
        l = 0;
    if (500 == a) alert("You have reached the limit of adding " + a + " inputs");
    else {
        var n = document.createElement("tr");
        l = "cmbCode_" + a;
        ((n = document.createElement("tr")).innerHTML =
            "<td> <select name='cmbCode[]' id='cmbCode_" +
            a +
            "' class='form-control select2' onchange='load_dbtvouchercode(this.value," +
            a +
            ")' required></select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_" +
            a +
            "' ></td><td><input type='text' name='txtAmount[]' class='form-control total_price text-right valid_number' id='txtAmount_" +
            a +
            "' onkeyup='dbtvouchercalculation(" +
            a +
            ")' required></td><td><button class='btn btn-danger-soft red' type='button'  onclick='deleteRowdbtvoucher(this)'><i class='far fa-trash-alt'></i></button></td>"),
            document.getElementById(t).appendChild(n),
            document.getElementById(l).focus(),
            $("#cmbCode_" + a).html(e),
            a++,
            $(".select2").select2();
    }
}
function dbtvouchercalculation(t) {
    var e = 0;
    $(".total_price").each(function () {
        isNaN(this.value) || 0 == this.value.length || (e += parseFloat(this.value));
    }),
        $("#grandTotal").val(e.toFixed(2, 2));
}
function deleteRowdbtvoucher(t) {
    if (1 == $("#debtAccVoucher > tbody > tr").length) alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e);
    }
    dbtvouchercalculation();
}
function load_dbtvouchercode(t, e) {
    var a = $("#base_url").val();
    $.ajax({
        url: a + "/account/debitvoucher_code/" + t,
        type: "GET",
        dataType: "json",
        success: function (t) {
            $("#txtCode_" + e).val(t);
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function printRawHtmlCustomerRcv(t) {
    printJS({ printable: t, type: "raw-html", onPrintDialogClose: printJobCompletecrv() });
}
function printJobCompletecrv() {
    setInterval(function () {
        location.reload();
    }, 3e3);
}
function bank_payment(t) {
    if (2 == t) var e = "block";
    else e = "none";
    for (var a = document.getElementsByClassName("bank_div"), l = 0; l < a.length; l++) a[l].style.display = e;
}
function load_customer_code(t) {
    var e = $("#base_url").val();
    $.ajax({
        url: e + "/account/customer_code/" + t,
        type: "GET",
        dataType: "json",
        success: function (t) {
            $("#txtCode").val(t);
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function printRawHtmlmpayment(t) {
    printJS({ printable: t, type: "raw-html", onPrintDialogClose: printJobCompletempayment() });
}
function printJobCompletempayment() {
    setInterval(function () {
        location.reload();
    }, 3e3);
}
function load_manufacturer_code(t) {
    var e = $("#base_url").val();
    $.ajax({
        url: e + "/account/manufacturer_code/" + t,
        type: "GET",
        dataType: "json",
        success: function (t) {
            $("#txtCode").val(t);
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function loadCoaData(t) {
    var e = $("#base_url").val();
    $.ajax({
        url: e + "/account/load_treeform/" + t,
        type: "GET",
        dataType: "json",
        success: function (t) {
            $("#newform").html(t), $("#treeviewmodal").modal("show"), $("#btnSave").hide();
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function newHeaddata(t) {
    var e = $("#base_url").val();
    $.ajax({
        url: e + "/account/new_form/" + t,
        type: "GET",
        dataType: "json",
        success: function (t) {
            console.log(t.rowdata);
            var e = t.headlabel;
            $("#txtHeadCode").val(t.headcode),
                (document.getElementById("txtHeadName").value = ""),
                $("#txtPHead").val(t.rowdata.HeadName),
                $("#txtHeadLevel").val(e),
                $("#btnSave").prop("disabled", !1),
                $("#btnSave").show(),
                $("#btnUpdate").hide();
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function treeSubmit() {
    var t = $("#treeview_form"),
        e = $('[name="csrf_test_name"]').val(),
        a = (t.serialize(), $("#base_url").val()),
        l = $("input[name=txtHeadCode]").val(),
        n = $("input[name=txtHeadName]").val(),
        o = $("input[name=HeadName]").val(),
        i = $("input[name=txtPHead]").val(),
        r = $("input[name=txtHeadLevel]").val(),
        c = $("input[name=txtHeadType]").val(),
        s = $("input[name=IsActive]").val(),
        d = $("input[name=IsTransaction]").val(),
        u = $("input[name=IsGL]").val();
    $.ajax({
        url: a + "/account/add_coa",
        method: "POST",
        dataType: "json",
        data: { txtHeadCode: l, txtHeadName: n, HeadName: o, txtPHead: i, txtHeadLevel: r, txtHeadType: c, IsActive: s, IsTransaction: d, IsGL: u, app_csrf: e },
        success: function (t) {
            1 == t.status ? toastr.success(t.message) : toastr.error(t.exception), $("#treeviewmodal").modal("hide");
        },
        error: function (t) {
            alert("failed!");
        },
    });
}
function readURL(t) {
    if (t.files && t.files[0]) {
        var e = new FileReader();
        (e.onload = function (t) {
            $("#blah").attr("src", t.target.result);
        }),
            e.readAsDataURL(t.files[0]);
    }
}
function userRole(t) {
    var e = $("#base_url").val();
    $.ajax({
        url: e + "/role/check_exist/" + t,
        type: "GET",
        dataType: "json",
        success: function (t) {
            $("#existrole").html(t);
        },
        error: function (t, e, a) {
            $("#existrole").html("<p style='color:red'><?php echo lan('no_role_selected');?></p>");
        },
    });
}
function singout_modal(t) {
    $("#attendance_id").val(t), $("#sign_outmodal").modal("show");
}
function payment_modal(t, e, a, l, n, o) {
    var i = t,
        r = ((e = e), $("#base_url").val()),
        c = $('[name="csrf_test_name"]').val();
    $.ajax({
        url: r + "/payroll/employee_paydata/",
        method: "post",
        dataType: "json",
        data: { sal_id: i, employee_id: e, totalamount: a, app_csrf: c },
        success: function (e) {
            (document.getElementById("employee_name").value = e.Ename),
                (document.getElementById("employee_id").value = e.employee_id),
                (document.getElementById("salType").value = t),
                (document.getElementById("total_salary").value = a),
                (document.getElementById("total_working_minutes").value = l),
                (document.getElementById("working_period").value = n),
                (document.getElementById("salary_month").value = o),
                $("#paymentModal").modal("show");
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function employechange(t) {
    var e = $("#base_url").val(),
        a = $('[name="csrf_test_name"]').val();
    $.ajax({
        url: e + "/payroll/employee_basic_info/",
        method: "post",
        dataType: "json",
        data: { employee_id: t, app_csrf: a },
        success: function (t) {
            var e;
            (document.getElementById("basic").value = t.rate),
                (document.getElementById("sal_type").value = t.rate_type),
                (document.getElementById("sal_type_name").value = t.stype),
                (document.getElementById("grsalary").value = t.rate),
                1 == t.rate_type
                    ? ((document.getElementById("taxinput").disabled = !0), (document.getElementById("taxmanager").checked = !0), document.getElementById("taxmanager").setAttribute("disabled", "disabled"))
                    : ((document.getElementById("taxinput").disabled = !1), (document.getElementById("taxmanager").checked = !1), document.getElementById("taxmanager").removeAttribute("disabled"));
            var a = $("#add tr").length;
            for (e = 0; e < a; e++) $("#add_" + e).val("");
        },
        error: function (t, e, a) {
            alert("Error get data from ajax");
        },
    });
}
function summary() {
    var t = 0;
    $(".addamount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (t += parseFloat(this.value));
    }),
        t > 100 && alert("You Can Not input more than 100%");
    var e = parseInt($("#basic").val()),
        a = 0,
        l = 0;
    $(".addamount").each(function () {
        var t = this.value,
            e = parseInt($("#basic").val());
        isNaN((t * e) / 100) || 0 == ((t * e) / 100).length || (a += parseFloat((t * e) / 100));
    }),
        $(".deducamount").each(function () {
            var t = this.value,
                e = parseInt($("#basic").val());
            isNaN((t * e) / 100) || 0 == ((t * e) / 100).length || (l += parseFloat((t * e) / 100));
        }),
        (document.getElementById("grsalary").value = a + e - l);
}
function handletax(t) {
    var e = 0,
        a = 0,
        l = parseInt($("#basic").val());
    $(".deducamount").each(function () {
        var t = this.value,
            a = parseInt($("#basic").val());
        isNaN((t * a) / 100) || 0 == ((t * a) / 100).length || (e += parseFloat((t * a) / 100));
    }),
        $(".addamount").each(function () {
            var t = this.value,
                e = parseInt($("#basic").val());
            isNaN((t * e) / 100) || 0 == ((t * e) / 100).length || (a += parseFloat((t * e) / 100));
        });
    var n = l - e,
        o = (parseInt($("#taxinput").val()), $("#base_url").val()),
        i = $('[name="csrf_test_name"]').val();
    if (1 == t.checked)
        $.ajax({
            url: o + "/payroll/tax_handle",
            method: "post",
            dataType: "json",
            data: { amount: n, app_csrf: i },
            success: function (t) {
                (document.getElementById("grsalary").value = a + l - t - e), (document.getElementById("taxinput").value = "");
            },
            error: function (t, e, a) {
                alert("Error get data from ajax");
            },
        });
    else {
        (l = parseInt($("#basic").val())), (a = 0), (e = 0);
        $(".addamount").each(function () {
            var t = this.value,
                e = parseInt($("#basic").val());
            isNaN((t * e) / 100) || 0 == ((t * e) / 100).length || (a += parseFloat((t * e) / 100));
        }),
            $(".deducamount").each(function () {
                var t = this.value,
                    a = parseInt($("#basic").val());
                isNaN((t * a) / 100) || 0 == ((t * a) / 100).length || (e += parseFloat((t * a) / 100));
            }),
            (document.getElementById("grsalary").value = a + l - e);
    }
}
function CustomerListInvoice(t) {
    var e = $("#base_url").val(),
        a = $('[name="csrf_test_name"]').val(),
        l = {
            minLength: 0,
            source: function (t, l) {
                var n = $("#customer_name").val();
                $.ajax({
                    url: e + "/invoice/search_customer",
                    method: "POST",
                    dataType: "json",
                    data: { term: t.term, customer_name: n, app_csrf: a },
                    success: function (t) {
                        l(t);
                    },
                });
            },
            focus: function (t, e) {
                return $(this).val(e.item.label), !1;
            },
            select: function (t, e) {
                $(this).parent().parent().find("#customer_id").val(e.item.value);
                var a = e.item.value;
                return $(this).unbind("change"), customer_due(a), !1;
            },
        };
    $("body").on("keypress.autocomplete", "#customer_name", function () {
        $(this).autocomplete(l);
    });
}
function bank_payment(t) {
    if (2 == t) var e = "block";
    else e = "none";
    for (var a = document.getElementsByClassName("bank_div"), l = 0; l < a.length; l++) a[l].style.display = e;
}
function addInputFieldInvoice(t) {
    for (var e = $("#normalinvoice tbody tr").length + 1, a = $("#txfieldnum").val(), l = "", n = 0; n < a; n++) {
        l += '<input id="total_tax' + n + "_" + e + '" class="total_tax' + n + "_" + e + ' valid_number" type="hidden"><input id="all_tax' + n + "_" + e + '" class="total_tax' + n + '" type="hidden" name="tax[]">';
    }
    if (500 == e) alert("You have reached the limit of adding " + e + " inputs");
    else {
        var o = "product_name_" + e,
            i = 5 * e,
            r = document.createElement("tr"),
            c = i + 1,
            s = i + 2,
            d = i + 3,
            u = i + 4,
            m = i + 5,
            p = i + 6,
            _ = i + 7,
            v = i + 8,
            f = i + 9,
            h = i + 10,
            x = i + 11;
        (r.innerHTML =
            "<td><input type='text' name='product_name' onkeyup='invoice_productList(" +
            e +
            ")' onkeypress='invoice_productList(" +
            e +
            ")' class='form-control productSelection' placeholder='Medicine Name' id='" +
            o +
            "' required tabindex='" +
            c +
            "'><input type='hidden' class='autocomplete_hidden_value  product_id_" +
            e +
            "' name='product_id[]' id='product_id_" +
            e +
            "'/></td><td><select class='form-control select2' required id='batch_id_" +
            e +
            "'  name='batch_id[]' onchange='product_stock_invoice(" +
            e +
            ")' tabindex='" +
            s +
            "'><option></option></select>     <td><input type='text' name='available_quantity[]' id='available_quantity_" +
            e +
            "' class='form-control text-right available_quantity_" +
            e +
            "' value='0' readonly='readonly' /></td> <td id='expire_date_" +
            e +
            "'></td><td><input class='form-control text-right unit_" +
            e +
            " valid' value='None' readonly='' aria-invalid='false' type='text'></td><td> <input type='text' name='product_quantity[]' onkeyup='quantity_calculate_invoice(" +
            e +
            "),checkqty_invoice(" +
            e +
            ");' onchange='quantity_calculate_invoice(" +
            e +
            ");' id='total_qntt_" +
            e +
            "' class='total_qntt_" +
            e +
            " form-control text-right valid_number' placeholder='0.00' min='0' tabindex='" +
            d +
            "' required/></td><td><input type='text' name='box_quantity[]' onkeyup='quantity_calculate_invoice(" +
            e +
            "),checkqty_invoice(" +
            e +
            ");' onchange='quantity_calculate_invoice(" +
            e +
            ");' class='form-control text-right' id='box_qty_" +
            e +
            "' placeholder='0.00' min='0'  readonly='' /><input type='hidden' id='u_box_" +
            e +
            "' name='b_qty'/></td><td><input type='text' name='product_rate[]' onkeyup='quantity_calculate_invoice(" +
            e +
            "),checkqty_invoice(" +
            e +
            ");' onchange='quantity_calculate_invoice(" +
            e +
            ");' id='price_item_" +
            e +
            "' class='price_item" +
            e +
            " form-control text-right valid_number' required placeholder='0.00'  min='0' tabindex='" +
            u +
            "'/></td><td><input type='text' name='discount[]' onkeyup='quantity_calculate_invoice(" +
            e +
            "),checkqty_invoice(" +
            e +
            ");' onchange='quantity_calculate_invoice(" +
            e +
            ");' id='discount_" +
            e +
            "' class='form-control text-right valid_number' placeholder='0.00' min='0' tabindex='" +
            m +
            "' /><input type='hidden' value='' name='discount_type' id='discount_type_" +
            e +
            "'></td><td class='text-right'><input class='total_price form-control text-right' type='text' name='total_price[]' id='total_price_" +
            e +
            "' value='0.00' readonly='readonly'/></td><td>" +
            l +
            "<input type='hidden' id='all_discount_" +
            e +
            "' class='total_discount dppr'/><a tabindex='" +
            p +
            "' style='text-align: right;' class='btn btn-danger-soft'  value='Delete' onclick='deleteRowinvoice(this)'><i class='far fa-trash-alt'></i></a></td>"),
            document.getElementById(t).appendChild(r),
            document.getElementById(o).focus(),
            document.getElementById("add_invoice_item").setAttribute("tabindex", _),
            $(".select2").select2(),
            document.getElementById("invdcount").setAttribute("tabindex", v),
            document.getElementById("paidAmount").setAttribute("tabindex", f),
            document.getElementById("full_paid_invoice_tab").setAttribute("tabindex", h),
            document.getElementById("add_invoice").setAttribute("tabindex", x),
            e++;
    }
}
function deleteRowinvoice(t) {
    if (1 == $("#normalinvoice > tbody > tr").length) alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e), calculateSumInvoice(), invoice_paidamount();
    }
}
function invoice_productList(t) {
    var e = "price_item" + t,
        a = $("#base_url").val(),
        l = "unit_" + t,
        n = "batch_id_" + t,
        o = $('[name="csrf_test_name"]').val(),
        i = {
            minLength: 0,
            source: function (e, l) {
                var n = $("#product_name_" + t).val();
                $.ajax({
                    url: a + "/invoice/search_medicine",
                    method: "post",
                    dataType: "json",
                    data: { term: e.term, product_name: n, app_csrf: o },
                    success: function (t) {
                        l(t);
                    },
                });
            },
            focus: function (t, e) {
                return $(this).val(e.item.label), !1;
            },
            select: function (a, i) {
                $(this).parent().parent().find(".autocomplete_hidden_value").val(i.item.value), $(this).val(i.item.label);
                var r = i.item.value,
                    c = "u_box_" + t,
                    s = $(".baseUrl").val(),
                    d = "available_quantity_" + t;
                return (
                    $.ajax({
                        type: "POST",
                        url: s + "/invoice/medicine_details_data",
                        data: { product_id: r, app_csrf: o },
                        cache: !1,
                        success: function (a) {
                            for (var o = jQuery.parseJSON(a), i = 0; i < o.txnmber; i++) {
                                var r = o.taxdta[i];
                                $("." + ("total_tax" + i + "_" + t)).val(r);
                            }
                            $("." + e).val(o.price), $("." + l).val(o.unit), $("#" + n).html(o.batch), $("#" + c).val(o.box_qty), $("#" + d).val(o.total_product), quantity_calculate_invoice(t);
                        },
                    }),
                    $(this).unbind("change"),
                    !1
                );
            },
        };
    $("body").on("keypress.autocomplete", ".productSelection", function () {
        $(this).autocomplete(i);
    });
}
function product_stock_invoice(t) {
    var e = $("#batch_id_" + t).val(),
        a = $("#product_id_" + t).val(),
        l = "available_quantity_" + t,
        n = "expire_date_" + t,
        o = $("#base_url").val(),
        i = $('[name="csrf_test_name"]').val();
    return (
        $.ajax({
            type: "POST",
            url: o + "/invoice/get_batch_stock",
            data: { batch_id: e, product_id: a, app_csrf: i },
            cache: !1,
            success: function (e) {
                var a = JSON.parse(e);
                if ((o = (r = new Date()).getDate()) < 10) var o = "0" + o;
                if ((i = r.getMonth() + 1) < 10) var i = "0" + i;
                var r = r.getFullYear() + "-" + i + "-" + o;
                new Date(r) >= new Date(a.expire_date)
                    ? (toastr.error("Date Expired Please Select another"),
                      ($("#batch_id_" + t)[0].selectedIndex = 0),
                      $("#" + n).html('<p style="color:red;align:center">' + a.expire_date + "</p>"),
                      (document.getElementById("expire_date_" + t).innerHTML = ""))
                    : $("#" + n).html('<p style="color:green;align:center">' + a.expire_date + "</p>"),
                    $("#" + l).val(a.total_product);
            },
        }),
        $(this).unbind("change"),
        !1
    );
}
function quantity_calculate_invoice(t) {
    var e = $("#total_qntt_" + t).val(),
        a = $("#price_item_" + t).val(),
        l = $("#discount_" + t).val(),
        n = ($("#invdcount").val(), e / $("#u_box_" + t).val());
    $("#box_qty_" + t).val(n);
    var o = $("#total_tax_" + t).val(),
        i = ($("#total_discount_" + t).val(), $("#discount_type").val()),
        r = $("#txfieldnum").val(),
        c = $("#available_quantity_" + t).val();
    if (parseInt(e) > parseInt(c)) {
        var s = "You can Sale maximum " + c + " Items";
        $("#total_qntt_" + t).val("");
        e = 0;
        alert(s), $("#total_price_" + t).val(0);
        for (var d = 0; d < r; d++) $("#all_tax" + d + "_" + t).val(0);
    }
    if (e > 0 || l > 0) {
        if (1 == i) {
            var u = ((_ = e * a) * l) / 100;
            $("#all_discount_" + t).val(u);
            var m = _ - u;
            $("#total_price_" + t).val(m.toFixed(2, 2));
            for (d = 0; d < r; d++) {
                var p = m * $("#total_tax" + d + "_" + t).val();
                Number(p), $("#all_tax" + d + "_" + t).val(p);
            }
        } else if (2 == i) {
            var _ = e * a;
            u = l * e;
            $("#all_discount_" + t).val(u);
            m = _ - u;
            $("#total_price_" + t).val(m.toFixed(2, 2));
            for (d = 0; d < r; d++) {
                p = m * $("#total_tax" + d + "_" + t).val();
                Number(p), $("#all_tax" + d + "_" + t).val(p);
            }
        } else if (3 == i) {
            var v = e * a;
            u = l;
            $("#all_discount_" + t).val(u);
            _ = v - u;
            $("#total_price_" + t).val(_.toFixed(2, 2));
            for (d = 0; d < r; d++) {
                p = _ * $("#total_tax" + d + "_" + t).val();
                Number(p), $("#all_tax" + d + "_" + t).val(p);
            }
        }
    } else {
        var f = e * a,
            h = e * a * o;
        $("#total_price_" + t).val(f), $("#all_tax_" + t).val(h);
    }
    calculateSumInvoice(), invoice_paidamount();
}
function calculateSumInvoice() {
    document.getElementById("change").value = "";
    for (var t, e, a, l = $("#txfieldnum").val(), n = 0, o = 0, i = 0, r = 0, c = $("#invdcount").val(), s = 0; s < l; s++) {
        var d = 0;
        $(".total_tax" + s).each(function () {
            isNaN(this.value) || 0 == this.value.length || (d += parseFloat(this.value));
        }),
            $("#total_tax_amount" + s).val(d.toFixed(2, 2));
    }
    $(".total_discount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (i += parseFloat(this.value));
    }),
        $("#total_discount_ammount").val(i.toFixed(2, 2)),
        $("#total_product_dis").val(i),
        $(".totalTax").each(function () {
            isNaN(this.value) || 0 == this.value.length || (o += parseFloat(this.value));
        }),
        $("#total_tax_amount").val(o.toFixed(2, 2)),
        $(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (n += parseFloat(this.value));
        }),
        $(".dppr").each(function () {
            isNaN(this.value) || 0 == this.value.length || (r += parseFloat(this.value));
        }),
        (0).toFixed(2, 2),
        (t = n.toFixed(2, 2));
    var u = +(e = o.toFixed(2, 2)) + +t - (a = i.toFixed(2, 2)) - c + +r,
        m = $("#total_product_dis").val();
    if ((p = +m + +c) > parseFloat(n)) {
        toastr.error("Discount Can not Greater than Total Amount"), $("#invdcount").val(0);
        u = +e + +t - a + +r;
        var p = m;
    } else u = +e + +t - a - c + +r;
    $("#grandTotal").val(u.toFixed(2, 2)), $("#total_discount_ammount").val(p.toFixed(2, 2));
    var _ = $("#previous").val(),
        v = +$("#grandTotal").val() + +_;
    $("#n_total").val(v.toFixed(2, 2)), invoice_paidamount();
}
function invoice_paidamount() {
    var t = 0,
        e = $("#n_total").val(),
        a = $("#paidAmount").val(),
        l = e - a;
    (t = a - e), l > 0 ? $("#dueAmmount").val(l.toFixed(2, 2)) : ($("#dueAmmount").val(0), $("#change").val(t.toFixed(2, 2)));
}
function full_paid_invoice() {
    var t = $("#n_total").val();
    $("#paidAmount").val(t), invoice_paidamount(), calculateSumInvoice();
}
function invoice_discount() {
    var t = $("#n_total").val() - $("#invdcount").val();
    $("#total_discount_ammount").val(t.toFixed(2, 2)), $("#invtotal").val(t.toFixed(2, 2)), $("#dueAmmount").val(t.toFixed(2, 2));
}
function checkqty_invoice(t) {
    var e = $("#total_qntt_" + t).val(),
        a = $("#price_item_" + t).val(),
        l = $("#discount_" + t).val();
    return isNaN(e)
        ? (alert("must_input_numbers"), (document.getElementById("total_qntt_" + t).value = ""), !1)
        : isNaN(a)
        ? (alert("must_input_numbers"), (document.getElementById("price_item_" + t).value = ""), !1)
        : isNaN(l)
        ? (alert("must_input_numbers"), (document.getElementById("discount_" + t).value = ""), !1)
        : void 0;
}
function printRawHtmlInvoice(t) {
    printJS({ printable: t, type: "raw-html", onPrintDialogClose: printJobCompleteInvoice() });
}
function printJobCompleteInvoice() {
    $("#normalinvoice tbody tr").remove(),
        setInterval(function () {
            location.reload();
        }, 1e3);
}
function detailsmodal(t, e, a, l, n, o) {
    $("#detailsmodal").modal("show");
    var i = document.getElementById("base_url").value;
    if ("" != n) n = n;
    else n = "/assets/dist/img/products/product.png";
    var r = document.getElementById("available_quantity_" + o).value;
    (document.getElementById("modal_productname").innerHTML = t),
        (document.getElementById("modal_productstock").innerHTML = r),
        (document.getElementById("modal_productmodel").innerHTML = e),
        (document.getElementById("modal_productunit").innerHTML = a),
        (document.getElementById("modal_productprice").innerHTML = l),
        (document.getElementById("modalimg").innerHTML = '<img src="' + i + "/" + n + '" alt="image" style="width:100px; height:60px;" />');
}
function CustomerList_pos(t) {
    var e = $("#base_url").val(),
        a = $('[name="csrf_test_name"]').val(),
        l = {
            minLength: 0,
            source: function (t, l) {
                var n = $("#customer_name").val();
                $.ajax({
                    url: e + "/invoice/search_customer",
                    method: "POST",
                    dataType: "json",
                    data: { customer_name: n, app_csrf: a },
                    success: function (t) {
                        l(t);
                    },
                });
            },
            focus: function (t, e) {
                return $(this).val(e.item.label), !1;
            },
            select: function (t, e) {
                $(this).parent().parent().find("#customer_id").val(e.item.value);
                var a = e.item.value;
                return $(this).unbind("change"), customer_due(a), !1;
            },
        };
    $("body").on("keypress.autocomplete", "#customer_name", function () {
        $(this).autocomplete(l);
    });
}
function onselectimage(t) {
    var e = t,
        a = $("#product_id_" + e).val(),
        l = $("#total_qntt_" + e).val(),
        n = parseInt(l) + 1,
        o = $("#base_url").val(),
        i = $('[name="csrf_test_name"]').val();
    e == a
        ? ($("#total_qntt_" + e).val(n), quantity_calculate_pos(e), calculateSum_pos(), invoice_paidamount(), image_activation(e), (document.getElementById("add_item").value = ""), document.getElementById("add_item").focus())
        : $.ajax({
              type: "post",
              async: !1,
              url: o + "/invoice/get_posdata",
              data: { product_id: e, app_csrf: i },
              success: function (t) {
                  0 == t
                      ? (alert("This Product Not Found !"),
                        (document.getElementById("add_item").value = ""),
                        document.getElementById("add_item").focus(),
                        $(".select2").select2(),
                        quantity_calculate_pos(e),
                        calculateSum_pos(),
                        invoice_paidamount())
                      : ($("#hidden_tr").css("display", "none"),
                        (document.getElementById("add_item").value = ""),
                        document.getElementById("add_item").focus(),
                        $("#normalinvoice tbody").append(t),
                        calculateSum_pos(),
                        invoice_paidamount(),
                        image_select(e),
                        $("input[name='product_quantity[]']").TouchSpin({ verticalbuttons: !0 }),
                        $(".select2").select2());
              },
              error: function () {
                  alert("Request Failed, Please check your code and try again!");
              },
          });
}
function product_stock_pos(t) {
    var e = $("#batch_id_" + t).val(),
        a = $("#product_id_" + t).val(),
        l = "available_quantity_" + t,
        n = "expire_date_" + t,
        o = $("#base_url").val(),
        i = $('[name="csrf_test_name"]').val();
    return (
        $.ajax({
            type: "POST",
            url: o + "/invoice/get_batch_stock",
            data: { batch_id: e, product_id: a, app_csrf: i },
            cache: !1,
            success: function (e) {
                var a = JSON.parse(e);
                if ((o = (r = new Date()).getDate()) < 10) var o = "0" + o;
                if ((i = r.getMonth() + 1) < 10) var i = "0" + i;
                var r = r.getFullYear() + "-" + i + "-" + o;
                new Date(r) >= new Date(a.expire_date)
                    ? (toastr.error("Date Expired Please Select another"),
                      ($("#batch_id_" + t)[0].selectedIndex = 0),
                      $("#" + n).html('<p style="color:red;align:center">' + a.expire_date + "</p>"),
                      (document.getElementById("expire_date_" + t).innerHTML = ""))
                    : $("#" + n).html('<p style="color:green;align:center">' + a.expire_date + "</p>"),
                    $("#" + l).val(a.total_product);
            },
        }),
        $(this).unbind("change"),
        !1
    );
}
function image_select(t) {
    var e = $("#total_qntt_" + t).val();
    $("#image-active_" + t).addClass("active"), $("#image-active_count_" + t).addClass("quantity");
    $("#active_pro_" + t).text(e);
}
function image_activation(t) {
    if ("Select Batch" == $("#batch_id_" + t).val()) {
        return toastr.error("Please Select Batch"), (e = $("#total_qntt_" + t).val(0)), !1;
    }
    var e = $("#total_qntt_" + t).val();
    $("#image-active_" + t).addClass("active"), $("#image-active_count_" + t).addClass("quantity");
    $("#active_pro_" + t).text(e);
}
function quantity_calculate_pos(t) {
    var e = $("#total_qntt_" + t).val(),
        a = $("#price_item_" + t).val(),
        l = $("#discount_" + t).val(),
        n = ($("#invdcount").val(), e / $("#u_box_" + t).val());
    $("#box_qty_" + t).val(n);
    var o = $("#total_tax_" + t).val(),
        i = ($("#total_discount_" + t).val(), $("#discount_type").val()),
        r = $("#txfieldnum").val(),
        c = $("#batch_id_" + t).val(),
        s = $("#available_quantity_" + t).val();
    if (parseInt(e) > parseInt(s)) {
        if ("" == c) var d = "Please Select Batch";
        else d = "You can Sale maximum " + s + " Items";
        $("#total_qntt_" + t).val(0);
        e = 0;
        toastr.error(d), $("#total_price_" + t).val(0);
        for (var u = 0; u < r; u++) $("#all_tax" + u + "_" + t).val(0);
    }
    if (e > 0 || l > 0) {
        if (1 == i) {
            var m = (+(v = e * a) * l) / 100;
            $("#all_discount_" + t).val(m);
            var p = v - m;
            $("#total_price_" + t).val(p.toFixed(2, 2));
            for (u = 0; u < r; u++) {
                var _ = p * $("#total_tax" + u + "_" + t).val();
                Number(_), $("#all_tax" + u + "_" + t).val(_);
            }
        } else if (2 == i) {
            var v = e * a;
            m = l * e;
            $("#all_discount_" + t).val(m);
            p = v - m;
            $("#total_price_" + t).val(p.toFixed(2, 2));
            for (u = 0; u < r; u++) {
                _ = p * $("#total_tax" + u + "_" + t).val();
                Number(_), $("#all_tax" + u + "_" + t).val(_);
            }
        } else if (3 == i) {
            var f = e * a;
            m = l;
            $("#all_discount_" + t).val(m);
            v = f - m;
            $("#total_price_" + t).val(v.toFixed(2, 2));
            for (u = 0; u < r; u++) {
                _ = v * $("#total_tax" + u + "_" + t).val();
                Number(_), $("#all_tax" + u + "_" + t).val(_);
            }
        }
    } else {
        var h = e * a,
            x = e * a * o;
        $("#total_price_" + t).val(h), $("#all_tax_" + t).val(x);
    }
    calculateSum_pos();
}
function check_category(t) {
    var e = $('[name="csrf_test_name"]').val(),
        a = $("#base_url").val() + "/invoice/get_item_by_category";
    $.ajax({
        type: "post",
        async: !1,
        url: a,
        data: { category_id: t, app_csrf: e },
        success: function (t) {
            $("#product_search").html(t);
        },
        error: function () {
            alert("Request Failed, Please check your code and try again!");
        },
    });
}
function calculateSum_pos() {
    document.getElementById("change").value = "";
    for (var t, e, a, l = $("#txfieldnum").val(), n = 0, o = 0, i = 0, r = 0, c = $("#invdcount").val(), s = 0; s < l; s++) {
        var d = 0;
        $(".total_tax" + s).each(function () {
            isNaN(this.value) || 0 == this.value.length || (d += parseFloat(this.value));
        }),
            $("#total_tax_amount" + s).val(d.toFixed(2, 2));
    }
    $(".total_discount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (i += parseFloat(this.value));
    }),
        $("#total_discount_ammount").val(i.toFixed(2, 2)),
        $("#total_product_dis").val(i),
        $(".totalTax").each(function () {
            isNaN(this.value) || 0 == this.value.length || (o += parseFloat(this.value));
        }),
        $("#total_tax_amount").val(o.toFixed(2, 2)),
        $(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (n += parseFloat(this.value));
        }),
        $(".dppr").each(function () {
            isNaN(this.value) || 0 == this.value.length || (r += parseFloat(this.value));
        }),
        (0).toFixed(2, 2),
        (t = n.toFixed(2, 2));
    var u = +(e = o.toFixed(2, 2)) + +t - (a = i.toFixed(2, 2)) - c + +r,
        m = $("#total_product_dis").val();
    if ((p = +m + +c) > parseFloat(n)) {
        toastr.error("Discount Can not Greater than Total Amount"), $("#invdcount").val(0);
        u = +e + +t - a + +r;
        var p = m;
    } else u = +e + +t - a - c + +r;
    $("#grandTotal").val(u.toFixed(2, 2)), $("#total_discount_ammount").val(p.toFixed(2, 2));
    var _ = $("#previous").val(),
        v = +$("#grandTotal").val() + +_;
    $("#n_total").val(v.toFixed(2, 2)), $("#net_total_text").text(v.toFixed(2, 2)), invoice_paidamount();
}
function checkqty(t) {}
function invoice_paidamount() {
    var t = 0,
        e = $("#n_total").val(),
        a = $("#paidAmount").val(),
        l = e - a;
    t = a - e;
    l > 0
        ? ($("#dueAmmount").val(l.toFixed(2, 2)), $("#due_text").text(l.toFixed(2, 2)), $("#due_amount").val(l.toFixed(2, 2)), $("#change").val((0).toFixed(2, 2)))
        : ($("#dueAmmount").val(0), $("#due_text").text((0).toFixed(2, 2)), $("#due_amount").val(0), $("#change").val(t.toFixed(2, 2)));
}
function full_paid() {
    var t = $("#n_total").val();
    $("#paidAmount").val(t), invoice_paidamount(), calculateSum_pos();
}
function deleteRow(t, e) {
    if (1 == $("#normalinvoice > tbody > tr").length) alert("There only one row you can't delete.");
    else {
        var a = t.parentNode.parentNode;
        a.parentNode.removeChild(a), image_inaactivation(e), calculateSum_pos(), invoice_paidamount();
    }
}
function customer_due(t) {
    var e = $("#base_url").val(),
        a = $('[name="csrf_test_name"]').val();
    $.ajax({
        url: e + "/invoice/customer_previous",
        type: "post",
        data: { customer_id: t, app_csrf: a },
        success: function (t) {
            $("#previous").val(t);
        },
        error: function (t, e, a) {
            alert("failed");
        },
    });
}
function image_inaactivation(t) {
    $("#total_qntt_" + t).val();
    $("#image-active_" + t).removeClass("active"), $("#image-active_count_" + t).removeClass("quantity");
    $("#active_pro_" + t).text("");
}
function printRawHtml_pos(t) {
    printJS({ printable: t, type: "raw-html", onPrintDialogClose: printJobComplete_pos() });
}
function printJobComplete_pos() {
    $("#normalinvoice tbody tr").remove(), $("#pos_sale_insert").trigger("reset");
}
function bankpayment(t) {
    $("#bank_id").val(t), $("#payment_type").val(2);
}
function bankpayment_submit() {
    if ("" == $("#bank_id").val()) return toastr.error("Please Select Bank"), !1;
    $("#bank_info_div").modal("hide"), $("#pos_sale_insert").trigger("submit");
}
function add_purchaseRow(t) {
    var e = $("#leaf_type_dropdown").val(),
        a = $("#purchaseTable tbody tr").length + 1,
        l = document.createElement("tr"),
        n = "product_name_" + a,
        o = 7 * a,
        i = o + 1,
        r = o + 2,
        c = o + 3,
        s = o + 4,
        d = o + 5,
        u = o + 6,
        m = o + 7,
        p = o + 8,
        _ = p + 1,
        v = _ + 1,
        f = v + 1,
        h = f + 1,
        x = h + 1,
        b = x + 1;
    ((l = document.createElement("tr")).innerHTML =
        '<td class="span3 manufacturer"><input type="text" name="product_name"  class="form-control product_name productSelection" onkeypress="product_list_purchase(' +
        a +
        ')" placeholder="Medicine Name" id="product_name_' +
        a +
        '" tabindex="' +
        i +
        '" required> <input type="hidden" class="autocomplete_hidden_value product_id_' +
        a +
        '" name="product_id[]" id="SchoolHiddenId"/>  <input type="hidden" class="sl" value="' +
        a +
        '">  </td> <td> <input type="text"  name="batch_id[]" id="batch_id_' +
        a +
        '" tabindex="' +
        r +
        '" class="form-control text-right"  tabindex="11" placeholder="Batch Id" /></td><td><input type="text" name="expeire_date[]" onchange="checkExpiredate(' +
        a +
        ')" id="expeire_date_' +
        a +
        '"  class="form-control datepicker" tabindex="' +
        c +
        '" required  placeholder="Expire Date"/> </td>  <td class="wt"> <input type="text" id="available_quantity_' +
        a +
        '" class="form-control text-right stock_ctn_' +
        a +
        '" placeholder="0.00" readonly/> </td><td><select name="leaf_type[]" class="form-control select2" id="leaf_type_' +
        a +
        '" onchange="purchase_calculation(' +
        a +
        "),checkqty(" +
        a +
        ')" required  tabindex="' +
        s +
        '"></select></td> <td class="text-right"><input type="text" name="box_quantity[]" id="box_quantity_' +
        a +
        '" class="form-control text-right valid_number" onkeyup="purchase_calculation(' +
        a +
        "),checkqty(" +
        a +
        ')" onchange="purchase_calculation(' +
        a +
        ')" placeholder="0.00" value="" min="0"  required="required" tabindex="' +
        d +
        '"/></td><td class="text-right"><input type="text" name="product_quantity[]"  required  id="quantity_' +
        a +
        '" class="form-control text-right store_cal_' +
        a +
        '" onkeyup="purchase_calculation(' +
        a +
        "),checkqty(" +
        a +
        ');" onchange="purchase_calculation(' +
        a +
        ')" placeholder="0.00" value="" min="0" readonly/> <input type="hidden" name="unit_qty[]" id="unit_qty_' +
        a +
        '">  </td><td class="test"><input type="text" name="product_rate[]"  required onkeyup="purchase_calculation(' +
        a +
        "),checkqty(" +
        a +
        ');" onchange="purchase_calculation(' +
        a +
        ');" id="product_rate_' +
        a +
        '" class="form-control product_rate_' +
        a +
        ' text-right valid_number" placeholder="0.00" value="" min="0" tabindex="' +
        u +
        '"/></td><td><input type="text" class="form-control valid_number" name="mrp[]" required id="mrp_' +
        a +
        '" tabindex="' +
        m +
        '"></td><td class="text-right"><input class="form-control total_price text-right total_price_' +
        a +
        '" type="text" name="total_price[]" id="total_price_' +
        a +
        '" value="0.00" readonly="readonly" /> </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button type="button" class="btn btn-danger-soft" tabindex="' +
        p +
        '" onclick="deleteRow(this)"><i class="far fa-trash-alt"></i></button></td>'),
        document.getElementById(t).appendChild(l),
        document.getElementById(n).focus(),
        $("#leaf_type_" + a).html(e),
        $(".select2").select2(),
        document.getElementById("add_invoice_item").setAttribute("tabindex", _),
        document.getElementById("vat").setAttribute("tabindex", v),
        document.getElementById("discount").setAttribute("tabindex", f),
        document.getElementById("full_paid_purchase_tab").setAttribute("tabindex", h),
        document.getElementById("paid_amount").setAttribute("tabindex", x),
        document.getElementById("save_purchase").setAttribute("tabindex", b),
        a++,
        $(".datepicker").datepicker({ dateFormat: "yy-mm-dd" });
}
function deleteRow(t) {
    if (1 == $("#purchaseTable > tbody > tr").length) alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e);
    }
}
function disoucnt_calculation() {
    var t = 0,
        e = parseFloat($("#sub_total").val());
    if (
        ($(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (t += parseFloat(this.value));
        }),
        (a = $("#vat").val()) > 0)
    )
        var a = a;
    else a = 0;
    var l = $("#discount").val();
    if (l > e) {
        toastr.error("Discount Can not Greater than Total Amount"), $("#discount").val(0);
        var n = +t + +a;
    } else n = +t + +a - l;
    $("#grandTotal").val(n);
}
function purchase_vatcalculation() {
    var t = $("#vat").val(),
        e = $("#discount").val(),
        a = parseFloat($("#sub_total").val());
    if (e > 0) e = e;
    else e = 0;
    if (t > 0) t = t;
    else t = 0;
    var l = $("#sub_total").val();
    if (t > a) {
        toastr.error("VAT Can not Greater than Total Amount"), $("#vat").val(0);
        var n = +l - e;
    } else n = +l + +t - e;
    $("#grandTotal").val(n.toFixed(2, 2)), paid_calculation();
}
function paid_calculation() {
    var t = $("#paid_amount").val(),
        e = $("#grandTotal").val(),
        a = parseFloat(e) - t;
    $("#due_amount").val(a), disoucnt_calculation();
}
function product_list_purchase(t) {
    var e = $('[name="csrf_test_name"]').val(),
        a = $("#manufacturer_id").val(),
        l = $("#base_url").val();
    if (0 == a) return toastr.error("Please Select manufacturer !"), !1;
    var n = {
        minLength: 0,
        source: function (n, o) {
            var i = $("#product_name_" + t).val();
            $.ajax({
                url: l + "/purchase/product_search_bymanufacturer",
                method: "POST",
                dataType: "json",
                data: { term: n.term, manufacturer_id: a, product_name: i, app_csrf: e },
                success: function (t) {
                    o(t);
                },
            });
        },
        focus: function (t, e) {
            return $(this).val(e.item.label), !1;
        },
        select: function (t, a) {
            $(this).parent().parent().find(".autocomplete_hidden_value").val(a.item.value);
            var l = $(this).parent().parent().find(".sl").val(),
                n = a.item.value,
                o = $("#manufacturer_id").val(),
                i = $("#base_url").val(),
                r = "unit_qty_" + l,
                c = "available_quantity_" + l,
                s = "product_rate_" + l,
                d = "mrp_" + l;
            return (
                $.ajax({
                    type: "POST",
                    url: i + "/purchase/product_details_by_id",
                    data: { product_id: n, manufacturer_id: o, app_csrf: e },
                    cache: !1,
                    success: function (t) {
                        var e = JSON.parse(t);
                        $("#" + c).val(e.total_product), $("#" + s).val(e.manufacturer_price), $("#" + r).val(e.box_qty), $("#" + d).val(e.mrp);
                    },
                }),
                $(this).unbind("change"),
                !1
            );
        },
    };
    $("body").on("keypress.autocomplete", ".product_name", function () {
        $(this).autocomplete(n);
    });
}
function purchase_calculation(t) {
    var e = 0,
        a = ($("#unit_qty_" + t).val(), $("#box_quantity_" + t).val()),
        l = $("#leaf_type_" + t).val() * a;
    $("#quantity_" + t).val(l);
    var n = $("#box_quantity_" + t).val() * $("#product_rate_" + t).val();
    $("#total_price_" + t).val(n.toFixed(2)),
        $(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (e += parseFloat(this.value));
        }),
        $("#sub_total").val(e.toFixed(2, 2)),
        $("#grandTotal").val(e.toFixed(2, 2)),
        purchase_vatcalculation();
}
function checkExpiredate(t) {
    var e = $("#purdate").val(),
        a = $("#expeire_date_" + t).val(),
        l = new Date(e);
    return !(new Date(a) <= l) || (toastr.error("Expiry Date Should Be Greater than Purchase Date"), (document.getElementById("expeire_date_" + t).value = ""), !1);
}
function cashCalculator() {
    var t = 2e3 * $(".text_0").val();
    $(".text_0_bal").val(t);
    var e = 1e3 * $(".text_1").val();
    $(".text_1_bal").val(e);
    var a = 500 * $(".text_2").val();
    $(".text_2_bal").val(a);
    var l = 100 * $(".text_3").val();
    $(".text_3_bal").val(l);
    var n = 200 * $(".text_200").val();
    $(".text_200_bal").val(n);
    var o = 50 * $(".text_4").val();
    $(".text_4_bal").val(o);
    var i = 20 * $(".text_5").val();
    $(".text_5_bal").val(i);
    var r = 10 * $(".text_6").val();
    $(".text_6_bal").val(r);
    var c = 5 * $(".text_7").val();
    $(".text_7_bal").val(c);
    var s = 2 * $(".text_8").val();
    $(".text_8_bal").val(s);
    var d = 1 * $(".text_9").val();
    $(".text_9_bal").val(d);
    var u = t + e + a + l + o + i + r + c + s + d + n;
    $(".total_money").val(u);
}
function quantity_calculate_invoicereturn(t) {
    var e = 0,
        a = 0,
        l = $("#sold_qty_" + t).val(),
        n = $("#total_qntt_" + t).val(),
        o = $("#price_item_" + t).val(),
        i = $("#discount_" + t).val();
    if ((parseInt(l) < parseInt(n) && (alert("Sold quantity less than quantity!"), $("#total_qntt_" + t).val("")), parseInt(n) > 0)) {
        var r = n * o,
            c = r * (i / 100);
        $("#all_discount_" + t).val(c);
        var s = r - $("#all_discount_" + t).val();
        $("#total_price_" + t).val(s),
            $(".total_price").each(function () {
                isNaN(this.value) || 0 == this.value.length || (e += parseFloat(this.value));
            }),
            $("#grandTotal").val(e.toFixed(2, 2)),
            $(".total_discount").each(function () {
                isNaN(this.value) || 0 == this.value.length || (a += parseFloat(this.value));
            }),
            $("#total_discount_ammount").val(a.toFixed(2, 2));
    }
}
function quantity_calculate_invoicereturnSreturn(t) {
    var e = 0,
        a = 0,
        l = $("#sold_qty_" + t).val(),
        n = $("#total_qntt_" + t).val(),
        o = $("#price_item_" + t).val(),
        i = $("#discount_" + t).val();
    if ((parseInt(l) < parseInt(n) && (alert("Purchase quantity less than quantity!"), $("#total_qntt_" + t).val("")), parseInt(n) > 0)) {
        var r = n * o,
            c = r * (i / 100);
        $("#all_discount_" + t).val(c);
        var s = r - c;
        $("#total_price_" + t).val(s.toFixed(2, 2)),
            $(".total_price").each(function () {
                isNaN(this.value) || 0 == this.value.length || (e += parseFloat(this.value));
            }),
            $("#grandTotal").val(e.toFixed(2, 2)),
            $(".total_discount").each(function () {
                isNaN(this.value) || 0 == this.value.length || (a += parseFloat(this.value));
            }),
            $("#total_discount_ammount").val(a.toFixed(2, 2));
    }
}
function quantity_calculate_mreturn(t) {
    var e = 0,
        a = 0,
        l = $("#sold_qty_" + t).val(),
        n = $("#total_qntt_" + t).val(),
        o = $("#price_item_" + t).val(),
        i = $("#discount_" + t).val();
    if ((parseInt(l) < parseInt(n) && (alert("You can not return more than sold/stock Quantity!"), $("#total_qntt_" + t).val("")), parseInt(n) > 0)) {
        var r = n * o,
            c = r * (i / 100);
        $("#all_discount_" + t).val(c);
        var s = r - $("#all_discount_" + t).val();
        $("#total_price_" + t).val(s.toFixed(2, 2)),
            $(".total_price").each(function () {
                isNaN(this.value) || 0 == this.value.length || (e += parseFloat(this.value));
            }),
            $("#grandTotal").val(e.toFixed(2, 2)),
            $(".total_discount").each(function () {
                isNaN(this.value) || 0 == this.value.length || (a += parseFloat(this.value));
            }),
            $("#total_discount_ammount").val(a.toFixed(2, 2));
    }
}
function checkrequird_mreturn(t) {
    var e = "check_id_" + t;
    $("#total_qntt_" + t).val() > 0 ? document.getElementById(e).setAttribute("required", "required") : document.getElementById(e).removeAttribute("required");
}
function checkqty_mreturn(t) {
    var e = $("#sold_qty_" + t).val(),
        a = $("#total_qntt_" + t).val();
    return isNaN(a)
        ? (alert("Must Input Number"), (document.getElementById("total_qntt_" + t).value = ""), !1)
        : parseInt(a) < 1
        ? (alert(":You can not return less than 1"), (document.getElementById("total_qntt_" + t).value = ""), !1)
        : parseInt(a) > parseInt(e)
        ? (setTimeout(function () {
              alert("You can not return more than sold/available qty"),
                  (document.getElementById("total_price_" + t).value = ""),
                  (document.getElementById("discount_" + t).value = ""),
                  (document.getElementById("total_qntt_" + t).value = "");
          }, 500),
          !1)
        : void 0;
}
function checkserver() {
    var t = $('[name="csrf_test_name"]').val(),
        e = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: e + "/autoupdate/checkserver",
        data: { check: 0, app_csrf: t },
        success: function (t) {
            0 == t
                ? swal("Warming", "Your php allow_url_fopen is currently Disable.Check Your server php allow_url_fopen is enable,memory Limit More than 100M and max execution time is 300 or more", "warning")
                : ($("#checkserver").hide(), $("#serverok").show());
        },
    });
}
function cancel_upnotification(t) {
    var e = $('[name="csrf_test_name"]').val(),
        a = $("#base_url").val();
    $.ajax({
        type: "POST",
        url: a + "/autoupdate/cancel_notification",
        data: { id: t, app_csrf: e },
        success: function (t) {
            0 == t ? swal("Warming", "Please Try Again", "warning") : (toastr.success("Successfully Canceled"), location.reload());
        },
    });
}
function add_serviceField(t) {
    for (var e = $("#serviceInvoice tbody tr").length + 1, a = 0, l = 0, n = 0, o = 0, i = 0, r = 0, c = 0, s = 0, d = 0, u = $("#txfieldnum").val(), m = "", p = 0; p < u; p++) {
        m += '<input id="total_tax' + p + "_" + e + '" class="total_tax' + p + "_" + e + '" type="hidden"><input id="all_tax' + p + "_" + e + '" class="total_tax' + p + '" type="hidden" name="tax[]">';
    }
    if (500 == e) alert("You have reached the limit of adding " + e + " inputs");
    else {
        var _ = "service_name_" + e,
            v = 5 * e,
            f = document.createElement("tr");
        (a = v + 1),
            (l = v + 2),
            (n = v + 3),
            (o = v + 4),
            (i = v + 5),
            (r = v + 6),
            (c = v + 7),
            (s = v + 8),
            (d = v + 9),
            (f.innerHTML =
                "<td><input type='text' name='service_name' onkeypress='service_productList(" +
                e +
                ");' class='form-control serviceSelection common_product' placeholder='Service Name' id='" +
                _ +
                "' required tabindex='" +
                a +
                "'><input type='hidden' class='common_product autocomplete_hidden_value  service_id_" +
                e +
                "' name='service_id[]' id='SchoolHiddenId'/></td><td> <input type='text' name='product_quantity[]' required='required' onkeyup='service_calculation(" +
                e +
                ");' onchange='service_calculation(" +
                e +
                ");' id='total_qntt_" +
                e +
                "' class='common_qnt total_qntt_" +
                e +
                " form-control text-right valid_number'  placeholder='0.00' min='0' tabindex='" +
                l +
                "'/></td><td><input type='text' name='product_rate[]' onkeyup='service_calculation(" +
                e +
                ");' onchange='service_calculation(" +
                e +
                ");' id='price_item_" +
                e +
                "' class='common_rate price_item" +
                e +
                " form-control text-right valid_number' required placeholder='0.00' min='0' tabindex='" +
                n +
                "'/></td><td><input type='text' name='discount[]' onkeyup='service_calculation(" +
                e +
                ");' onchange='service_calculation(" +
                e +
                ");' id='discount_" +
                e +
                "' class='form-control text-right common_discount valid_number' placeholder='0.00' min='0' tabindex='" +
                o +
                "' /><input type='hidden' value='' name='discount_type' id='discount_type_" +
                e +
                "'></td><td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" +
                e +
                "' value='0.00' readonly='readonly'/></td><td>" +
                m +
                "<input type='hidden'  id='total_discount_" +
                e +
                "' class='total_discount_" +
                e +
                "' /><input type='hidden' id='all_discount_" +
                e +
                "' class='total_discount' name='discount_amount[]'/><button tabindex='" +
                i +
                "' style='text-align: right;' class='btn btn-danger-soft' type='button' value='Delete' onclick='deleteserviceRow(this)'><i class='fas fa-trash-alt'></i></button></td>"),
            document.getElementById(t).appendChild(f),
            document.getElementById(_).focus(),
            document.getElementById("add_service_item").setAttribute("tabindex", r),
            document.getElementById("paidAmount").setAttribute("tabindex", c),
            document.getElementById("service_full_paid_tab").setAttribute("tabindex", s),
            document.getElementById("add_service").setAttribute("tabindex", d),
            e++;
    }
}
function service_calculation(t) {
    var e = $("#total_qntt_" + t).val(),
        a = $("#price_item_" + t).val(),
        l = ($("#invoice_discount").val(), $("#discount_" + t).val()),
        n = $("#txfieldnum").val(),
        o = ($("#total_discount_" + t).val(), $("#discount_type").val());
    if (e > 0 || l > 0) {
        if (1 == o) {
            var i = (+(d = e * a) * l) / 100;
            $("#all_discount_" + t).val(i);
            var r = d - i;
            $("#total_price_" + t).val(d);
            for (var c = 0; c < n; c++) {
                var s = r * $("#total_tax" + c + "_" + t).val();
                Number(s), $("#all_tax" + c + "_" + t).val(s);
            }
        } else if (2 == o) {
            var d = e * a;
            i = l * e;
            $("#all_discount_" + t).val(i);
            r = d - i;
            $("#total_price_" + t).val(d);
            for (c = 0; c < n; c++) {
                s = r * $("#total_tax" + c + "_" + t).val();
                Number(s), $("#all_tax" + c + "_" + t).val(s);
            }
        } else if (3 == o) {
            var u = e * a;
            $("#all_discount_" + t).val(l);
            d = u - l;
            $("#total_price_" + t).val(u);
            for (c = 0; c < n; c++) {
                s = d * $("#total_tax" + c + "_" + t).val();
                Number(s), $("#all_tax" + c + "_" + t).val(s);
            }
        }
    } else {
        var m = e * a,
            p = e * a;
        $("#total_price_" + t).val(m), $("#all_tax_" + t).val(p);
    }
    serviceCalculationSum(), service_paidamount();
}
function serviceCalculationSum() {
    for (var t = $("#txfieldnum").val(), e = 0, a = 0, l = 0, n = $("#shipping_cost").val(), o = 0; o < t; o++) {
        var i = 0;
        $(".total_tax" + o).each(function () {
            isNaN(this.value) || 0 == this.value.length || (i += parseFloat(this.value));
        }),
            $("#total_tax_ammount" + o).val(i.toFixed(2, 2));
    }
    $(".total_discount").each(function () {
        isNaN(this.value) || 0 == this.value.length || (a += parseFloat(this.value));
    }),
        $("#total_discount_ammount").val(a.toFixed(2, 2)),
        $(".totalTax").each(function () {
            isNaN(this.value) || 0 == this.value.length || (l += parseFloat(this.value));
        }),
        $("#total_tax_amount").val(l.toFixed(2, 2)),
        $(".total_price").each(function () {
            isNaN(this.value) || 0 == this.value.length || (e += parseFloat(this.value));
        });
    var r = +l.toFixed(2, 2) + +n + +e.toFixed(2, 2) - (l = a.toFixed(2, 2));
    $("#grandTotal").val(r);
    Number($("#grandTotal").val());
    var c = $("#invoice_discount").val(),
        s = +$("#total_discount_ammount").val() + +c;
    $("#total_discount_ammount").val(s);
    var d = r - c;
    service_paidamount(), $("#grandTotal").val(d);
}
function service_paidamount() {
    var t = parseFloat($("#previous").val(), 10),
        e = 0;
    e = t > 0 ? t : 0;
    var a = $("#grandTotal").val(),
        l = a - $("#paidAmount").val() + e,
        n = parseFloat(a, 10) + e;
    $("#n_total").val(n.toFixed(2, 2)), $("#dueAmmount").val(l.toFixed(2, 2));
}
function service_full_paid() {
    var t = $("#n_total").val();
    $("#paidAmount").val(t), service_paidamount();
}
function deleteserviceRow(t) {
    if (1 == $("#serviceInvoice > tbody > tr").length) alert("There only one row you can't delete.");
    else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e), serviceCalculationSum(), service_paidamount();
        var a = 1;
        $("#serviceInvoice > tbody > tr td input.productSelection").each(function () {
            a++, $(this).attr("id", "product_name" + a);
        });
        var l = 1;
        $("#serviceInvoice > tbody > tr td input.common_qnt").each(function () {
            l++, $(this).attr("id", "total_qntt_" + l), $(this).attr("onkeyup", "service_calculation(" + l + ");"), $(this).attr("onchange", "service_calculation(" + l + ");");
        });
        var n = 1;
        $("#serviceInvoice > tbody > tr td input.common_rate").each(function () {
            n++, $(this).attr("id", "price_item_" + n), $(this).attr("onkeyup", "service_calculation(" + l + ");"), $(this).attr("onchange", "service_calculation(" + l + ");");
        });
        var o = 1;
        $("#serviceInvoice > tbody > tr td input.common_discount").each(function () {
            o++, $(this).attr("id", "discount_" + o), $(this).attr("onkeyup", "service_calculation(" + l + ");"), $(this).attr("onchange", "service_calculation(" + l + ");");
        });
        var i = 1;
        $("#serviceInvoice > tbody > tr td input.common_total_price").each(function () {
            i++, $(this).attr("id", "total_price_" + i);
        });
    }
}
$(document).ready(function () {
    var t = $("#cash_adjustment");
    t.on("submit", function (e) {
        e.preventDefault(),
            $.ajax({
                url: $(this).attr("action"),
                method: $(this).attr("method"),
                dataType: "json",
                data: t.serialize(),
                success: function (t) {
                    1 == t.status
                        ? (toastr.success(t.message),
                          setInterval(function () {
                              location.reload();
                          }, 2e3))
                        : toastr.error(t.exception);
                },
                error: function (t) {
                    alert("failed!");
                },
            });
    });
}),
    $(document).ready(function () {
        var t = $("#contra_voucher_form");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              setInterval(function () {
                                  location.reload();
                              }, 2e3))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        var t = $("#credit_voucher_form");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              setInterval(function () {
                                  location.reload();
                              }, 2e3))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        var t = $("#customer_receive");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              swal(
                                  { title: "Success!", showCancelButton: !0, cancelButtonText: "NO", cancelButtonColor: "red", confirmButtonText: "Yes", confirmButtonColor: "#008000", text: "Do You Want To Print ?", type: "success" },
                                  function (e) {
                                      !0 === e ? ($("#customer_receive").trigger("reset"), printRawHtmlCustomerRcv(t.details)) : $("#customer_receive").trigger("reset");
                                  }
                              ))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        for (var t = document.getElementsByClassName("bank_div"), e = 0; e < t.length; e++) t[e].style.display = "none";
    }),
    $(document).ready(function () {
        var t = $("#debit_voucher_form");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status ? (toastr.success(t.message), location.reload()) : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#base_url").val();
        $("#cmbGLCode").on("change", function () {
            var a = $(this).val();
            $.ajax({
                url: e + "/account/ledger_head",
                type: "POST",
                data: { Headid: a, app_csrf: t },
                success: function (t) {
                    $("#ShowmbGLCode").html(t);
                },
            });
        });
    }),
    $(document).ready(function () {
        var t = $("#journal_voucher_form");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              setInterval(function () {
                                  location.reload();
                              }, 2e3))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        var t = $("#manufacturer_payment");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              swal(
                                  { title: "Success!", showCancelButton: !0, cancelButtonText: "NO", cancelButtonColor: "red", confirmButtonText: "Yes", confirmButtonColor: "#008000", text: "Do You Want To Print ?", type: "success" },
                                  function (e) {
                                      !0 === e ? ($("#manufacturer_payment").trigger("reset"), printRawHtmlmpayment(t.details)) : location.reload();
                                  }
                              ))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        var t = $("#opening_form");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              setInterval(function () {
                                  location.reload();
                              }, 1e3))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        $("#jstree1").jstree({
            core: { themes: { icons: !1 } },
            plugins: ["types", "dnd"],
            types: {
                default: { icon: "fa fa-folder" },
                html: { icon: "fa fa-file-code-o" },
                svg: { icon: "fa fa-file-picture-o" },
                css: { icon: "fa fa-file-code-o" },
                img: { icon: "fa fa-file-image-o" },
                js: { icon: "fa fa-file-text-o" },
                attr: { class: "panel-heading" },
            },
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#voucherList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[2, "desc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 1, 3, 4, 5, 6] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [20, 35, 50, 100, 250, 500, -1],
                [20, 35, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/account/check_voucherlist",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [{ data: "sl" }, { data: "VNo" }, { data: "VDate" }, { data: "Narration" }, { data: "Debit" }, { data: "Credit" }, { data: "button" }],
        });
    }),
    $("#signature_pic").change(function () {
        readURL(this);
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#BankList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [20, 35, 50, 100, 250, 500, -1],
                [20, 35, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/bank/bank_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "bank_name" },
                { data: "ac_name" },
                { data: "ac_number" },
                { data: "branch" },
                { data: "signature_pic" },
                { data: "balance", class: "balance text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "button" },
            ],
            footerCallback: function (t, a, l, n, o) {
                this.api()
                    .columns(".balance", { page: "current" })
                    .every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toFixed(2, 2));
                    });
            },
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#CustomerListCredit").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [20, 25, 35, 100, 250, 500, -1],
                [20, 35, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/customer/credit_customer_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "customer_name" },
                { data: "address" },
                { data: "mobile" },
                { data: "email" },
                { data: "city" },
                { data: "state" },
                { data: "zip" },
                { data: "country" },
                { data: "balance", class: "balance text-right" },
                { data: "button" },
            ],
            footerCallback: function (t, a, l, n, o) {
                this.api()
                    .columns(".balance", { page: "current" })
                    .every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + "" + t.toFixed(2, 2));
                    });
            },
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#CustomerList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [20, 35, 50, 100, 250, 500, -1],
                [20, 35, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/customer/customer_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "customer_name" },
                { data: "address" },
                { data: "mobile" },
                { data: "email" },
                { data: "city" },
                { data: "state" },
                { data: "zip" },
                { data: "country" },
                { data: "balance", class: "balance text-right" },
                { data: "button" },
            ],
            footerCallback: function (t, a, l, n, o) {
                this.api()
                    .columns(".balance", { page: "current" })
                    .every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + "" + t.toFixed(2, 2));
                    });
            },
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#CustomerListpaid").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [20, 35, 50, 100, 250, 500, -1],
                [20, 35, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/customer/paid_customer_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "customer_name" },
                { data: "address" },
                { data: "mobile" },
                { data: "email" },
                { data: "city" },
                { data: "state" },
                { data: "zip" },
                { data: "country" },
                { data: "balance", class: "balance text-right" },
                { data: "button" },
            ],
            footerCallback: function (t, a, l, n, o) {
                this.api()
                    .columns(".balance", { page: "current" })
                    .every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + "" + t.toFixed(2, 2));
                    });
            },
        });
    }),
    $(document).ready(function () {
        var t = $("#language").val(),
            e = $("#base_url").val(),
            a = $('[name="csrf_test_name"]').val(),
            l = $("#total_phrase").val();
        $("#languageList").DataTable({
            responsive: !0,
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [25, 50, 100, 250, 500, l],
                [25, 50, 100, 250, 500, "All"],
            ],
            serverMethod: "post",
            ajax: { url: e + "/dashboard/labels", type: "POST", data: { language: t, app_csrf: a } },
            columns: [{ data: "sl" }, { data: "phrase" }, { data: t }],
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#attendanceList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[2, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 1, 3, 4, 5, 6] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " attendance List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "attendance List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "attendance List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "attendance List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/attendance/attendance_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [{ data: "sl" }, { data: "employee" }, { data: "date" }, { data: "sign_in" }, { data: "sign_out" }, { data: "staytime" }, { data: "button" }],
        });
    }),
    $(document).ready(function () {
        var t = $("#singout_form");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status ? (toastr.success(t.message), location.reload()) : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $("#image").change(function () {
        readURL(this);
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#EmployeeList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " employee List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] }, title: "employee List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] }, title: "employee List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] }, title: "employee List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/employee/employee_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "first_name" },
                { data: "last_name" },
                { data: "designation" },
                { data: "phone" },
                { data: "email" },
                { data: "blood_group" },
                { data: "hrate" },
                { data: "country" },
                { data: "image" },
                { data: "button" },
            ],
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val()),
            a = $("#expenseList").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[2, "asc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 3, 4, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [15, 25, 50, 100, 250, 500, -1],
                    [15, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " expense List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "expense List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "expense List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "expense List", titleAttr: "PDF", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: e + "/expense/check_expensedata",
                    data: function (e) {
                        (e.app_csrf = t), (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val());
                    },
                },
                columns: [{ data: "sl" }, { data: "date" }, { data: "HeadName" }, { data: "debit" }, { data: "credit" }, { data: "narration" }, { data: "button" }],
            });
        $("#btn-filter-pur").on("click", function (t) {
            a.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#SalarySheet").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[3, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 4] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " salry List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3] }, title: "salry List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3] }, title: "salry List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3] }, title: "salry List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/payroll/get_salary_sheet",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [{ data: "sl" }, { data: "gdate" }, { data: "date" }, { data: "generate_by" }, { data: "button" }],
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#SalaryPayment").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[6, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 4, 5, 7, 8, 9] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " salry List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3] }, title: "salry List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3] }, title: "salry List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3] }, title: "salry List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/payroll/get_salary_paymentlist",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "employee" },
                { data: "salary_month" },
                { data: "total_salary" },
                { data: "total_working_minutes" },
                { data: "working_period" },
                { data: "payment_date" },
                { data: "payment_due" },
                { data: "paid_by" },
                { data: "button" },
            ],
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#employeesalaryList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[3, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 4, 5] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " salry List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "salry List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "salry List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "salry List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/payroll/salary_setupdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [{ data: "sl" }, { data: "employee" }, { data: "salary_type" }, { data: "create_date" }, { data: "gross_salary" }, { data: "button" }],
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#loanpayment").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[2, "asc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 3, 4, 5] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [15, 25, 50, 100, 250, 500, -1],
                    [15, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " Person List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", titleAttr: "PDF", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/loan/check_loanpaymentList",
                    data: function (e) {
                        (e.app_csrf = t), (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val());
                    },
                },
                columns: [{ data: "sl" }, { data: "person_name" }, { data: "VDate" }, { data: "narration" }, { data: "amount", class: "text-right total_balance", render: $.fn.dataTable.render.number(",", ".", 2, e) }, { data: "button" }],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_balance", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#loanpersonledger").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[2, "asc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 3, 4, 5] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [15, 25, 50, 100, 250, 500, -1],
                    [15, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " Person List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", titleAttr: "PDF", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/loan/checkperson_ledger",
                    data: function (e) {
                        (e.app_csrf = t), (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.person_id = $("#person_id").val());
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "person_name" },
                    { data: "VDate" },
                    { data: "narration" },
                    { data: "debit", class: "text-right total_debit", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "credit", class: "text-right total_credit", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "balance", class: "text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                ],
                footerCallback: function (t, a, l, n, o) {
                    var i = this.api();
                    i.columns(".total_debit", { page: "current" }).every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    }),
                        i.columns(".total_credit", { page: "current" }).every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#LoanPersonList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[2, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 1, 3, 4] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " Person List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3] }, title: "Person List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/loan/personal_loan_checkperson",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "person_name" },
                { data: "person_phone" },
                { data: "person_address" },
                { data: "balance", class: "text-right total_balance", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "button" },
            ],
            footerCallback: function (t, a, l, n, o) {
                this.api()
                    .columns(".total_balance", { page: "current" })
                    .every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    });
            },
        });
    }),
    $(document).ready(function () {
        for (var t = document.getElementsByClassName("bank_div"), e = $("#payment_type").val(), a = 0; a < t.length; a++) t[a].style.display = 2 == e ? "block" : "none";
    }),
    $(document).ready(function () {
        var t = $("#manual_sale_insert");
        t.on("submit", function (e) {
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              swal(
                                  { title: "Success!", showCancelButton: !0, cancelButtonText: "NO", cancelButtonColor: "red", confirmButtonText: "Yes", confirmButtonColor: "#008000", text: "Do You Want To Print ?", type: "success" },
                                  function (e) {
                                      !0 === e
                                          ? ($("#normalinvoice tbody tr").remove(), printRawHtmlInvoice(t.details))
                                          : ($("#normalinvoice tbody tr").remove(),
                                            setInterval(function () {
                                                location.reload();
                                            }, 1e3));
                                  }
                              ))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        for (var t = document.getElementsByClassName("bank_div"), e = $("#payment_type").val(), a = 0; a < t.length; a++) t[a].style.display = 2 == e ? "block" : "none";
    }),
    $("body").on("keyup", "#product_name", function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $(this).val(),
            a = $("#base_url").val() + "/invoice/get_medicine_by_name";
        $.ajax({
            type: "post",
            async: !1,
            url: a,
            data: { product_name: e, app_csrf: t },
            success: function (t) {
                "420" == t ? $("#product_search").html('<h1 class"srcalrt">Product not found !</h1>') : $("#product_search").html(t);
            },
            error: function () {
                alert("Request Failed, Please check your code and try again!");
            },
        });
    }),
    $(document).ready(function () {
        $("input[name='product_quantity']").TouchSpin({ verticalbuttons: !0 });
    }),
    $(function (t) {
        var e,
            a = "";
        t("#add_item").on("keypress", function (l) {
            (a += String.fromCharCode(l.charCode)),
                clearTimeout(e),
                (e = setTimeout(function () {
                    !(function () {
                        if ("" != a) {
                            var e = a,
                                l = t("#product_id_" + e).val(),
                                n = t("#total_qntt_" + e).val(),
                                o = parseInt(n) + 1,
                                i = t("#base_url").val(),
                                r = t('[name="csrf_test_name"]').val();
                            e == l
                                ? (t("#total_qntt_" + e).val(o),
                                  image_activation(e),
                                  quantity_calculate_pos(e),
                                  calculateSum_pos(),
                                  invoice_paidamount(),
                                  (document.getElementById("add_item").value = ""),
                                  document.getElementById("add_item").focus())
                                : t.ajax({
                                      type: "post",
                                      async: !1,
                                      url: i + "/invoice/get_posdata",
                                      data: { product_id: e, app_csrf: r },
                                      success: function (l) {
                                          0 == l
                                              ? (alert("This Product Not Found !"),
                                                (document.getElementById("add_item").value = ""),
                                                document.getElementById("add_item").focus(),
                                                quantity_calculate_pos(),
                                                calculateSum_pos(a),
                                                invoice_paidamount())
                                              : (t("#hidden_tr").css("display", "none"),
                                                (document.getElementById("add_item").value = ""),
                                                document.getElementById("add_item").focus(),
                                                t("#normalinvoice tbody").append(l),
                                                t("input[name='product_quantity[]']").TouchSpin({ verticalbuttons: !0 }),
                                                image_select(e),
                                                calculateSum_pos(),
                                                invoice_paidamount());
                                      },
                                      error: function () {
                                          alert("Request Failed, Please check your code and try again!");
                                      },
                                  });
                        } else alert("barcode is invalid: " + a);
                        a = "";
                    })();
                }, 300));
        });
    }),
    $(function (t) {
        t("#add_item_m").keydown(function (e) {
            if (13 == e.keyCode) {
                var a = t(this).val(),
                    l = t("#product_id_" + a).val(),
                    n = t("#total_qntt_" + a).val(),
                    o = parseInt(n) + 1,
                    i = t("#base_url").val(),
                    r = t('[name="csrf_test_name"]').val();
                a == l
                    ? (t("#total_qntt_" + a).val(o),
                      image_activation(a),
                      quantity_calculate_pos(a),
                      calculateSum_pos(),
                      invoice_paidamount(),
                      (document.getElementById("add_item_m").value = ""),
                      document.getElementById("add_item_m").focus())
                    : t.ajax({
                          type: "post",
                          async: !1,
                          url: i + "/invoice/get_posdata",
                          data: { product_id: a, app_csrf: r },
                          success: function (e) {
                              t("#hidden_tr").css("display", "none"),
                                  (document.getElementById("add_item_m").value = ""),
                                  document.getElementById("add_item_m").focus(),
                                  t("#normalinvoice tbody").append(e),
                                  t("input[name='product_quantity[]']").TouchSpin({ verticalbuttons: !0 }),
                                  image_select(a),
                                  calculateSum_pos(),
                                  invoice_paidamount();
                          },
                          error: function () {
                              alert("Request Failed, Please check your code and try again!");
                          },
                      });
            }
        });
    }),
    $(document).ready(function () {
        var t = $("#pos_sale_insert");
        t.on("submit", function (e) {
            if (0 == $("#normalinvoice > tbody > tr").length) return toastr.error("Please Select Medicine"), !1;
            e.preventDefault(),
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    dataType: "json",
                    data: t.serialize(),
                    success: function (t) {
                        1 == t.status
                            ? (toastr.success(t.message),
                              $(".quantity").removeClass("quantity"),
                              $(".product-panel").removeClass("active"),
                              $(".active_qty").text(""),
                              swal(
                                  { title: "Success!", showCancelButton: !0, cancelButtonText: "NO", cancelButtonColor: "red", confirmButtonText: "Yes", confirmButtonColor: "#008000", text: "Do You Want To Print ?", type: "success" },
                                  function (e) {
                                      !0 === e
                                          ? ($("#normalinvoice tbody tr").remove(),
                                            $("#gui_sale_insert").trigger("reset"),
                                            $("#n_total").val(""),
                                            $("#net_total_text").text("0.00"),
                                            $("#dueAmmount").val(""),
                                            $("#due_text").text("0.00"),
                                            printRawHtml_pos(t.details))
                                          : (location.reload(),
                                            $("#normalinvoice tbody tr").remove(),
                                            $("#pos_sale_insert").trigger("reset"),
                                            $("#n_total").val(""),
                                            $("#net_total_text").text("0.00"),
                                            $("#dueAmmount").val(""),
                                            $("#due_text").text("0.00"));
                                  }
                              ))
                            : toastr.error(t.exception);
                    },
                    error: function (t) {
                        alert("failed!");
                    },
                });
        });
    }),
    $(document).ready(function () {
        $("#newcustomer").submit(function (t) {
            t.preventDefault();
            var e = $("#customer_id"),
                a = $("#customer_name");
            $.ajax({
                url: $(this).attr("action"),
                method: $(this).attr("method"),
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function () {},
                success: function (t) {
                    1 == t.status ? (toastr.success(t.message), e.val(t.customer_id), a.val(t.customer_name), $("#cust_info").modal("hide")) : toastr.error(t.exception);
                },
                error: function (t) {
                    alert("failed!");
                },
            });
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#categorywiseSalereport").DataTable({
                responsive: !0,
                dom: "<'row '<'col-md-6' B><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[1, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/report/getcategorywise_sales_reportList",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.category_id = $("#category_id").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "date" },
                    { data: "product_name" },
                    { data: "invoice" },
                    { data: "customer_name" },
                    { data: "quantity", class: "total_qty text-right" },
                    { data: "rate" },
                    { data: "discount", class: "total text-right" },
                    { data: "total", class: "total text-right" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    var i = this.api();
                    i.columns(".total_qty", { page: "current" }).every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    }),
                        i.columns(".total", { page: "current" }).every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val()),
            a = $("#ClosingList").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[2, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 3, 4, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Closing List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Closing List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Closing List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Closing List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: e + "/report/getclosing_data",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [{ data: "sl" }, { data: "last_day_closing" }, { data: "date" }, { data: "cash_in" }, { data: "cash_out" }, { data: "amount" }, { data: "close_by" }],
            });
        $("#btn-filter-pur").on("click", function (t) {
            a.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#productWiseSalesreport").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[1, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/report/getproductwise_sales_reportList",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.product_id = $("#product_id").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "date" },
                    { data: "product_name" },
                    { data: "invoice" },
                    { data: "customer_name" },
                    { data: "quantity", class: "total_qty text-right" },
                    { data: "rate" },
                    { data: "discount", class: "total text-right" },
                    { data: "total", class: "total text-right" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    var i = this.api();
                    i.columns(".total_qty", { page: "current" }).every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    }),
                        i.columns(".total", { page: "current" }).every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#purchaseReport").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[4, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [25, 50, 100, 250, 500, -1],
                    [25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/report/getpurchase_reportList",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "chalan_no" },
                    { data: "purchase_id" },
                    { data: "manufacturer_name" },
                    { data: "purchase_date" },
                    { data: "total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "purchase_by" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#purchaseReportCategorywise").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[4, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 5, 6, 7, 8, 9] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [25, 50, 100, 250, 500, -1],
                    [25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/report/get_categorywise_purchaselist",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.category_id = $("#category_id").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "category_name" },
                    { data: "product_name" },
                    { data: "manufacturer_name" },
                    { data: "purchase_date" },
                    { data: "quantity", class: "total_sale text-right" },
                    { data: "rate" },
                    { data: "discount" },
                    { data: "total", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "purchase_by" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#Salesreport").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[4, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/report/getsales_reportList",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "invoice_no" },
                    { data: "invoice_id" },
                    { data: "customer_name" },
                    { data: "date" },
                    { data: "total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "sales_by" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#userWiseSalesreport").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[4, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/report/getuserwise_sales_reportList",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.user_id = $("#user_id").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "invoice_no" },
                    { data: "invoice_id" },
                    { data: "customer_name" },
                    { data: "date" },
                    { data: "total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "sales_by" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#MedicineList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " Medicine List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] }, title: "Medicine List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] }, title: "Medicine List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8] }, title: "Medicine List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/medicine/medicine_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "product_name" },
                { data: "generic_name" },
                { data: "product_category" },
                { data: "manufacturer_name" },
                { data: "product_location" },
                { data: "price", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "purchase_p", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "strength" },
                { data: "image" },
                { data: "button" },
            ],
        });
    }),
    $(document).ready(function () {
        $("input[type=checkbox]").each(function () {
            "label" != this.nextSibling.nodeName && $(this).after('<label for="' + this.id + '"></label>');
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#InvoiceReturn").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[3, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 4, 5] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice Return List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice Return List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice Return List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice Return List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/return/checkinvoice_returnlist",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "invoice_id" },
                    { data: "customer_name" },
                    { data: "date_return" },
                    { data: "net_total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "button" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#WastageReturn").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[5, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 4, 6, 7] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice Return List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice Return List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice Return List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6] }, title: "Invoice Return List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/return/checkwastage_returnlist",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "invoice_id" },
                    { data: "purchase_id" },
                    { data: "customer_name" },
                    { data: "manufacturer_name" },
                    { data: "date_return" },
                    { data: "net_total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "button" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#ManufacturerReturnlist").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[3, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 4, 5] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Manufacturer Return List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Manufacturer Return List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Manufacturer Return List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Manufacturer Return List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/return/checkmanufacturer_returnlist",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "purchase_id" },
                    { data: "manufacturer_name" },
                    { data: "date_return" },
                    { data: "net_total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "button" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#ServiceInvoice").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[4, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/service/check_invoicelist",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "invoice_no" },
                    { data: "pay_type" },
                    { data: "customer_name" },
                    { data: "date" },
                    { data: "total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "button" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#StockListBatchwise").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [25, 50, 100, 250, 500, -1],
                [25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/stock/stock_checkdata_batchwise",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "product_name" },
                { data: "strength" },
                { data: "batch_id" },
                { data: "expeire_date" },
                { data: "inqty", class: "text-right" },
                { data: "outqty", class: "text-right" },
                { data: "stock", class: "text-right" },
                { data: "stock_box", class: "text-right", render: $.fn.dataTable.render.number(",", ".", 2) },
            ],
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#StockList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [25, 50, 100, 250, 500, -1],
                [25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/stock/stock_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "product_name" },
                { data: "manufacturer_name" },
                { data: "sales_price", class: "text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "purchase_p", class: "text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "totalPurchaseQnty" },
                { data: "totalSalesQnty" },
                { data: "stok_quantity", class: "stock" },
                { data: "stock_box", render: $.fn.dataTable.render.number(",", ".", 2) },
                { data: "total_sale_price", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "purchase_total", class: "total_purchase text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
            ],
            footerCallback: function (t, a, l, n, o) {
                var i = this.api();
                i.columns(".stock", { page: "current" }).every(function () {
                    var t = this.data().reduce(function (t, e) {
                        return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                    }, 0);
                    $(this.footer()).html(t.toLocaleString());
                }),
                    i.columns(".total_sale", { page: "current" }).every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    }),
                    i.columns(".total_purchase", { page: "current" }).every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    });
            },
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val();
        $("#Available_stock").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [25, 50, 100, 250, 500, -1],
                [25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/stock/check_available_stock",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "product_name" },
                { data: "manufacturer_name" },
                { data: "sales_price", class: "text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "purchase_p", class: "text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "totalPurchaseQnty", class: "text-right" },
                { data: "totalSalesQnty", class: "text-right" },
                { data: "stok_quantity", class: "stock text-right" },
                { data: "stock_box", class: "stock text-right", render: $.fn.dataTable.render.number(",", ".", 2) },
                { data: "total_sale_price", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "purchase_total", class: "total_purchase text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
            ],
            footerCallback: function (t, a, l, n, o) {
                var i = this.api();
                i.columns(".stock", { page: "current" }).every(function () {
                    var t = this.data().reduce(function (t, e) {
                        return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                    }, 0);
                    $(this.footer()).html(t.toLocaleString());
                }),
                    i.columns(".total_sale", { page: "current" }).every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    }),
                    i.columns(".total_purchase", { page: "current" }).every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    });
            },
        });
        $("#basecolor").on("change", function () {
            $("#basecolor_hexcolor").val(this.value);
        }),
            $("#menubg_color").on("change", function () {
                $("#menubg_color_hexcolor").val(this.value);
            }),
            $("#menu_hover_color").on("change", function () {
                $("#menu_hover_color_hexcolor").val(this.value);
            }),
            $("#menu_font_color").on("change", function () {
                $("#menu_font_color_hexcolor").val(this.value);
            }),
            $("#active_menu_color").on("change", function () {
                $("#active_menu_color_hexcolor").val(this.value);
            }),
            $("#active_menu_bgcolor").on("change", function () {
                $("#active_menu_bgcolor_hexcolor").val(this.value);
            }),
            $("#content_text_color").on("change", function () {
                $("#content_text_color_hexcolor").val(this.value);
            }),
            $("#logo_text_color").on("change", function () {
                $("#logo_text_color_hexcolor").val(this.value);
            });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#PurList").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[4, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [15, 25, 50, 100, 250, 500, -1],
                    [15, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/purchase/purchase_list_check",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "chalan_no" },
                    { data: "purchase_id" },
                    { data: "manufacturer_name" },
                    { data: "purchase_date" },
                    { data: "total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "button" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#InvoicList").DataTable({
                responsive: !0,
                dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
                aaSorting: [[4, "desc"]],
                columnDefs: [{ bSortable: !1, aTargets: [0, 1, 2, 3, 5, 6] }],
                processing: !0,
                serverSide: !0,
                lengthMenu: [
                    [10, 25, 50, 100, 250, 500, -1],
                    [10, 25, 50, 100, 250, 500, "All"],
                ],
                buttons: [
                    { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                    { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", exportOptions: { columns: [0, 1, 2, 3, 4, 5] }, title: "Invoice List", className: "btn-light" },
                ],
                serverMethod: "post",
                ajax: {
                    url: a + "/invoice/invoice_list_check",
                    data: function (e) {
                        (e.fromdate = $("#from_date").val()), (e.todate = $("#to_date").val()), (e.app_csrf = t);
                    },
                },
                columns: [
                    { data: "sl" },
                    { data: "invoice_no" },
                    { data: "invoice_id" },
                    { data: "customer_name" },
                    { data: "date" },
                    { data: "total_amount", class: "total_sale text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                    { data: "button" },
                ],
                footerCallback: function (t, a, l, n, o) {
                    this.api()
                        .columns(".total_sale", { page: "current" })
                        .every(function () {
                            var t = this.data().reduce(function (t, e) {
                                return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                            }, 0);
                            $(this.footer()).html(e + " " + t.toLocaleString(void 0, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        });
                },
            });
        $("#btn-filter-pur").on("click", function (t) {
            l.ajax.reload();
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#currency").val(),
            a = $("#base_url").val(),
            l = $("#total_manufacturer").val();
        $("#ManufacturerList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [10, 25, 50, 100, 250, 500, l],
                [10, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: a + "/manufacturer/manufacturer_checkdata",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [
                { data: "sl" },
                { data: "manufacturer_name" },
                { data: "address" },
                { data: "mobile" },
                { data: "email" },
                { data: "city" },
                { data: "state" },
                { data: "zip" },
                { data: "country" },
                { data: "balance", class: "balance text-right", render: $.fn.dataTable.render.number(",", ".", 2, e) },
                { data: "button" },
            ],
            footerCallback: function (t, a, l, n, o) {
                this.api()
                    .columns(".balance", { page: "current" })
                    .every(function () {
                        var t = this.data().reduce(function (t, e) {
                            return (parseFloat(t) || 0) + (parseFloat(e) || 0);
                        }, 0);
                        $(this.footer()).html(e + " " + t.toFixed(2, 2));
                    });
            },
        });
        $(".valid_number").keypress(function (t) {
            var e = t.which ? t.which : t.keyCode;
            return !(46 != e && 45 != e && e > 31 && (e < 48 || e > 57));
        });
    });
var count = 2,
    limits = 500;
function bank_payment(t) {
    if (2 == t) var e = "block";
    else e = "none";
    for (var a = document.getElementsByClassName("bank_div"), l = 0; l < a.length; l++) a[l].style.display = e;
}
function CustomerList(t) {
    var e = $("#base_url").val(),
        a = $('[name="csrf_test_name"]').val(),
        l = {
            minLength: 0,
            source: function (t, l) {
                var n = $("#customer_name").val();
                $.ajax({
                    url: e + "/invoice/search_customer",
                    method: "POST",
                    dataType: "json",
                    data: { term: t.term, customer_name: n, app_csrf: a },
                    success: function (t) {
                        l(t);
                    },
                });
            },
            focus: function (t, e) {
                return $(this).val(e.item.label), !1;
            },
            select: function (t, e) {
                $(this).parent().parent().find("#customer_id").val(e.item.value);
                var a = e.item.value;
                return $(this).unbind("change"), customer_due(a), !1;
            },
        };
    $("body").on("keypress.autocomplete", "#customer_name", function () {
        $(this).autocomplete(l);
    });
}
function service_productList(t) {
    var e = "price_item_" + t,
        a = $("#base_url").val(),
        l = $('[name="csrf_test_name"]').val(),
        n = {
            minLength: 0,
            source: function (e, n) {
                var o = $("#service_name_" + t).val();
                $.ajax({
                    url: a + "/service/search_service",
                    method: "post",
                    dataType: "json",
                    data: { term: e.term, service_name: o, app_csrf: l },
                    success: function (t) {
                        n(t);
                    },
                });
            },
            focus: function (t, e) {
                return $(this).val(e.item.label), !1;
            },
            select: function (a, n) {
                $(this).parent().parent().find(".autocomplete_hidden_value").val(n.item.value), $(this).val(n.item.label);
                var o = n.item.value,
                    i = $("#base_url").val();
                return (
                    $.ajax({
                        type: "POST",
                        url: i + "/service/service_details_data",
                        data: { service_id: o, app_csrf: l },
                        cache: !1,
                        success: function (a) {
                            for (var l = jQuery.parseJSON(a), n = 0; n < l.txnmber; n++) {
                                l.taxdta[n];
                                $("." + ("total_tax" + n + "_" + t)).val(l.taxdta[n]);
                            }
                            $("#" + e).val(l.charge);
                        },
                    }),
                    $(this).unbind("change"),
                    !1
                );
            },
        };
    $("body").on("keypress.autocomplete", ".serviceSelection", function () {
        $(this).autocomplete(n);
    });
}
function deleteTaxRow(t) {
    var e = t.parentNode.parentNode.rowIndex;
    document.getElementById("POITable").deleteRow(e);
}
function TaxinsRow() {
    var t = document.getElementById("POITable"),
        e = t.rows[1].cloneNode(!0),
        a = t.rows.length;
    e.cells[0].innerHTML = a;
    var l = e.cells[1].getElementsByTagName("input")[0];
    (l.id += a), (l.value = "");
    var n = e.cells[2].getElementsByTagName("input")[0];
    (n.id += a), (n.value = ""), t.appendChild(e);
}
function add_columnTaxsettings(t) {
    var e,
        a = "";
    for (e = 0; e < t; e++) {
        a +=
            '<div class="form-group row"><label for="fieldname" class="col-sm-2 col-form-label">Tax Name' +
            (e + 1) +
            '*</label><div class="col-sm-2"><input type="text" placeholder="Tax Name" class="form-control" required autocomplete="off" name="taxfield[]"></div><label for="default_value" class="col-sm-1 col-form-label">Default Value<i class="text-danger">(%)</i></label><div class="col-sm-2"><input type="text" class="form-control valid_number" name="default_value[]" id="default_value"  placeholder="Default Value" /></div><label for="reg_no" class="col-sm-1 col-form-label">Reg No</label><div class="col-sm-2"><input type="text" class="form-control" name="reg_no[]" id="reg_no"  placeholder="Reg No" /></div><div class="col-sm-1"><input type="checkbox" name="is_show" class="form-control" value="1"></div><label for="isshow" class="col-sm-1 col-form-label">Is Show</label></div>';
    }
    document.getElementById("taxfield").innerHTML = a;
}
function checkallcreate(t) {
    $("#checkAllcreate" + t).change(function () {
        $(this).is(":checked")
            ? $(".create" + t).each(function () {
                  $(this).prop("checked", !0);
              })
            : $(".create" + t).each(function () {
                  $(this).prop("checked", !1);
              });
    });
}
function checkallread(t) {
    $("#checkAllread" + t).change(function () {
        $(this).is(":checked")
            ? $(".read" + t).each(function () {
                  $(this).prop("checked", !0);
              })
            : $(".read" + t).each(function () {
                  $(this).prop("checked", !1);
              });
    });
}
function checkalledit(t) {
    $("#checkAlledit" + t).change(function () {
        $(this).is(":checked")
            ? $(".edit" + t).each(function () {
                  $(this).prop("checked", !0);
              })
            : $(".edit" + t).each(function () {
                  $(this).prop("checked", !1);
              });
    });
}
function checkalldelete(t) {
    $("#checkAlldelete" + t).change(function () {
        $(this).is(":checked")
            ? $(".delete" + t).each(function () {
                  $(this).prop("checked", !0);
              })
            : $(".delete" + t).each(function () {
                  $(this).prop("checked", !1);
              });
    });
}
function printDiv(t) {
    var e = $("body").html(),
        a = $("#" + t).clone();
    $("body").empty().html(a), window.print(), $("body").html(e);
}
$(document).ready(function () {
    for (var t = document.getElementsByClassName("bank_div"), e = 0; e < t.length; e++) t[e].style.display = "none";
}),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = $("#base_url").val();
        $("#outofDateMedicineList").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " Medicine List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "Medicine List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "Medicine List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "Medicine List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/dashboard/check_expired_medicine",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [{ data: "sl" }, { data: "product_name" }, { data: "batch_id" }, { data: "expeire_date" }, { data: "stock", class: "text-center text-danger text-bold" }],
        });
    }),
    $(document).ready(function () {
        var t = $('[name="csrf_test_name"]').val(),
            e = ($("#currency").val(), $("#base_url").val());
        $("#outof_stock_check").DataTable({
            responsive: !0,
            dom: "<'row'<'col-md-6'Bl><'col-md-6'f>>rt<'bottom'ip><'clear'>",
            aaSorting: [[1, "asc"]],
            columnDefs: [{ bSortable: !1, aTargets: [0, 2, 3, 4] }],
            processing: !0,
            serverSide: !0,
            lengthMenu: [
                [15, 25, 50, 100, 250, 500, -1],
                [15, 25, 50, 100, 250, 500, "All"],
            ],
            buttons: [
                { extend: "copyHtml5", text: '<i class="far fa-copy"></i>', titleAttr: "Copy", title: " Medicine List", className: "btn-light" },
                { extend: "excelHtml5", text: '<i class="far fa-file-excel"></i>', titleAttr: "Excel", exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "Medicine List", className: "btn-light" },
                { extend: "csvHtml5", text: '<i class="far fa-file-alt"></i>', titleAttr: "CSV", exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "Medicine List", className: "btn-light" },
                { extend: "pdfHtml5", text: '<i class="far fa-file-pdf"></i>', exportOptions: { columns: [0, 1, 2, 3, 4] }, title: "Medicine List", titleAttr: "PDF", className: "btn-light" },
            ],
            serverMethod: "post",
            ajax: {
                url: e + "/dashboard/check_stockout_medicine",
                data: function (e) {
                    e.app_csrf = t;
                },
            },
            columns: [{ data: "sl" }, { data: "product_name" }, { data: "manufacturer_name" }, { data: "generic_name" }, { data: "stock", class: "text-center text-danger text-bold" }],
        });
    }),
    $(".select2").select2(),
    $(document).ready(function () {
        $(".datepicker").daterangepicker({ singleDatePicker: !0, showDropdowns: !0, minYear: 1901, maxYear: 2050, locale: { format: "YYYY-MM-DD" } }),
            $(function () {
                $(".uidatepicker").datepicker({ dateFormat: "yy-mm-dd" });
            }),
            $(".psdate").val(""),
            $(".pedate").val(""),
            $(".timepicker")
                .daterangepicker({
                    timePicker: !0,
                    singleDatePicker: !0,
                    timePicker24Hour: !0,
                    timePickerIncrement: 1,
                    timePickerSeconds: !0,
                    applyButtonClasses: "btn-success",
                    cancelClass: "btn-danger",
                    startDate: moment().startOf("hour"),
                    startDate: moment().startOf("minute"),
                    startDate: moment().startOf("second"),
                    locale: { format: "HH:mm:ss" },
                })
                .on("show.daterangepicker", function (t, e) {
                    e.container.find(".calendar-table").hide();
                }),
            $(".monthpicker").daterangepicker({ singleDatePicker: !0, showDropdowns: !0, locale: { format: "MMMM YYYY" } });
    });
