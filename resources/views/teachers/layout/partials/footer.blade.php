<script src="{{ asset('frontend_assets/vendors/jquery-1.9.1.min.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/modernizr-2.6.2-respond-1.1.0.min.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/jGrowl/jquery.jgrowl.js') }}">
</script>
<script src="{{ asset('frontend_assets/bootstrap/js/bootstrap.min.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/easypiechart/jquery.easy-pie-chart.js') }}">
</script>
<script src="{{ asset('frontend_assets/assets/scripts.js') }}"></script>
<!-- data table -->
<script
    src="{{ asset('frontend_assets/vendors/datatables/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('frontend_assets/assets/DT_bootstrap.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/jGrowl/jquery.jgrowl.js') }}">
</script>
<script src="{{ asset('frontend_assets/vendors/jquery.uniform.min.js') }}">
</script>
<script src="{{ asset('frontend_assets/vendors/chosen.jquery.min.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/bootstrap-datepicker.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js') }}">
</script>
<script src="{{ asset('frontend_assets/vendors/ckeditor/ckeditor.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/ckeditor/adapters/jquery.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('frontend_assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}">
</script>
<script
    src="{{ asset('frontend_assets/vendors/fullcalendar/fullcalendar.js') }}">
</script>
<script src="{{ asset('frontend_assets/vendors/fullcalendar/gcal.js') }}">
</script>
<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
<script
    src="{{ asset('frontend_assets/vendors/bootstrap-datepicker.js') }}">
</script>


<script>
    $(function () {
        // Easy pie charts
        $('.chart').easyPieChart({
            animate: 1000
        });
    });

    $(function () {

    });

    $(function () {
        $('.tooltip').tooltip();
        $('.tooltip-left').tooltip({
            placement: 'left'
        });
        $('.tooltip-right').tooltip({
            placement: 'right'
        });
        $('.tooltip-top').tooltip({
            placement: 'top'
        });
        $('.tooltip-bottom').tooltip({
            placement: 'bottom'
        });

        $('.popover-left').popover({
            placement: 'left',
            trigger: 'hover'
        });
        $('.popover-right').popover({
            placement: 'right',
            trigger: 'hover'
        });
        $('.popover-top').popover({
            placement: 'top',
            trigger: 'hover'
        });
        $('.popover-bottom').popover({
            placement: 'bottom',
            trigger: 'hover'
        });

        $('.notification').click(function () {
            var $id = $(this).attr('id');
            switch ($id) {
                case 'notification-sticky':
                    $.jGrowl("Stick this!", {
                        sticky: true
                    });
                    break;

                case 'notification-header':
                    $.jGrowl("A message with a header", {
                        header: 'Important'
                    });
                    break;

                default:
                    $.jGrowl("Hello world!");
                    break;
            }
        });
    });

    $(function () {
        // Bootstrap


        // Ckeditor standard
        $('textarea#ckeditor_standard').ckeditor({
            width: '98%',
            height: '150px',
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
                }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo',
                    'Redo'
                ], // Defines toolbar group without name.
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic']
                }
            ]
        });
        $('textarea#ckeditor_full').ckeditor({
            width: '98%',
            height: '150px'
        });
    });

    $(function () {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();



        $('#rootwizard .finish').click(function () {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });

    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar-o').toggleClass('active');
        });

    });

</script>
