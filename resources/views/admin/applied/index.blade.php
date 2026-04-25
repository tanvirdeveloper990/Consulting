@extends('admin.layouts.app')
@section('title','Applied List')

@push('styles')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        margin: 0;
    }
    
    .pagination .page-item {
        margin: 0;
    }
    
    .pagination .page-link {
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 8px 12px;
        color: #495057;
        background-color: #fff;
        transition: all 0.3s;
        min-width: 40px;
        text-align: center;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        font-weight: 600;
    }
    
    .pagination .page-item.disabled .page-link {
        background-color: #e9ecef;
        border-color: #dee2e6;
        color: #6c757d;
        cursor: not-allowed;
    }
    
    .pagination .page-link:hover:not(.disabled) {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }
    
    .pagination .page-link svg {
        width: 16px;
        height: 16px;
    }
</style>
@endpush

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Applied List</h5>
                        <a href="{{ route('admin.applied.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus me-1"></i> Apply Now
                        </a>
                    </div>
                    
                    <!-- Filter Section -->
                    <div class="card-body border-bottom">
                        <form method="GET" action="{{ route('admin.applied.index') }}" id="filterForm">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label class="form-label">Search</label>
                                    <input type="text" name="search" class="form-control" placeholder="Search by name, email or phone" value="{{ request('search') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">End Date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <a href="{{ route('admin.applied.index') }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-refresh me-1"></i> Reset All Filters
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <!-- Results Count -->
                        <div class="mb-3">
                            <p class="text-muted mb-0">
                                Showing {{ $data->firstItem() ?? 0 }} to {{ $data->lastItem() ?? 0 }} of {{ $data->total() }} results
                            </p>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Applied Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                    <tr>
                                        <td>{{ $data->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge bg-success">Active</span>
                                            @else
                                            <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.applied.edit',$item->id) }}" class="btn btn-sm btn-info" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.applied.edit',$item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <form id="delete-form-{{$item->id }}" action="{{ route('admin.applied.destroy',$item->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{$item->id }}" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No data found</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($data->hasPages())
                        <div class="d-flex justify-content-end mt-4">
                            <nav aria-label="Page navigation">
                                {{ $data->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection