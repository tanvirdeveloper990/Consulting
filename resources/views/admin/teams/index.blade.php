@extends('admin.layouts.app')

@section('title',' Join Our Team List')

@section('content')

<section class="content pt-4">
    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"> Join Our Team List</h5>
                        <a href="{{ route('admin.teams.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus me-1"></i> Add
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->fname }} {{ $item->lname }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                    
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.teams.edit',$item->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <a href="{{ route('admin.teams.edit',$item->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>

                                                <form id="delete-form-{{$item->id }}" action="{{ route('admin.teams.destroy',$item->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{$item->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection