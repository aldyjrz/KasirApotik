<!DOCTYPE html>
<html xmlns="http:/www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APOTEK BSI</title>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache"> <META HTTP-EQUIV="Expires" CONTENT="-1"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">

    
    <!-- DataTables -->
    
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.png">

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


    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->

   
    <!-- Bootstrap -->
    <link  href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/font-awesome/js/all.min.js"></script>

    </link>
    <style>
    .form-group > .select2-container {
    width: 100% !important;
}
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

<body>
    <div id="wrapper" >
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                <a id="jamServer" href="/apotik" class="nav-link"><?=date('Y-m-d H:i:s')?></a>
                </li>

            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fa fa-arrows-alt"></i> </a>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa  fa-user-astronaut"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span
                            class="dropdown-item dropdown-header"><?= $this->session->userdata('nama_lengkap')?></span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
						<?php        
						$ci =&get_instance();
 
						$model = $ci->load->model('Model_pesanan');

						$data = $ci->Model_pesanan->get_count()->result();
						$data2 = $ci->Model_pesanan->count_penjualan()->result();


?>
                            <i class="fas fa-envelope mr-2"></i> Ada <?= $data2[0]->cou?> Transaksi
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> Total <?= $data[0]->cou?> Pesanan Baru
                        </a>
                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>
                        <a href="<?=base_url()?>Auth/logout" class="dropdown-item dropdown-footer"> <i class="fas fa-power-off mr-2"></i>
                            Logout</a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!--/. NAV TOP  -->

        <!-- sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="    bottom: 0;
    float: none;
    left: 0;
    position: fixed;
    top: 0;
">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <span class="nav nav-brand brand-text font-weight-light  text-lg-center">APOTEK BSI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">

                        <a href="#" class="d-block">Login as <?= $this->session->userdata('username')?></a>
                    </div>
                </div>



                <!-- Sidebar Menu -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item  ">

                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>

                        <li class="nav-item ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'master/Obat'?>" class="nav-link ">
                                        <i class="fa   fa-briefcase-medical nav-icon"></i>
                                        <p>Master Obat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'master/Pbf'?>" class="nav-link">
                                        <i class="fa  fa-building nav-icon"></i>
                                        <p>Master PBF</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?php echo base_url().'master/users'?>" class="nav-link">
                                        <i class="fa fa-user-astronaut nav-icon"></i>
                                        <p>Master User</p>
                                    </a>
                                </li> -->

                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon  fa fa-money-bill"></i>
                                <p>
                                    Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'transaksi/kasir'?>" class="nav-link ">
                                        <i class="fa  fa-dollar-sign nav-icon"></i>
                                        <p>Kasir</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'transaksi/kasir/riwayat_transaksi'?>" class="nav-link ">
                                        <i class="fa fa-history nav-icon"></i>
                                        <p>Riwayat Transaksi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'master/Pesanan'?>" class="nav-link">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>Pesanan</p>
                                    </a>
                                </li>
<!--                                 
                                  <li class="nav-item">
                                    <a href="<?php echo base_url().'master/Pesanan_pre'?>" class="nav-link">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>SP Prekursor</p>
                                    </a>
                                </li>
   <li class="nav-item">
                                    <a href="<?php echo base_url().'master/Pesanan_oot'?>" class="nav-link">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>SP OOT</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p>
                                    Report
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'master/Pesanan/report'?>" class="nav-link ">
                                        <i class="fa fa-receipt nav-icon"></i>
                                        <p>Laporan Mutasi</p>
                                    </a>
                                </li>

                            </ul> -->
                             <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'master/Pesanan/Obat'?>" class="nav-link ">
                                        <i class="fa fa-receipt nav-icon"></i>
                                        <p>Laporan Penjualan Obat</p>
                                    </a>
                                </li>

                            </ul>
                              <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'Invoice'?>" class="nav-link ">
                                        <i class="fa fa-receipt nav-icon"></i>
                                        <p>Laporan Invoice</p>
                                    </a>
                                </li>

                            </ul> -->
                        </li>
<!--                         
                         <li class="nav-item ">
                <a href="<?php echo base_url().'Belanja'?>" class="nav-link ">
                                     <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    List Belanja Aktif
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            </li> -->
                        <hr class='ml-5 mr-5' style="display: block; height: 1px;
    border: 0; border-top: 1px solid #ccc;
    margin: 1em 0; padding: 0; ">
                        <!-- <li class="nav-item  ">
                    <a href="./include/logout.php" class="nav-link bg-red">

                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>

                </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper"> 
                <div class="card-body "> 

                             <?php echo $contents; ?>
                    
                    </div>
               
        </div>
        <!-- /. PAGE INNER  -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>

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
    
    function initAutoComplete() {
        jQuery(".obat-add").autocomplete({
            source: '<?=base_url('master/Obat/search')?>',
            appendTo: "#obatList-add",
            select: function(event, ui) {
                var id = $(this).parent().parent().data("id");
                var ids = $(this).parent().data("id");
                var a = ui.item.label.split(";");


                $(`.form-row[data-id=${id}] .est_harga`).val(a[1]);
                $(`.form-row[data-id=${id}] .obat-add`).val(a[0]);

                return false;
            },

        });

        console.log("initialze ");

    }

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
    $(document).ready(function() {
        initAutoComplete();
        dataTable();
        mainMenu();
   
        $("#dari").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true

        });
        $("#sampai").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true


        });

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


        $("#satuanList").autocomplete({
            source: '<?=base_url('master/Obat/satuan')?>',
            appendTo: "#satuanList-add"
        });

      $("#pbf").select2({});
  var serverClock = jQuery("#jamServer");
if (serverClock.length > 0) {
    showServerTime(serverClock, serverClock.text());
}

        $('#tgl_pesanan').change(function(){ 
                var date=$(this).val();
                $.ajax({
                    url : "<?php echo base_url('/Invoice/get_nosp');?>",
                    method : "POST",
                    data : {date: date},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].kode_pesanan+'>'+data[i].kode_pesanan+'  '+data[i].pic_tertuju+'</option>';
                        }
                        $('#sub_category').html(html);
 
                    }
                });
                return false;
            }); 

function showServerTime(obj, time) {
    var parts   = time.split(":"),
        newTime = new Date();
    console.log(time);
    newTime.setHours(parseInt(parts[0], 10));
    newTime.setMinutes(parseInt(parts[1], 10));
    newTime.setSeconds(parseInt(parts[2], 10));
 
    var timeDifference  = new Date().getTime() - newTime.getTime();
 
    var methods = { 
        displayTime: function () {
            var now = new Date(new Date().getTime() - timeDifference);
            
            obj.text([
              
                methods.leadZeros(now.getHours(), 2),
                methods.leadZeros(now.getMinutes(), 2),
                methods.leadZeros(now.getSeconds(), 2)
            ].join(":"));
            setTimeout(methods.displayTime, 500);
        },
  
        leadZeros: function (time, width) {
            while (String(time).length < width) {
                time = "0" + time;
            }
            return  time;
        }
    }
    methods.displayTime();
}


    });
    
    </script>
</body>

</html>