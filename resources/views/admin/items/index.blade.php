@extends('admin.main')

@section('main')
<div class="mt-5">
    <div class="my-3">
        <a href="{{ route('admin.items.create') }}" class="btn btn-outline-primary">create</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-sm btn-outline-primary">edit</a>
                    <form action="{{ route('admin.items.destroy', $item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
