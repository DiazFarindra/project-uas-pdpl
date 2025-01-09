<?php

namespace App\Services;

use App\Contracts\TransactionInterface;

class TransactionCodeGenerator implements TransactionInterface
{
    public function generate(): string
    {
        return 'TRX' . mt_rand(10000, 99999);
    }
}
