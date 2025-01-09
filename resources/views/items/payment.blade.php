@extends('main')

@section('main')
<div class="mx-auto mt-5">
    <div class="card mb-3">
        <div class="card-body">
            <form method="post" action="{{ route('items.payout') }}">
                @csrf
                <div class="mb-3">
                    <label for="payment" class="form-label">Payment Code</label>
                    <input type="text" class="form-control" id="payment" name="payment" value="{{ request('payment_code') }}" placeholder="insert or paste your payment code here">
                    @error('payment')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @if(session('error'))
                    <div class="text-danger">{{ session('error') }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">confirm</button>

                @if(session('confirm') || session('success') || request('payment_code'))
                    <div class="card mt-3" style="width: 18rem;">
                        @if($item->image)
                            <img src="{{ $item->image() }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">price: Rp. {{ number_format($item->price, 2) }}</p>
                            <p class="card-text">item available: {{ $item->quantity }}</p>
                            <form action="{{ route('items.payout') }}" method="post">
                                <input type="text" name="transaction" value="{{ $transaction->id }}" hidden>
                                <input type="text" name="confirm" value="1" hidden>
                                <button type="submit" class="btn btn-primary {{ (bool) $transaction->is_paid ? 'disabled' : '' }}" {{ (bool) $transaction->is_paid ? 'disabled' : '' }}>
                                    pay now
                                </button>
                            </form>
                        </div>
                    </div>

                    @if(session('success') || (bool) $transaction->is_paid)
                        <div class="alert alert-success mt-3">
                            Transaction has been paid
                        </div>
                    @endif
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
