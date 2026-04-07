<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return response()->json(
            Transaction::query()->latest('transaction_date')->latest('id')->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:income,expense'],
            'category' => ['nullable', 'string', 'max:255'],
            'transaction_date' => ['required', 'date'],
            'note' => ['nullable', 'string'],
        ]);

        return response()->json(Transaction::create($validated), 201);
    }

    public function show(Transaction $transaction)
    {
        return response()->json($transaction);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'amount' => ['sometimes', 'required', 'numeric'],
            'type' => ['sometimes', 'required', 'in:income,expense'],
            'category' => ['nullable', 'string', 'max:255'],
            'transaction_date' => ['sometimes', 'required', 'date'],
            'note' => ['nullable', 'string'],
        ]);

        $transaction->update($validated);

        return response()->json($transaction->fresh());
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->noContent();
    }
}