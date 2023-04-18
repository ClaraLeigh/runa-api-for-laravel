<?php

namespace ClaraLeigh\RunaApi\Objects;

use ClaraLeigh\RunaApi\Enums\OrderStatus;

/**
 * The Order Object as defined by the Runa Connect API.
 */
class Order
{
    public string $orderId;
    public OrderStatus $status;
    public float $totalAmount;
    public array $items;
    public ?ECode $e_code = null;
    public ?array $e_codes = null;
    public ?string $error_code = null;
    public ?string $error_details = null;
    public ?string $error_string = null;

    /**
     * Create a new Order instance.
     *
     * @param  array{order_id: string, status: string, total_amount: float, items: array, e_code?: array, e_codes?: array, error_code?: string, error_details?: string, error_string?: string}  $data
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

        if (isset($data['e_code'])) {
            $this->e_code = new ECode($data['e_code']);
        }

        if (isset($data['e_codes'])) {
            $this->e_codes = array_map(
                static fn ($e_code_data) => new ECode($e_code_data),
                $data['e_codes']
            );
        }

        if (isset($data['error_code'])) {
            $this->error_code = $data['error_code'];
        }

        if (isset($data['error_details'])) {
            $this->error_details = $data['error_details'];
        }

        if (isset($data['error_string'])) {
            $this->error_string = $data['error_string'];
        }
    }
}
