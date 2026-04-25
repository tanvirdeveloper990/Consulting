@extends('admin.layouts.app')

@section('title','Customers List')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div
                        class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Customers List</h5>
                        @can('create customer')
                        <a href="{{ route('admin.customers.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus me-1"></i> Add Customers
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Sex</th>
                                    <th>ID Number</th>
                                    <th>Image</th>
                                    {{-- <th>Health Certificate Number</th> --}}
                                    <th>Profession</th>
                                    <th>License Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $item)
                                @can('view customer')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nationality }}</td>
                                    <td>{{ $item->sex }}</td>
                                    <td>{{ $item->id_number }}</td>
                                    <td>
                                        <img src="{{ Storage::url($item->image) }}" alt="" width="70">
                                    </td>
                                    {{-- <td>{{ $item->health_certificate_number }}</td> --}}
                                    <td>{{ $item->profession }}</td>
                                    <td>{{ $item->license_number }}</td>

                                    <td>
                                        <div class="d-flex gap-1">
                                            @can('view customer')

                                           <a href="{{ route('admin.customers.print', $item->id) }}" class="btn btn-sm btn-success print-btn">
                                                <i class="fa-solid fa-print"></i>
                                            </a>


                                            <a href="javascript::void(0)" class="btn btn-sm btn-info view-btn"
                                                data-id="{{ $item->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            @endcan
                                            @can('edit customer')
                                            <a href="{{ route('admin.customers.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            @endcan
                                            @can('delete customer')


                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('admin.customers.destroy', $item->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endcan
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Customer Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="modalContent">
                    <!-- Ajax loaded content will appear here -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
    $('.view-btn').click(function(){
        var id = $(this).data('id');

        $.ajax({
            url: '/admin/customers/' + id, // route
            type: 'GET',
            success: function(data){
                $('#modalContent').html(data);
                $('#viewModal').modal('show');
            }
        });
    });
});
</script>

@endsection