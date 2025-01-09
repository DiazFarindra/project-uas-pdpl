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
            <p class="card-text">payment code <i>(please copy this payment code for payment)</i>: <b><code>{{ $transaction->payment_code }}</code></b></p>

            <p class="mt-5">
                go to this payment page:
                <a
                    href="{{
                        route('items.payment', [
                            'item' => $item->id,
                            'transaction' => $transaction->id,
                        ])
                    }}"
                    target="_blank"
                >
                    payment
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
