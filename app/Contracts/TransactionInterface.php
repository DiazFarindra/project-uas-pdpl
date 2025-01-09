<?php

namespace App\Contracts;

interface TransactionInterface
{
    public function generate(): string;
}
