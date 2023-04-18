<?php

namespace ClaraLeigh\RunaApi\Objects;

/**
 * The Product Object as defined by the Runa Connect API.
 */
class StockLock
{
    /**
     * @var string|mixed $productCode
     */
    public string $productCode;

    /**
     * @var string|mixed $denomination
     */
    public string $denomination;

    /**
     * @var int|mixed $quantity
     */
    public int $quantity;

    /**
     * Create a new Product instance.
     *
     * @param  array{product_code: string, denomination: string, quantity: int}  $data
     */
    public function __construct(array $data)
    {
        $this->productCode = $data['product_code'];
        $this->denomination = $data['denomination'];
        $this->quantity = $data['quantity'];
    }
}

