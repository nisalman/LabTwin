<head>
    <!-- Include DataTable CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet"/>
</head>

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="row">
            <div class="card-body my-4 mx-4">

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Left-aligned heading -->
                    <h4 class="font-20 ml-3">Backup List</h4>

                    <!-- Right-aligned manual backup button -->
                    <form action="{{ route('backup.manual') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success mb-3">Manual Backup</button>
                    </form>
                </div>
                <table id="backupTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Filename</th>
                        <th>Taken Time</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($backupFiles as $backup)
                        <tr>
                            <td>{{ $backup['filename'] }}</td>
                            <td>{{ $backup['backup_time'] }}</td>
                            <td>{{ number_format(filesize(storage_path('app/backups/' . $backup['filename'])) / 1024, 2) }} KB</td>
                            <td>
                                <!-- Download link -->
                                <a href="{{ route('backups.show', ['filename' => $backup['filename']]) }}">
                                    <button type="button" style="background-color: #5cc55d" class="btn btn-info">
                                        <i class="icofont-download"></i>
                                    </button>
                                </a>

                                <!-- Delete form -->
                                <form action="{{ route('backups.destroy', $backup['filename']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #ee3131" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this backup?')">
                                        <i class="icofont-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('body-scripts')
        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include DataTable JS -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                // Initialize the DataTable
                $('#backupTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true
                });
            });
        </script>
    @endpush
@endsection
