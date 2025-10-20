$(document).ready(function () {
    "use strict"; // Start of use strict

    //Product Grid
    $('.product-grid').each(function () {
        const ps = new PerfectScrollbar($(this)[0]);
    });
    //Select2
    $(".filter-select, .serial-select2").select2();

    //Data table
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
    });
    $('.basic').DataTable({
        iDisplayLength: 15,
        language: {
            oPaginate: {
                sNext: '<i class="ti-angle-right"></i>',
                sPrevious: '<i class="ti-angle-left"></i>'
            }
        }
    });
    //Footer bottom collapse
    $('#sidebarCollapse').on('click', function () {
        $('.fixedclasspos').toggleClass('active');
    });

    $('.collapse-btn2').on('click', function () {
        $('.fixedclasspos, .collapse-btn2').toggleClass('opened');
    });

    //Calculator
    class Calculator {
        static init = () => {
            this.display = document.querySelector(".calc-input");
            this.display.focus();
            Calculator.captureClicks();
            Calculator.captureEnter();
        }
        ;
                static captureEnter = () => {
            document.addEventListener("keyup", (e) => {
                if (e.key === "Enter") {
                    this.calculate();
                }
            });
        }
        ;
                static captureClicks = () => {
            document.addEventListener("click", (e) => {
                const el = e.target;

                if (el.classList.contains("btn_num"))
                    Calculator.addToDisplay(el);
                if (el.classList.contains("btn_clear"))
                    Calculator.clear();
                if (el.classList.contains("btn_del"))
                    Calculator.delete();
                if (el.classList.contains("btn_calculate"))
                    Calculator.calculate();
            });
        }
        ;
                static addToDisplay = (el) => {
            this.display.value += el.innerText;
            this.display.focus();
        }
        ;
                static clear = () => {
            this.display.value = "";
            this.display.focus();
        }
        ;
                static delete = () => {
            this.display.value = this.display.value.slice(0, -1);
            this.display.focus();
        }
        ;
                static calculate = () => {
            try {
                let expression = this.display.value;

                console.log(expression.search(/[a-z]/i));
                if (expression.search(/[a-z]/i) !== -1) {
                    this.display.value = "ERR";
                    return;
                }

                const result = eval(expression);

                if (result === NaN) {
                    this.display.value = "ERR";
                    return;
                }

                this.display.value = result;
                this.display.focus();
            } catch (error) {
                this.display.value = "ERR";
                return;
            }
        }
        ;
    }

    Calculator.init();

});
 window.onload = function () {
         $('.navbar-custom-menu').addClass("active");
        $('.sidebar-bunker').addClass("active");
        $('.sidebar-toggle-icon').addClass("open");
        $('.position-fixed').addClass("active");
        
    }