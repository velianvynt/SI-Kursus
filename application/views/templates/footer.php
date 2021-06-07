<!-- Vendor -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?= base_url(); ?>assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-appear/jquery.appear.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.js"></script>
<script src="<?= base_url(); ?>assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.categories.js"></script>
<script src="<?= base_url(); ?>assets/vendor/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<script src="<?= base_url(); ?>assets/vendor/raphael/raphael.js"></script>
<script src="<?= base_url(); ?>assets/vendor/morris/morris.js"></script>
<script src="<?= base_url(); ?>assets/vendor/gauge/gauge.js"></script>
<script src="<?= base_url(); ?>assets/vendor/snap-svg/snap.svg.js"></script>
<script src="<?= base_url(); ?>assets/vendor/liquid-meter/liquid.meter.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/jquery.vmap.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/select2.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url(); ?>assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url(); ?>assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url(); ?>assets/javascripts/theme.init.js"></script>

<!-- Examples -->
<script src="<?= base_url(); ?>assets/javascripts/dashboard/examples.dashboard.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/scriptswal.js"></script>

<!-- Select2 -->
<script src="<?= base_url(); ?>assets/select2/dist/js/select2.full.min.js"></script>




<script type="text/javascript">
    $('.select2').select2();
</script>




<!-- Table select -->
<script type="text/javascript">
    (function($) {

        'use strict';

        var datatableInit = function() {
            var $table = $('#table_select');

            var th = document.createElement('th');
            var td = document.createElement('td');

            td.className = "text-center";


            // initialize
            var datatable = $table.dataTable({
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [0]
                }],
                aaSorting: [
                    [0, 'asc']
                ]
            });
        };

        $(function() {
            datatableInit();
        });

    }).apply(this, [jQuery]);
</script>

<!-- Script data select -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            let id = $(this).data('id');
            let nik = $(this).data('nik');
            let name = $(this).data('name');
            let gender = $(this).data('gender');
            let address = $(this).data('address');
            let phone = $(this).data('phone');
            $('#id').val(id);
            $('#nik').val(nik);
            $('#name_auto').val(name);
            $('#address').val(address);
            $('#phone_auto').val(phone);
            $('#gender').val(gender);
            $('#modalList').modal('hide');
        })
    })
</script>

<!-- Detail Teacher -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#detail_teacher', function() {
            let username = $(this).data('username');
            let password = $(this).data('password');
            let image = $(this).data('image');
            $('#username_auto').text(username);
            $('#password_auto').text(password);
            $('#image_auto').attr('src', '<?= base_url("assets/img/"); ?>' + image);
        })
    })
</script>

<!-- Input Score -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#input_score', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            $('#id_auto').val(id);
            $('#name_auto').text(name);
        })
    })
</script>

<!-- Detail Student -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#detail_student', function() {
            let date = $(this).data('date');
            let school = $(this).data('school');
            let address = $(this).data('address');
            let fatherN = $(this).data('father_name');
            let fatherO = $(this).data('father_occup');
            let fatherP = $(this).data('father_phone');
            let motherN = $(this).data('mother_name');
            let motherP = $(this).data('mother_phone');
            let motherO = $(this).data('mother_occup');
            let parent = $(this).data('parent');
            let image = $(this).data('image');
            $('#date_auto').text(date);
            $('#school_auto').text(school);
            $('#address_auto').text(address);
            $('#fatherN_auto').text(fatherN);
            $('#fatherO_auto').text(fatherO);
            $('#fatherP_auto').text(fatherP);
            $('#motherN_auto').text(motherN);
            $('#motherP_auto').text(motherP);
            $('#motherO_auto').text(motherO);
            $('#parent_auto').text(parent);
            $('#image_auto').attr('src', '<?= base_url("assets/img/"); ?>' + image);
        })
    })
</script>


<!-- Table class -->
<script type="text/javascript">
    (function($) {

        'use strict';

        var datatableInit = function() {
            var $table = $('.table_class');
            var th = document.createElement('th');
            var td = document.createElement('td');

            td.className = "text-center";

            // initialize
            var datatable = $table.dataTable({
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [0]
                }],
                aaSorting: [
                    [0, 'asc']
                ]
            });
        };

        $(function() {
            datatableInit();
        });

    }).apply(this, [jQuery]);
</script>


<!-- Table Class -->
<script type="text/javascript">
    (function($) {

        'use strict';

        var datatableInit = function() {
            var $table = $('#table_class');

            // format function for row details
            var fnFormatDetails = function(datatable, tr) {
                var data = datatable.fnGetData(tr);

                return [
                    '<table class="table mb-none">',
                    '<tr class="b-top-none">',
                    '<td><label class="mb-none">Username</label></td>',
                    '<td>' + data[7] + '</td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '</tr>',
                    '<tr class="b-top-none">',
                    '<td><label class="mb-none">Password</label></td>',
                    '<td>' + data[8] + '</td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '</tr>'
                ].join('');
            };

            // insert the expand/collapse column
            var th = document.createElement('th');
            var td = document.createElement('td');
            td.innerHTML = '<i data-toggle class="fa fa-plus-circle text-primary h4 m-none" style="cursor: pointer;"></i>';
            td.className = "text-center";

            $table
                .find('thead tr').each(function() {
                    this.insertBefore(th, this.childNodes[0]);
                });

            $table
                .find('tbody tr').each(function() {
                    this.insertBefore(td.cloneNode(true), this.childNodes[0]);
                });

            // initialize
            var datatable = $table.dataTable({
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [0]
                }],
                aaSorting: [
                    [1, 'asc']
                ]
            });

            // add a listener
            $table.on('click', 'i[data-toggle]', function() {
                var $this = $(this),
                    tr = $(this).closest('tr').get(0);

                if (datatable.fnIsOpen(tr)) {
                    $this.removeClass('fa-minus-circle').addClass('fa-plus-circle');
                    datatable.fnClose(tr);
                } else {
                    $this.removeClass('fa-plus-circle').addClass('fa-minus-circle');
                    datatable.fnOpen(tr, fnFormatDetails(datatable, tr), 'details');
                }
            });
        };

        $(function() {
            datatableInit();
        });

    }).apply(this, [jQuery]);
</script>


<!-- Table Teacher -->
<script type="text/javascript">
    (function($) {

        'use strict';

        var datatableInit = function() {
            var $table = $('#table_teacher');

            // format function for row details
            var fnFormatDetails = function(datatable, tr) {
                var data = datatable.fnGetData(tr);

                return [
                    '<table class="table mb-none">',
                    '<tr class="b-top-none">',
                    '<td><label class="mb-none">Username</label></td>',
                    '<td>' + data[6] + '</td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '</tr>',
                    '<tr class="b-top-none">',
                    '<td><label class="mb-none">Password</label></td>',
                    '<td>' + data[7] + '</td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '<td></td>',
                    '</tr>'
                ].join('');
            };

            // insert the expand/collapse column
            var th = document.createElement('th');
            var td = document.createElement('td');
            td.innerHTML = '<i data-toggle class="fa fa-plus-circle text-primary h4 m-none" style="cursor: pointer;"></i>';
            td.className = "text-center";

            $table
                .find('thead tr').each(function() {
                    this.insertBefore(th, this.childNodes[0]);
                });

            $table
                .find('tbody tr').each(function() {
                    this.insertBefore(td.cloneNode(true), this.childNodes[0]);
                });

            // initialize
            var datatable = $table.dataTable({
                aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [0]
                }],
                aaSorting: [
                    [1, 'asc']
                ]
            });

            // add a listener
            $table.on('click', 'i[data-toggle]', function() {
                var $this = $(this),
                    tr = $(this).closest('tr').get(0);

                if (datatable.fnIsOpen(tr)) {
                    $this.removeClass('fa-minus-circle').addClass('fa-plus-circle');
                    datatable.fnClose(tr);
                } else {
                    $this.removeClass('fa-plus-circle').addClass('fa-minus-circle');
                    datatable.fnOpen(tr, fnFormatDetails(datatable, tr), 'details');
                }
            });
        };

        $(function() {
            datatableInit();
        });

    }).apply(this, [jQuery]);
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel-riwayat').DataTable();
    });

    function changeValue(id) {
        name = document.getElementById(name_otomatis.value)
        document.getElementById('nik_otomatis').value = nik[name].nik;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabel-riwayat').DataTable();
    });
</script>

<script type="text/javascript">
    $(function() {
        datatableInit();
    });
</script>

<script type="text/javascript">
    function autofill() {
        alert('dipencet');
        let class1 = $('#class').val();
        // $('#nik').val(id[nik]);
        alert(class1);
        let name1 =

            $('#name').text(date);
        // $.ajax({
        //     url = '<?= base_url() ?>staff/detailStudent',
        //     data = {
        //         nik: nik
        //     },
        //     method: 'post',
        //     // dataType: 'json',
        //     success: function(data) {
        //         alert('success');
        //     }
        // });
        // document.getElementById('nik_otomatis').value=
    }
</script>



</body>

</html>