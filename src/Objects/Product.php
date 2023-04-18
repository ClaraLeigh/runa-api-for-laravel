<?php

namespace ClaraLeigh\RunaApi\Objects;

/**
 * The Product Object as defined by the Runa Connect API.
 */
class Product
{
    /**
     * @var string|mixed $code
     */
    public string $code;

    /**
     * @var string|mixed $name
     */
    public string $name;

    /**
     * @var string|mixed $description
     */
    public string $description;

    /**
     * @var float|mixed $price
     */
    public float $price;

    /**
     * Create a new Product instance.
     *
     * @param  array{code: string, name: string, description: string, price: float}  $data
     */
    public function __construct(array $data)
    {
        $this->code = $data['code'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price = $data['price'];
    }
}

