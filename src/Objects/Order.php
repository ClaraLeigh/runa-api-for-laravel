<?php

namespace ClaraLeigh\RunaApi\Objects;

use ClaraLeigh\RunaApi\Enums\OrderStatus;
use JetBrains\PhpStorm\ArrayShape;

/**
 * The Order Object as defined by the Runa Connect API.
 */
class Order
{
    /**
     * @var string|mixed $orderId
     */
    public string $orderId;

    /**
     * @var OrderStatus $status
     */
    public OrderStatus $status;

    /**
     * @var float|mixed $totalAmount
     */
    public float $totalAmount;

    /**
     * @var array|Product[]
     */
    public array $items;

    /**
     * Create a new Order instance.
     *
     * @param  array{order_id: string, status: string, total_amount: float, items: array}  $data
     */
    public function __construct(array $data)
    {
        $this->orderId = $data['order_id'];
        $this->status = OrderStatus::from($data['status']);
        $this->totalAmount = $data['total_amount'];
        $this->items = array_map(
            static fn ($product) => new Product($product),
            $data['items']
        );
    }
}

