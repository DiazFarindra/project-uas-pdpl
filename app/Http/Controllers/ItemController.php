<?php

namespace App\Http\Controllers;

use App\Contracts\TransactionInterface;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use App\Models\VA;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(
        private TransactionInterface $transactionInterface,
    ) {}

    public function index()
    {
        return view('items.index', [
            'items' => Item::all()
        ]);
    }

    public function checkout(Item $item)
    {
        $vas = VA::all();

        return view('items.checkout', compact('item', 'vas'));
    }

    public function buy(Item $item, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'va_id' => ['required', 'integer', 'exists:virtual_accounts,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random()),
        ]);

        $va = VA::find($request->va_id);

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'va_id' => $va->id,
            'code' => $this->transactionInterface->generate(),
            'payment_code' => $va->number.$this->transactionInterface->generate(),
            'is_paid' => false,
        ]);

        return redirect()->route('items.invoice', [
            'item' => $item->id,
            'transaction' => $transaction->id,
        ]);
    }

    public function invoice(Item $item, Transaction $transaction)
    {
        return view('items.invoice', compact('item', 'transaction'));
    }

    public function payment(Request $request)
    {
        $item = Item::findOr($request->item, fn () => null);
        $transaction = Transaction::findOr($request->transaction, fn () => null);

        return view('items.payment', compact('item', 'transaction'));
    }

    public function payout(Request $request)
    {
        $request->validate([
            'payment' => ['nullable', 'string'],
            'confirm' => ['nullable', 'boolean'],
        ]);

        if ($request->isNotFilled('payment')) {
            return redirect()->route('items.payment')->with('error', 'the payment code is required');
        }

        $transaction = Transaction::where('payment_code', $request->payment)->firstOr( fn () => null);

        if (is_null($transaction)) {
            return redirect()->route('items.payment')->with('error', 'there is no transaction');
        }

        $item = Item::findOrFail($transaction->item_id);

        // confirmation
        if ($request->isNotFilled('confirm')) {
            return redirect()
                ->route('items.payment', [
                    'item' => $item->id,
                    'transaction' => $transaction->id,
                    'payment_code' => $request->payment,
                ])
                ->with('confirm', true);
        }

        $transaction->update([
            'is_paid' => true,
        ]);

        return redirect()->route('items.payment', [
            'item' => $item->id,
            'transaction' => $transaction->id,
            'payment_code' => $request->payment,
        ])->with('success', true);
    }
}
