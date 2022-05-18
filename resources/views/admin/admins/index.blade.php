@extends('admin.layouts.app')

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">المشرفين</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المشرفين</li>
            </ol>
        </div>
        <div class="mr-auto pageheader-btn">

            <button id="addButton"  class="btn btn-secondary btn-icon text-white">
                <span>
                    <i class="fe fe-plus"></i>
                </span> إضافة مشرف
            </button>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-4 -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">قائمة المشرفين</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basicExample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                            <thead>
                            <tr>
{{--                                <th>Name</th>--}}
                                <th>#</th>
                                <th>الإسم</th>
                                <th>البريد الإلكترونى</th>
                                <th>رقم الهاتف</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addOrUpdateForm" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">


            <div class="modal-content" style="overflow-y: scroll !important;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">المشرفين</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="form-for-addOrUpdateForm">

                </div>
                <div class="modal-footer text-center d-flex justify-content-center">
                    <button id="save"  form="Form"  type="submit" class="btn btn-success">حفظ </button>

                    <button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect text-start" data-dismiss="modal" aria-label="Close">الغاء</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    @include('admin.layouts.inc.loadAjax')
    <script>


        var columns = [
            {"data": "id",   orderable: true,searchable: true},
            {"data": "name",   orderable: true,searchable: true},
            {"data": "email",   orderable: true,searchable: true},
            {"data": "phone",   orderable: true,searchable: true},
            {"data": "actions", orderable: false, searchable: false}
        ];
        var tableUrl = "{{route('admins.index')}}";
        var editUrl = "{{route('admins.edit',':id')}}";
        datatable(columns,tableUrl,editUrl);
        addButton('addButton','addOrUpdateForm','{{route('admins.create')}}');

    </script>
@endsection
