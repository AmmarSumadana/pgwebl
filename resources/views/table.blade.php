@extends('layout.template')

@section('content')
    <div class="container my-5">
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <button class="nav-link active" id="points-tab" data-bs-toggle="tab" data-bs-target="#points" type="button"
                    role="tab" aria-controls="points" aria-selected="true">
                    <i class="bi bi-geo-alt-fill me-2"></i> Points
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="polylines-tab" data-bs-toggle="tab" data-bs-target="#polylines" type="button"
                    role="tab" aria-controls="polylines" aria-selected="false">
                    <i class="bi bi-bezier2 me-2"></i> Polylines
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="polygons-tab" data-bs-toggle="tab" data-bs-target="#polygons" type="button"
                    role="tab" aria-controls="polygons" aria-selected="false">
                    <i class="bi bi-pentagon me-2"></i> Polygons
                </button>
            </li>
        </ul>

        <div class="tab-content" id="dataTabsContent">
            <!-- Points Table -->
            <div class="tab-pane fade show active" id="points" role="tabpanel" aria-labelledby="points-tab">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-secondary"><i class="bi bi-geo-alt-fill me-2"></i> Points Data</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="pointsTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($points as $point)
                                        <tr>
                                            <td>{{ $point->id }}</td>
                                            <td>{{ $point->name }}</td>
                                            <td>{{ $point->description }}</td>
                                            <td><img src="{{ asset('storage/images/' . $point->image) }}"
                                                    alt="{{ $point->name }}" width="100"></td>
                                            <td>{{ $point->created_at }}</td>
                                            <td>{{ $point->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Polylines Table -->
            <div class="tab-pane fade" id="polylines" role="tabpanel" aria-labelledby="polylines-tab">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-secondary"><i class="bi bi-bezier2 me-2"></i> Polylines Data</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="polylinesTable">
                                <thead class="table-success">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($polylines as $polyline)
                                        <tr>
                                            <td>{{ $polyline->id }}</td>
                                            <td>{{ $polyline->name }}</td>
                                            <td>{{ $polyline->description }}</td>
                                            <td><img src="{{ asset('storage/images/' . $polyline->image) }}"
                                                    alt="{{ $polyline->name }}" width="100"></td>
                                            <td>{{ $polyline->created_at }}</td>
                                            <td>{{ $polyline->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Polygons Table -->
            <div class="tab-pane fade" id="polygons" role="tabpanel" aria-labelledby="polygons-tab">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-secondary"><i class="bi bi-pentagon me-2"></i> Polygons Data</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="polygonsTable">
                                <thead class="table-warning">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($polygons as $polygon)
                                        <tr>
                                            <td>{{ $polygon->id }}</td>
                                            <td>{{ $polygon->name }}</td>
                                            <td>{{ $polygon->description }}</td>
                                            <td><img src="{{ asset('storage/images/' . $polygon->image) }}"
                                                    alt="{{ $polygon->name }}" width="100"></td>
                                            <td>{{ $polygon->created_at }}</td>
                                            <td>{{ $polygon->updated_at }}</td>
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
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#pointsTable').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    searchPlaceholder: "Search...",
                    lengthMenu: "_MENU_ entries per page",
                    zeroRecords: "No data available in table",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                }
            });

            $('#polylinesTable').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    searchPlaceholder: "Search...",
                    lengthMenu: "_MENU_ entries per page",
                    zeroRecords: "No data available in table",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                }
            });

            $('#polygonsTable').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                language: {
                    searchPlaceholder: "Search...",
                    lengthMenu: "_MENU_ entries per page",
                    zeroRecords: "No data available in table",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                }
            });
        });
    </script>
@endsection
