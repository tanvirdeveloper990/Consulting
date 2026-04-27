@extends('admin.layouts.app')
@section('title','Applied List')

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4">

                    <!-- Header -->
                    <div class="card-header rounded-top-4 d-flex justify-content-between align-items-center py-3 px-4"
                         style="background: linear-gradient(135deg, #0A474C, #00B8D4);">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fa fa-file-alt text-white opacity-75"></i>
                            <h5 class="mb-0 text-white fw-semibold">Applied List</h5>
                        </div>
                        <a href="{{ route('admin.applied.create') }}" class="btn btn-sm btn-light fw-semibold" style="color:#0A474C;">
                            <i class="fa fa-plus me-1"></i> Apply Now
                        </a>
                    </div>

                    <!-- Filter -->
                    <div class="card-body border-bottom bg-light rounded-0 px-4 py-3">
                        <form method="GET" action="{{ route('admin.applied.index') }}">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-5">
                                    <label class="form-label small fw-semibold text-muted mb-1">Search</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="fa fa-search text-muted" style="font-size:.8rem;"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control border-start-0 ps-0"
                                            placeholder="Name, email or phone..." value="{{ request('search') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-muted mb-1">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-muted mb-1">End Date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                </div>
                                <div class="col-md-1 d-flex gap-2">
                                    <button type="submit" class="btn w-100 text-white" style="background:#0A474C;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('admin.applied.index') }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-refresh me-1"></i> Reset
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Table -->
                    <div class="card-body px-4">

                        <!-- Count -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="text-muted mb-0 small">
                                Showing <strong>{{ $data->firstItem() ?? 0 }}</strong> –
                                <strong>{{ $data->lastItem() ?? 0 }}</strong> of
                                <strong>{{ $data->total() }}</strong> results
                            </p>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0" style="border-collapse:separate;border-spacing:0 6px;">
                                <thead>
                                    <tr style="background:#f1f5f9;">
                                        <th class="px-3 py-2 rounded-start small text-uppercase text-muted fw-semibold" style="font-size:.75rem;">#</th>
                                        <th class="py-2 small text-uppercase text-muted fw-semibold" style="font-size:.75rem;">Name</th>
                                        <th class="py-2 small text-uppercase text-muted fw-semibold" style="font-size:.75rem;">Phone</th>
                                        <th class="py-2 small text-uppercase text-muted fw-semibold" style="font-size:.75rem;">Date</th>
                                        <th class="py-2 small text-uppercase text-muted fw-semibold" style="font-size:.75rem;">Status</th>
                                        <th class="py-2 rounded-end small text-uppercase text-muted fw-semibold" style="font-size:.75rem;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $item)
                                    <tr style="background:#fff;box-shadow:0 1px 4px rgba(0,0,0,.06);border-radius:10px;">
                                        <td class="px-3 py-3" style="border-radius:10px 0 0 10px;">
                                            <span class="text-muted small">{{ $data->firstItem() + $loop->index }}</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                                     style="width:34px;height:34px;background:linear-gradient(135deg,#0A474C,#00B8D4);font-size:.8rem;flex-shrink:0;">
                                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                                </div>
                                                <span class="fw-semibold text-dark">{{ $item->name }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <span class="text-muted">{{ $item->phone }}</span>
                                        </td>
                                       
                                        <td class="py-3">
                                            <span class="badge bg-light text-secondary border" style="font-weight:500;">
                                                <i class="fa fa-calendar me-1" style="font-size:.7rem;"></i>
                                                {{ $item->created_at->format('d M Y') }}
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            @if($item->status == 1)
                                            <span class="badge rounded-pill px-3 py-2" style="background:rgba(16,185,129,.12);color:#059669;font-size:.8rem;">
                                                <i class="fa fa-circle me-1" style="font-size:.5rem;vertical-align:middle;"></i> Active
                                            </span>
                                            @else
                                            <span class="badge rounded-pill px-3 py-2" style="background:rgba(107,114,128,.1);color:#6b7280;font-size:.8rem;">
                                                <i class="fa fa-circle me-1" style="font-size:.5rem;vertical-align:middle;"></i> Inactive
                                            </span>
                                            @endif
                                        </td>
                                        <td class="py-3" style="border-radius:0 10px 10px 0;">
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.applied.edit', $item->id) }}"
                                                   class="btn btn-sm" title="View"
                                                   style="background:rgba(0,184,212,.1);color:#00B8D4;border:1px solid rgba(0,184,212,.3);">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.applied.edit', $item->id) }}"
                                                   class="btn btn-sm" title="Edit"
                                                   style="background:rgba(245,158,11,.1);color:#d97706;border:1px solid rgba(245,158,11,.3);">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.applied.destroy', $item->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-sm delete-btn" data-id="{{ $item->id }}" title="Delete"
                                                        style="background:rgba(239,68,68,.1);color:#dc2626;border:1px solid rgba(239,68,68,.3);">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <i class="fa fa-inbox fa-3x mb-3" style="color:#d1d5db;"></i>
                                            <p class="text-muted mb-0">No data found</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($data->hasPages())
                        <div class="d-flex justify-content-end mt-4">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection