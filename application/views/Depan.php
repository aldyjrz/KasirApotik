<!DOCTYPE html>
<html xmlns="http:/www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APOTEK BSI - Daftar Harga</title>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache"> <META HTTP-EQUIV="Expires" CONTENT="-1"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/all.css">
    <!-- DataTables -->
    
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet"
        href="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datetimepicker/jquery.datetimepicker.css">

    <!-- summernote -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Google Fonts-->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/select2/css/select2.min.css">


    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
 
  <link  href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/font-awesome/js/all.min.js"></script>

    </link>
    <style>
    #obatList-add {
        display: block;
        position: relative
    }


    #satuanList-add {
        display: block;
        position: relative;
        list-style: none;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    #satuanList-add li {
        background: #FAFAFA;
        border-bottom: #ddd 1px solid;
    }

    #satuanList-add li:hover,
    #satuanList-add li.autocomplete_active {
        background: #2a84ae;
        color: #fff;
        cursor: pointer;
    }

    #obatList-add {
        display: block;
        position: relative
    }


    #daftar-autocomplete {
        list-style: none;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    #daftar-autocomplete li {
        background: #FAFAFA;
        border-bottom: #ddd 1px solid;

    }

    #daftar-autocomplete li:hover,
    #daftar-autocomplete li.autocomplete_active {
        background: #2a84ae;
        color: #fff;
        cursor: pointer;
    }

    #daftar-autocomplete li b,
    #daftar-autocomplete li span {
        margin-left: 5px;

    }


    #hasil_pencarian {
        padding: 0px;
        display: none;
        position: absolute;
        max-height: 350px;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;

    }
    </style>
</head>

<body class="sidebar-collapse">
    <!-- Image and text -->
<nav class="navbar sticky-top navbar-light bg-dark">
  <a class="navbar-brand text-center" href="#">APOTEK BSI</a>
</nav>
    <div id="wrapper" >

        <div class="content-wrapper"> 
                <div class="card-body "> 

                             <?php echo $contents; ?>
                    
                    </div>
               
        </div>
        <!-- /. PAGE INNER  -->


    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2007 - 2022 <a href="https://apotekilham.com">APOTEK BSI</a>.</strong> All rights
            reserved.
        </footer>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js --> 
 
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
   <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>


    <!-- bootstrap color picker -->
    <script src="<?php echo base_url() ?>assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src ="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
  


    <script type="text/javascript">
    
    function dataTable() {
        var table = $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    }

    function mainMenu() {
        $('#main-menu').metisMenu();

        $(window).bind("load resize", function() {
            if ($(this).width() < 768) {
                $('div.sidebar-collapse').addClass('collapse')
            } else {
                $('div.sidebar-collapse').removeClass('collapse')
            }
        });

    }
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    $(document).ready(function() {
       // initAutoComplete();
        dataTable();
        mainMenu();
        $(".obat-add").select2({});
      

        $("#kepada").select2({});

        $(".add-more").click(function() {
            console.log("initialze clicked ");

            var html = $(".copy .form-row").clone();
            var lastId = $(".after-add-more .form-row:last-child").data("id")
            html.attr("data-id", lastId + 1)
            $(".after-add-more").append(html);
            initAutoComplete();
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });


      




    });
    
    </script>
</body>

</html>