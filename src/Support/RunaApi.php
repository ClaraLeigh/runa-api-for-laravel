<?php

namespace ClaraLeigh\RunaApi\Support;

use GuzzleHttp\Client;
use ClaraLeigh\RunaApi\Objects\Product;
use ClaraLeigh\RunaApi\Objects\Order;
use ClaraLeigh\RunaApi\Enums\OrderStatus;

/**
 * API Wrapper for Runa Connect
 */
class RunaApi
{
    private Client $client;

    /**
     * Create a new RunaApi instance.
     *
     * @param  string  $apiKey
     */
    public function __construct(
        private readonly string $apiKey
    )
    {
        $this->client = new Client([
            'base_uri' => 'https://api.runaconnect.com/',
            'headers' => [
                'Authorization' => "Bearer $this->apiKey"
            ]
        ]);
    }

    /**
     * Get a product by its ID.
     *
     * @param string $productId
     * @return Product
     */
    public function getProduct(string $productId): Product
    {
        return new Product(
            $this->get("products/$productId")
        );
    }

    /**
     * Create an order.
     *
     * @param array $orderData
     * @return Order
     */
    public function createOrder(array $orderData): Order
    {
        return new Order(
            $this->post('orders', $orderData)
        );
    }

    /**
     * Get an order by its ID.
     *
     * @param string $orderId
     * @return Order
     */
    public function getOrder(string $orderId): Order
    {
        return new Order(
            $this->get("orders/{$orderId}")
        );
    }

    /**
     * Update an order's status.
     *
     * @param string $orderId
     * @param OrderStatus $status
     * @return Order
     */
    public function updateOrderStatus(string $orderId, OrderStatus $status): Order
    {
        return new Order(
            $this->patch("orders/$orderId", [
                'status' => $status->value
            ])
        );
    }

    private function post(string $endpoint, array $data): array
    {
        $response = $this->client->post($endpoint, [
            'json' => $data
        ]);
        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    private function patch(string $endpoint, array $data): array
    {
        $response = $this->client->patch($endpoint, [
            'json' => $data
        ]);
        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    private function get(string $endpoint): array
    {
        $response = $this->client->get($endpoint);
        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
