<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-0 rounded-4 p-4">
            
            <!-- Header -->
            <div class="text-center mb-4">
                <img src="{{ $user->image ? Storage::url($user->image) : 'https://via.placeholder.com/150' }}"
                     class="rounded-circle mb-3"
                     style="width:150px; height:150px; object-fit:cover; border:2px solid #007bff;">
                <h4 class="fw-bold">{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->profession ?? 'No Profession' }}</p>
            </div>

            <!-- Body -->
            <div class="row g-3">
                <div class="col-md-6">
                    <p><strong>Honesty:</strong> {{ $user->honesty ?? '-' }}</p>
                    <p><strong>Municipality:</strong> {{ $user->municipality ?? '-' }}</p>
                    <p><strong>ID Number:</strong> {{ $user->id_number ?? '-' }}</p>
                    <p><strong>Sex:</strong> {{ $user->sex ?? '-' }}</p>
                    <p><strong>Nationality:</strong> {{ $user->nationality ?? '-' }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Health Certificate #:</strong> {{ $user->health_certificate_number ?? '-' }}</p>
                    <p><strong>Issuance Date (Hijri):</strong> {{ $user->date_of_issuance_of_the_health_certificate_hijri_calendar ?? '-' }}</p>
                    <p><strong>Issuance Date (Gregorian):</strong> {{ $user->date_of_issuance_of_the_health_certificate_gregorian_calendar ?? '-' }}</p>
                    <p><strong>Expiry Date (Hijri):</strong> {{ $user->health_certificate_expiry_date_hijri_calendar ?? '-' }}</p>
                    <p><strong>Expiry Date (Gregorian):</strong> {{ $user->health_certificate_expiry_date_gregorian_calendar ?? '-' }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Educational Program Type:</strong> {{ $user->type_of_educational_program ?? '-' }}</p>
                    <p><strong>Educational Program End Date:</strong> {{ $user->educational_program_end_date ?? '-' }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>License Number:</strong> {{ $user->license_number ?? '-' }}</p>
                    <p><strong>Establishment Name:</strong> {{ $user->name_of_establishment ?? '-' }}</p>
                    <p><strong>Establishment Number:</strong> {{ $user->establishment_number ?? '-' }}</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
