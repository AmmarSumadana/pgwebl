@extends('layout.template')

@section('content')

<div class="container py-4">
    <h2 class="mb-4">Data Geometri</h2>

    <!-- Tombol Navigasi -->
    <div class="btn-group mb-4" role="group" aria-label="Tabel Navigation">
        <button type="button" class="btn btn-primary" onclick="showTable('points')"><i class="fa-solid fa-circle-dot"></i> Points</button>
        <button type="button" class="btn btn-success" onclick="showTable('polylines')"><i class="fa-solid fa-route"></i> Polylines</button>
        <button type="button" class="btn btn-warning" onclick="showTable('polygons')"><i class="fa-solid fa-draw-polygon"></i> Polygons</button>
    </div>

    <!-- Tabel Points -->
    <div id="table-points" class="table-section">
        <h4>Tabel Points</h4>
        <table class="table table-striped table-bordered">
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
                        <td><img src="{{ asset('storage/images/' . $point->image) }}" alt="{{ $point->name }}" width="100"></td>
                        <td>{{ $point->created_at }}</td>
                        <td>{{ $point->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Polylines -->
    <div id="table-polylines" class="table-section d-none">
        <h4>Tabel Polylines</h4>
        <table class="table table-striped table-bordered">
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
                        <td><img src="{{ asset('storage/images/' . $polyline->image) }}" alt="{{ $polyline->name }}" width="100"></td>
                        <td>{{ $polyline->created_at }}</td>
                        <td>{{ $polyline->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Polygons -->
    <div id="table-polygons" class="table-section d-none">
        <h4>Tabel Polygons</h4>
        <table class="table table-striped table-bordered">
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
                        <td><img src="{{ asset('storage/images/' . $polygon->image) }}" alt="{{ $polygon->name }}" width="100"></td>
                        <td>{{ $polygon->created_at }}</td>
                        <td>{{ $polygon->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function showTable(type) {
        document.querySelectorAll('.table-section').forEach(el => el.classList.add('d-none'));
        document.getElementById('table-' + type).classList.remove('d-none');
    }

    // Opsional: tampilkan tabel points saat pertama kali
    document.addEventListener("DOMContentLoaded", function() {
        showTable('points');
    });
</script>
@endsection
