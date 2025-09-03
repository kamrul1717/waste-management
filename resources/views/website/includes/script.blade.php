<!-- jQuery -->
<script src="{{url('website')}}/assets/libs/jquery/jquery-3.6.0.min.js"></script>
<!-- bootstrap -->
<script src="{{url('website')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- simplebar -->
<script src="{{url('website')}}/assets/libs/simplebar/simplebar.min.js"></script>
<!-- node-waves -->
<script src="{{url('website')}}/assets/libs/node-waves/waves.min.js"></script>
<!-- feather-icons -->
<script src="{{url('website')}}/assets/libs/feather-icons/feather.min.js"></script>
<script src="{{url('website')}}/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="{{url('website')}}/assets/js/plugins.js"></script>
<!-- apexcharts -->
<script src="{{url('website')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- Vector map-->
<script src="{{url('website')}}/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{url('website')}}/assets/libs/jsvectormap/maps/world-merc.js"></script>
<!--Swiper slider js-->
<script src="{{url('website')}}/assets/libs/swiper/swiper-bundle.min.js"></script>
<!-- Dashboard init -->
<script src="{{url('website')}}/assets/js/pages/dashboard-ecommerce.init.js"></script>
<!-- Sweet Alerts js -->
<script src="{{url('website')}}/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<script src="{{url('website')}}/assets/js/pages/sweetalerts.init.js"></script>
<!-- Select2 JS -->
<script src="{{url('website')}}/assets/libs/select2/select2.min.js"></script>
<!-- Flatpickr JavaScript -->
<script src="{{url('website')}}/assets/libs/flatpickr/flatpickr.js"></script>
<!--datatable js-->
<script src="{{url('website')}}/assets/libs/datatable/jquery.dataTables.min.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/dataTables.bootstrap5.min.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/dataTables.responsive.min.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/dataTables.buttons.min.js"></script>
<!--datatable button js-->
<script src="{{url('website')}}/assets/libs/datatable/buttons.print.min.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/buttons.html5.min.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/jszip.min.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/pdfmake.min.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/vfs_fonts.js"></script>
<script src="{{url('website')}}/assets/libs/datatable/buttons.colVis.min.js"></script>
<!--toastr js-->
<script src="{{url('website')}}/assets/libs/toastr/toastr.min.js"></script>
<!--jQueryDateTimePicker js-->
<script src="{{url('website')}}/assets/libs/jQueryUI/js/jquery-ui.js"></script>
<script src="{{url('website')}}/assets/libs/jQueryDateTimePicker/js/jquery-ui-timepicker-addon.min.js"></script>
<!--richtext js-->
<script src="{{url('website')}}/assets/libs/richtext/jquery.richtext.min.js" type="text/javascript"></script>
<!--MonthPicker js-->
<script src="{{url('website')}}/assets/libs/MonthPicker/MonthPicker.min.js" type="text/javascript"></script>
<script src="{{url('website')}}/assets/libs/YearPicker/yearpicker.js" type="text/javascript"></script>
<!-- App js -->
<script src="{{url('website')}}/assets/js/app.js"></script>
<script src="{{url('website')}}/assets/js/custom.js"></script>

<!-- form wizard init -->
<script src="{{url('website')}}/assets/js/pages/form-wizard.init.js"></script>
<script src="{{url('website')}}/assets/libs/JqueryValidate/JqueryValidate.min.js" type="text/javascript"></script>
<script>
    //To close the search Item start
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('employee');
        const input = document.getElementById('emp_id_text');

        // Check if click was outside the dropdown and input
        if (dropdown && !dropdown.contains(event.target) && !input.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>

{!! Toastr::message() !!}
@yield('footer_js')
