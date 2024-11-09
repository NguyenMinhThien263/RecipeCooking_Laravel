@extends('admin.dashboard')
@section('title-content', 'Dashboard recipe')
@section('data')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($all_recipe as $item)
                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{ $item->title }}</td>
                            <td><img src="{{ asset($item->image) }}" class="img-fluid w-24 h-24" alt=""> </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{ route('recipe.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('recipe.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Bạn chắc chắn xoá bài viết này')"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
