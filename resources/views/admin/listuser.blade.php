@extends('admin.dashboard')
@section('title-content', 'Dashboard user')
@section('data')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable User
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($all_user as $user)
                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
