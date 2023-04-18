<?php

namespace ClaraLeigh\RunaApi\Objects;

/**
 * The Product Object as defined by the Runa Connect API.
 */
class Balance
{
    /**
     * @var string|mixed $currency ISO 4217 currency code
     */
    public string $currency;

    /**
     * @var float|mixed $amount
     */
    public float $amount;

    /**
     * Create a new Balance instance.
     *
     * @param  array{currency: string, amount: float}  $data
     */
    public function __construct(array $data)
    {
        $this->currency = $data['currency'];
        $this->amount = $data['amount'];
    }
}

