@extends('website.master')

@section('title', 'Manage Wards')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Wards</h4>
                    <div class="page-title-right">
                        <a href="javascript:void(0)" class="btn btn-success" onclick="showForm()">+ Add Ward</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ward List -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Create Modal -->
    <div class="modal fade modal-lg" id="wardModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="wardForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Ward</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="number" class="form-label">Number<span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="number" name="number" placeholder="Number" value="" maxlength="255" required >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="saveBtn" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade modal-lg" id="ajaxModelUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lookup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form id="dataFormUpdate" name="dataFormUpdate" class="tablelist-form" autocomplete="off">
                    <div class="alert alert-danger" id="updateError" style="display:none"></div>
                    <div class="modal-body">
                        <input type="hidden" name="data_id" id="data_id">
                        <div class="mb-3">
                            <label for="number" class="form-label">Number<span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="number2" name="number" placeholder="Number" value="" maxlength="255" required >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Status <span style="color: red;">*</span></label>
                            <div class="col-sm-12">
                                <select name="status" class="form-control" id="status">

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-start">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="updateBtn">Update</button>
                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection


@section('footer_js')
<script>
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

// Load DataTable
let table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('wards') }}",
    columns: [
        { data: 'number', name: 'number' },
        { data: 'status', name: 'status',
            render: function(data) {
                return data == 1 
                    ? '<span class="badge bg-success">Active</span>' 
                    : '<span class="badge bg-danger">Inactive</span>';
            }
        },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ]
});

    // Show Modal (create/edit)
    function showForm(id = null) {
        $('#wardForm')[0].reset();
        $('#ward_id').val('');
        $('#wardModal').modal('show');
    }

    // Save/Update
    $('#wardForm').on('submit', function(e) {
        e.preventDefault();
        let id = $('#ward_id').val();
        let url = id ? "wards/update/" + id : "wards/store";

        $.post(url, $(this).serialize(), function(res) {
            $('#wardModal').modal('hide');
            table.ajax.reload();
            toastr.success(res.message);
        }).fail(err => toastr.error('Something went wrong'));
    });

    $('body').on('click', '.editData', function() {
        var dataId = $(this).data('id');
        $.get("{{ url('wards/edit') }}" + '/' + dataId, function(data) {
            console.log(data);
            $('label.error').remove();
            $('#dataFormUpdate').find('.error').removeClass('error');
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            $('#data_id').val(data.data.id);
            $('#modelHeadingUpdate').html("Edit Lookup");
            $('#updateBtn').val("edit-product-category");
            $('#ajaxModelUpdate').modal('show');
            $('.alert-danger').hide();
            $('#number2').val(data.data.number);
            $('#status').html(data.data.status);
        })
    });

    // Delete
    $('body').on('click', '.deleteWard', function() {
        let id = $(this).data('id');
        if (confirm("Are you sure?")) {
            $.post("wards/delete/" + id, function(res) {
                table.ajax.reload();
                toastr.success(res.message);
            }).fail(err => toastr.error('Delete failed'));
        }
    });
    
</script>
@endsection
