<script src="https://kit.fontawesome.com/40e182ddd7.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/jquery1-3.4.1.min.js') }}"></script>
<script src="{{ asset('admin/js/popper1.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap1.min.js') }}"></script>
<script src="{{ asset('admin/js/metisMenu.js') }}"></script>
<script src="{{ asset('admin/vendors/count_up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/vendors/chartlist/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/count_up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('admin/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatable/js/buttons.print.min.js') }}"></script>
<script src='{{ asset('admin/vendors/calender_js/core/main.js') }}'></script>
<script src='{{ asset('admin/vendors/calender_js/interaction/main.js') }}'></script>
<script src='{{ asset('admin/vendors/calender_js/daygrid/main.js') }}'></script>
<script src='{{ asset('admin/vendors/calender_js/timegrid/main.js') }}'></script>
<script src='{{ asset('admin/vendors/calender_js/list/main.js') }}'></script>
<script src='{{ asset('admin/vendors/calender_js/activation.js') }}'></script>
<script src="{{ asset('admin/js/chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/progressbar/jquery.barfiller.js') }}"></script>
<script src="{{ asset('admin/vendors/tagsinput/tagsinput.js') }}"></script>
<script src="{{ asset('admin/vendors/text_editor/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin/vendors/am_chart/amcharts.js') }}"></script>
<script src="{{ asset('admin/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/vendors/scroll/scrollable-custom.js') }}"></script>
<script src="{{ asset('admin/vendors/chart_am/core.js') }}"></script>
<script src="{{ asset('admin/vendors/chart_am/charts.js') }}"></script>
<script src="{{ asset('admin/vendors/chart_am/animated.js') }}"></script>
<script src="{{ asset('admin/vendors/chart_am/kelly.js') }}"></script>
<script src="{{ asset('admin/vendors/chart_am/chart-custom.js') }}"></script>
<script src="{{ asset('admin/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
<script>
$(document).ready(function () {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $("select[name='services_id']").change(function () {
        var services_id = 1;
        services_id = $(this).val();
        $.ajax({
            url: '{{ route('admin.information.patients.fetchDoctor') }}',
            method: "POST",
            data: {'services_id' : services_id},
            success: function (data) {
                $("select[name='doctors_id']").html(data)
            },
        })
    });
});
</script>



<script type="text/javascript">
    $('#my_table').DataTable();

    
</script>
