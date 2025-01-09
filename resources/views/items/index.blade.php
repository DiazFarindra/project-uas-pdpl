@extends('main')

@section('main')
<div class="row mt-5">
    @forelse ($items as $item)
        <div class="col-sm-3">
            <div class="card" style="width: 18rem;">
                @if($item->image)
                    <img src="{{ $item->image() }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">price: Rp. {{ number_format($item->price, 2) }}</p>
                    <p class="card-text">item available: {{ $item->quantity }}</p>
                    <a href="{{ route('items.checkout', $item->id) }}" class="btn btn-primary">buy now</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-sm-12 text-center">
            <p>No items found.</p>
        </div>
    @endforelse
</div>

@endsection
