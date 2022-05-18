<link href="{{url('assets/admin')}}/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="{{url('assets/admin')}}/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
<link href="{{url('assets/admin')}}/plugins/datatable/fileexport/buttons.bootstrap4.min.css"  />
{{--================= sweetalert ================ --}}
<link href="{{url('assets/default')}}/sweetalert/sweetalert.css" rel="stylesheet">
{{--================= sweetalert ================ --}}
@include('layouts.formLoader.loaderCss')
<!-- INTERNAL  DATA TABLE JS-->
<script src="{{url('assets/admin')}}/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/dataTables.bootstrap4.min.js"></script>
{{--<script src="{{url('assets/admin')}}/plugins/datatable/datatable.js"></script>--}}
<script src="{{url('assets/admin')}}/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/jszip.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/pdfmake.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/vfs_fonts.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/buttons.html5.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/buttons.print.min.js"></script>
<script src="{{url('assets/admin')}}/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
<!-- SIDEBAR JS -->
{{--================= sweetalert ================ --}}
<script src="{{url('assets/default')}}/sweetalert/sweetalert.min.js"></script>
{{--================= sweetalert ================ --}}
<script>
    var loader = '<div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
    var  mainCoulmns = null;
    var  mainUrl = '';
    var  mainEditUrl = '';
    var formId = '';
    function datatable(coulmns,url,editUrl)
    {
        mainCoulmns = coulmns;
        mainUrl = url;
        mainEditUrl = editUrl;
        var table =  $("#basicExample").DataTable({
            // lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
            dom: 'Bfrtip',
            responsive: 1,
            "processing": true,
            "lengthChange": true,
            "serverSide": true,
            "ordering": true,
            "searching": true,
            'iDisplayLength': 20,
            "ajax": url,
            "columns": coulmns,
            "language": {
                "sProcessing":   "{{trans('admin.sProcessing')}}",
                "sLengthMenu":   "{{trans('admin.sLengthMenu')}}",
                "sZeroRecords":  "{{trans('admin.sZeroRecords')}}",
                "sInfo":         "{{trans('admin.sInfo')}}",
                "sInfoEmpty":    "{{trans('admin.sInfoEmpty')}}",
                "sInfoFiltered": "{{trans('admin.sInfoFiltered')}}",
                "sInfoPostFix":  "",
                "sSearch":       "{{trans('admin.sSearch')}}:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "{{trans('admin.sFirst')}}",
                    "sPrevious": "{{trans('admin.sPrevious')}}",
                    "sNext":     "{{trans('admin.sNext')}}",
                    "sLast":     "{{trans('admin.sLast')}}"
                }
            },
            order: [
                // [2, "desc"]
            ],
        })
        table.buttons().container()
            .appendTo( '#exportexample_wrapper .col-md-6:eq(0)' );
    }

    function addButton(btnId,formId,url){
        $(document).on('click','#'+btnId,function (e) {
            e.preventDefault();
            $('#addOrUpdateForm').modal('show');
            $('#form-for-'+formId).html(loader);
            setTimeout(function () {
                $('#form-for-addOrUpdateForm').load(url);
            },1000);
        });
    }
    $(document).on('click','.editButton',function (){
        var id = $(this).data('id');
        $('#addOrUpdateForm').modal('show');
        $('#form-for-addOrUpdateForm').html(loader);
        var editUrl = mainEditUrl.replace(':id',id)
        setTimeout(function () {
            $('#form-for-addOrUpdateForm').load(editUrl);
        },1000);
    });
    $(document).on('submit','form#Form',function(e) {
        e.preventDefault();
        var myForm = $("#Form")[0]
        var formData = new FormData(myForm)
        var url = $('#Form').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#form-for-addOrUpdateForm #Form').hide();
                $('#form-for-addOrUpdateForm').append(loader);
                // $('.loader-ajax').show()

            },
            complete: function(){


            },
            success: function (data) {

                window.setTimeout(function() {
                    $('#addOrUpdateForm').modal('hide');
                    toastr.success(data.message);
                    reloadDataTable();

                }, 2000);


            },
            error: function (data) {
                $('#form-for-addOrUpdateForm > .lds-grid').hide(loader);
                $('#form-for-addOrUpdateForm #Form').show();
                $('.loader-ajax').hide()
                if (data.status === 500) {
                    // $('#exampleModalCenter').modal("hide");
                    toastr.error('هناك خطأ ما');

                }
                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value,key);
                                console.log(key + " " + value);
                                // myToast(key, value, 'top-left', '#ff6849', 'error',4000, 2);

                            });

                        } else {

                        }
                    });
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
    function reloadDataTable() {
        console.log($("#basicExample tbody").html());
        $("#basicExample").DataTable().destroy();
        $("#basicExample tbody").html('');
        datatable(mainCoulmns,mainUrl)
    }

    //========================================================================
    //========================================================================
    //============================Delete======================================
    //========================================================================
    //delete one row
    $(document).on('click', '.delete', function () {
        var id = $(this).data('id');
        swal({
            title: "هل أنت متأكد من الحذف؟",
            text: "لا يمكنك التراجع بعد ذلك؟",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "موافق",
            cancelButtonText: "الغاء",
            okButtonText: "موافق",
            closeOnConfirm: false
        }, function () {
            var url = mainUrl+'/'+id;
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {id: id},
                beforeSend: function () {
                    swal.close();
                    $('#custom-loader').show()
                },
                success: function (data) {
                    toastr.success(data.message);
                    reloadDataTable()
                    setTimeout(function () {
                        $('#custom-loader').hide()
                    }, 1000);
                },error: function(data) {
                    swal.close()
                    toastr.error(' هناك خطأ ما');
                }

            });
        });
    });

</script>
