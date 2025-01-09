@extends('main')

@section('main')
<div class="mx-auto mt-5">
    <div class="card mb-3">
        @if($item->image)
        <img src="{{ $item->image() }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">price: Rp. {{ number_format($item->price, 2) }}</p>

            <form method="post" action="{{ route('items.buy', $item->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select class="form-select" id="va_id" name="va_id" aria-label="Default select example">
                        <option selected disabled>select virtual number</option>
                        @forelse ($vas as $va)
                            <option value="{{ $va->id }}">{{ $va->bank_name }} - {{ $va->number }}</option>
                        @empty
                            <option disabled>no data!</option>
                        @endforelse
                    </select>
                    @error('va_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">checkout</button>
            </form>
        </div>
    </div>
</div>
@endsection
