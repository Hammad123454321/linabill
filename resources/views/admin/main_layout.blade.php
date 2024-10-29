<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">

    <head>
        <meta charset="utf-8" />
        <title>{{ 'Wooglam' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('uploads/header_image/' . $headerdata->logo) }}">

        <!-- plugin css -->
        <link href="{{ asset('backend_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap css -->
        <link href="{{ asset('backend_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- App css -->
        <link href="{{ asset('backend_assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Icons css -->
        <link href="{{ asset('backend_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!--Toastr-->
        <link href="{{ asset('backend_assets/toastr/toastr.css') }}" rel="stylesheet">

        <!--Sweet Alert-->
        <link href="{{ asset('backend_assets/sweet_alert_11.11/sweetalert2.min.css') }}" rel="stylesheet">

        <!--Select2 [ OPTIONAL ]-->
        <link href="{{ asset('backend_assets/libs/select2/css/select2.min.css') }}" rel="stylesheet">
        
        <!--Data Table-->
        <link rel="stylesheet" href="{{ asset('backend_assets/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend_assets/datatable/datatable_fixed_header/fixed_header.css') }}">
        
        <style>
            .swal2-modal .swal2-confirm {
                background-color: #f1556c !important;
                font-size: .875rem !important;
            }
            
            .table>:not(caption)>*>* {
                padding: .35rem .85rem;
            }
            table.dataTable thead .sorting:before {
                display: none;
            }
            table.dataTable thead .sorting:after {
                display: none;
            }
            table.dataTable thead>tr>th.sorting {
                padding-right: 0.85rem;
            }
        </style>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Menu ========== -->
            @include('admin.layout.sidebar')
            <!-- ========== Left menu End ========== -->
            

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                @include('admin.layout.topbar')

                <div class="content">

                    @yield('page_content') 

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div><script>document.write(new Date().getFullYear())</script> © Copyright </div>
                            </div>
                            <div class="col-md-6">
                                {{-- <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end right-bar" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center w-100 p-0 offcanvas-header">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified w-100" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="offcanvas-body p-3 h-100" data-simplebar>
                <!-- Tab panes -->
                <div class="tab-content pt-0">

                    <div class="tab-pane active" id="settings-tab" role="tabpanel">

                        <div class="mt-n3">
                            <h6 class="fw-medium py-2 px-3 font-13 text-uppercase bg-light mx-n3 mt-n3 mb-3">
                                <span class="d-block py-1">Theme Settings</span>
                            </h6>
                        </div>

                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                        </div>

                        <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h5>

                        <div class="colorscheme-cardradio">
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">Light</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">Dark</label>
                                </div>
                            </div>
                        </div>

                        <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Content Width</h5>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-width" id="layout-width-default" value="default">
                                <label class="form-check-label" for="layout-width-default">Fluid (Default)</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-width" id="layout-width-boxed" value="boxed">
                                <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                            </div>
                        </div>

                        <div id="layout-mode">
                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Layout Mode</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-default" value="default">
                                    <label class="form-check-label" for="layout-mode-default">Default</label>
                                </div>


                                <div id="layout-detached">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-detached" value="detached">
                                        <label class="form-check-label" for="layout-mode-detached">Detached</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar Color</h5>

                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                <label class="form-check-label" for="topbar-color-light">Light</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                <label class="form-check-label" for="topbar-color-dark">Dark</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-brand" value="brand">
                                <label class="form-check-label" for="topbar-color-brand">Brand</label>
                            </div>
                        </div>

                        <div>
                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Color</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">Light</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-brand" value="brand">
                                    <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-gradient" value="gradient">
                                    <label class="form-check-label" for="leftbar-color-gradient">Gradient</label>
                                </div>
                            </div>
                        </div>

                        <div id="menu-icon-color">
                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Icon Color</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-two-column-color" id="twocolumn-menu-color-light" value="light">
                                    <label class="form-check-label" for="twocolumn-menu-color-light">Light</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-two-column-color" id="twocolumn-menu-color-dark" value="dark">
                                    <label class="form-check-label" for="twocolumn-menu-color-dark">Dark</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-two-column-color" id="twocolumn-menu-color-brand" value="brand">
                                    <label class="form-check-label" for="twocolumn-menu-color-brand">Brand</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-two-column-color" id="twocolumn-menu-color-gradient" value="gradient">
                                    <label class="form-check-label" for="twocolumn-menu-color-gradient">Gradient</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Icon Tone</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-icon" id="menu-icon-default" value="default">
                                    <label class="form-check-label" for="menu-icon-default">Default</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-menu-icon" id="menu-icon-twotone" value="twotones">
                                    <label class="form-check-label" for="menu-icon-twotone">Twotone</label>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar Size</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">Default</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label" for="leftbar-size-compact">Compact (Medium Width)</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">Condensed (Icon View)</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                    <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-fullscreen" value="fullscreen">
                                    <label class="form-check-label" for="leftbar-size-fullscreen">Fullscreen Layout</label>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-user">
                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h5>

                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="data-sidebar-user" id="sidebaruser-check">
                                <label class="form-check-label" for="sidebaruser-check">Enable</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="offcanvas-footer border-top py-2 px-2 text-center">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-light w-50" id="reset-layout">Reset</button>
                </div>
            </div>
        </div>

        {{-- <script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script> --}}
        
        <!-- Vendor js -->
        <script src="{{ asset('backend_assets/js/vendor.min.js') }}"></script>

        <!-- Theme Config Js -->
        <script src="{{ asset('backend_assets/js/head.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend_assets/js/app.min.js') }}"></script>

        <!--Toastr-->
        <script src="{{ asset('backend_assets/toastr/toastr.js') }}"></script>

        <!--Sweet Alert-->
        <script src="{{ asset('backend_assets/sweet_alert_11.11/sweetalert2.min.js') }}"></script>

        <!--Select2 [ OPTIONAL ]-->
        <script src="{{ asset('backend_assets/libs/select2/js/select2.min.js') }}"></script>

        <!--Form Validation-->
        <script src="{{ asset('backend_assets/validate/jquery.validate.js') }}"></script>
        <script src="{{ asset('backend_assets/validate/additional_method.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('backend_assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('backend_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('backend_assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

        <!-- Dashboard 2 init -->
        <script src="{{ asset('backend_assets/js/pages/dashboard-2.init.js') }}"></script>
        <!--Data Table-->
        <script src="{{ asset('backend_assets/datatable/datatablescripts.bundle.js') }}"></script>
        {{-- {{ asset('') }} --}}
        <script src="{{ asset('backend_assets/datatable/buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/jszip.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend_assets/datatable/buttons/vfs_fonts.js') }}"></script>

        <script src="{{ asset('backend_assets/datatable/datatable_fixed_header/fixed_header.min.js') }}"></script>


        <script>

            
            function number_format(number, locale = 'en-US', options = {}) {
                // Merge provided options with default options
                const defaultOptions = {
                    style: 'decimal', // Default style is decimal
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2,
                };

                // Format the number using toLocaleString() method
                return number.toLocaleString(locale, defaultOptions);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            let csrf = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                // other data
            };

            // Function to save current page index to localStorage
            function savePaginationState(tableId, pageIndex) {
                localStorage.setItem(tableId + '_pageIndex', pageIndex);
            }

            // Function to load pagination state from localStorage
            function loadPaginationState(tableId) {
                return parseInt(localStorage.getItem(tableId + '_pageIndex')) || 0;
            }

            function load_data(options = {}) {
                // Set up CSRF token for AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Default options for DataTables
                var defaults = {
                    tablename: "#main_table",
                    order: [1, 'desc'],
                    ajax: [],
                    columns: [],
                    columnDefs: [],
                    centeredColumnsOnPrintPdf: [],
                    footerCallback: null
                };

                // Merge default options with user-provided options
                var settings = $.extend({}, defaults, options);

                // Define DataTable options
                var datatableOptions = {
                    "bDestroy": true,
                    searching: true,
                    order: settings.order,
                    "iDisplayLength": 25,
                    dom: "<'row d-none'<'col-sm-12 col-md-3'><'col-sm-12 col-md-4 text-right'><'col-sm-12 col-md-5 text-right exportbtn'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-5'i><'col-sm-12 col-md-5 text-right'p>>",
                    "lengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    "language": {
                        "loadingRecords": "<span class='fa-stack fa-lg'>\n\
                                                <i class='fa fa-spinner fa-spin fa-fw fs-2'></i>\n\
                                            </span>&emsp;Please Wait ...",
                        "zeroRecords": "Cannot find any record related to your search."
                    },
                    "fnInitComplete": function(oSettings, json) {
                        $('[data-toggle="tooltip"]').tooltip();
                    },
                    "processing": true,
                    "serverSide": true,
                    ajax: settings.ajax,
                    columns: settings.columns,
                    columnDefs: settings.columnDefs,
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            className: 'btn-default', 
                            filename: 'Users',
                            title: "",
                            messageTop: "",
                            exportOptions: {
                                columns: ':visible:not(:last-child)',
                            },
                        },
                        {
                            extend: 'pdfHtml5', 
                            className: 'btn-default', 
                            filename: ""+' Ledger', 
                            title: "Party Name: "+"",
                            orientation: 'landscape',
                            pageSize: 'A4',
                            footer: true,
                            exportOptions: {
                                columns: ':visible:not(:last-child)',
                            },
                            customize: function (doc) {
                                    // Adjust the page margins
                                    doc.pageMargins = [20, 20, 20, 20]; // left, top, right, bottom

                                    // Add the image to the top
                                    // doc.content.splice(0, 0, {
                                    //     margin: [0, 0, 0, 12],
                                    //     alignment: 'center',
                                    //     image: pdf_image,
                                    //     width: 830, // Set width of the image
                                    //     // height: 50  // Set height of the image
                                    // });

                                    // Adjust the table layout to use 100% width
                                    var tableNode = doc.content.find(function (node) {
                                        return node.table !== undefined;
                                    });

                                    if (tableNode) {
                                        // Set table widths to 100%
                                        tableNode.table.widths = Array(tableNode.table.body[0].length + 1).join('*').split('');

                                        // Customize table layout
                                        tableNode.layout = {
                                            hLineWidth: function (i) {
                                                return i === 0 || i === tableNode.table.body.length ? 0.5 : 0.25;
                                            },
                                            vLineWidth: function (i) {
                                                return 0;
                                            },
                                            hLineColor: function (i) {
                                                return i === 0 || i === tableNode.table.body.length ? '#000000' : '#aaaaaa';
                                            },
                                            paddingLeft: function (i) {
                                                return i === 0 ? 0 : 8;
                                            },
                                            paddingRight: function (i, node) {
                                                return i === node.table.widths.length - 1 ? 0 : 8;
                                            },
                                            paddingTop: function (i) {
                                                return 8;
                                            },
                                            paddingBottom: function (i) {
                                                return 8;
                                            }
                                        };

                                        // Center align specific columns
                                        var body = tableNode.table.body;
                                        var columnIndicesToCenter = settings.centeredColumnsOnPrintPdf; // Example column indices to center

                                        for (var i = 0; i < body.length; i++) {
                                            columnIndicesToCenter.forEach(function (index) {
                                                if (body[i][index]) {
                                                    body[i][index].alignment = 'center';
                                                }
                                            });
                                        }
                                    }

                                    // Center align the message
                                    if (doc.styles.message) {
                                        doc.styles.message.alignment = "center";
                                    }

                                    // Left align the table header
                                    if (doc.styles.tableHeader) {
                                        doc.styles.tableHeader.alignment = "left";
                                    }
                                }
                        },
                        {
                            extend: 'print', 
                            className: 'btn-default', 
                            title: "",
                            messageTop: "<h4>"+""+"</h4>",
                            autoPrint: false,
                            footer: true,
                            exportOptions: {
                                columns: ':visible:not(:last-child)',
                            },
                            customize: function ( win ) {
                                        $(win.document.body).find('h1').css('text-align', 'center');
                                        $(win.document.body).find('h4').css('text-align', 'center');
                                        $(win.document.body).css( 'font-size', '14-px' );
                                        $(win.document.body).css( 'background-color', 'transparent' );
                                        $(win.document.body).find( 'table' )
                                            .addClass( 'compact' )
                                            .css( 'font-size', 'inherit' );
                                        $(win.document.body).find( 'td' )
                                        .css( 'border-bottom', '1px solid #ddd' );

                                        // Center specific columns
                                        $(win.document.body).find('table').find('tr').each(function () {
                                            var columnIndicesToCenter = settings.centeredColumnsOnPrintPdf;
                                            columnIndicesToCenter.forEach(function (index) {
                                                $(this).find('td:eq(' + index + '), th:eq(' + index + ')').css('text-align', 'center');
                                            }, this);
                                        });
                                }
                        },
                        {
                            extend: 'colvis',
                            className: 'btn-default',
                            text: 'Show/Hide',
                            exportOptions: {
                                columns: ':visible',
                            }
                        },
                    ],
                    footerCallback: settings.footerCallback,
                    // Initialize DataTable with options
                    "initComplete": function () {
                        var table = this.api();
                        var tableId = settings.tablename;
                        table.on('page.dt', function () {
                            savePaginationState(tableId, table.page());
                        });
                    }
                };

                // Initialize DataTable with options
                $(settings.tablename).DataTable(datatableOptions);
            }


        </script>
       
    </body>
</html>