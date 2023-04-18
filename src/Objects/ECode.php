<?php

namespace ClaraLeigh\RunaApi\Objects;

class ECode
{
    private string $delivery_url;
    private ?string $error_code;
    private ?string $error_string;
    private string $expiry_date;
    private string $status;

    public function __construct(array $data)
    {
        $this->delivery_url = $data['delivery_url'];
        $this->error_code = $data['error_code'] ?? null;
        $this->error_string = $data['error_string'] ?? null;
        $this->expiry_date = $data['expiry_date'];
        $this->status = $data['status'];
    }

    public function getDeliveryUrl(): string
    {
        return $this->delivery_url;
    }

    public function getErrorCode(): ?string
    {
        return $this->error_code;
    }

    public function getErrorString(): ?string
    {
        return $this->error_string;
    }

    public function getExpiryDate(): string
    {
        return $this->expiry_date;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
