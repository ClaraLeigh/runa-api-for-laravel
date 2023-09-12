<?php

namespace ClaraLeigh\RunaApi\Objects;

use ClaraLeigh\RunaApi\Exceptions\ProductNotFoundException;

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
    public string $availability;
    public ?int $available_in_days;
    public ?array $available_denominations;
    public ?string $barcode_format;
    public ?string $card_image_url;
    public ?string $logo_image_url;
    public array $categories;
    public array $countries;
    public string $currency_code;
    public string $denomination_type;
    public ?string $e_code_usage_type;
    public ?string $expiry_date_policy;
    public ?int $expiry_in_months;
    public string $maximum_value;
    public string $minimum_value;
    public ?string $percent_discount;
    public ?string $redeemable_at;
    public ?string $state;
    public ?string $redeem_instructions_html;
    public ?string $terms_and_conditions_html;
    public ?string $terms_and_conditions_pdf_url;
    public ?string $terms_and_conditions_url;
    public bool $wrap_supported;

    /**
     * @throws ProductNotFoundException
     */
    public function __construct(array $data)
    {
        if (!empty($data['status']) && $data['status'] === 'ERROR') {
            throw new ProductNotFoundException($data['error_details']);
        }
        $this->availability = $data['availability'];
        $this->available_in_days = $data['available_in_days'];
        $this->available_denominations = $data['available_denominations'];
        $this->barcode_format = $data['barcode_format'];
        $this->card_image_url = $data['card_image_url'];
        $this->logo_image_url = $data['logo_image_url'];
        $this->categories = $data['categories'];
        $this->code = $data['code'];
        $this->countries = $data['countries'];
        $this->currency_code = $data['currency_code'];
        $this->denomination_type = $data['denomination_type'];
        $this->description = $data['description'];
        $this->e_code_usage_type = $data['e_code_usage_type'];
        $this->expiry_date_policy = $data['expiry_date_policy'];
        $this->expiry_in_months = $data['expiry_in_months'];
        $this->maximum_value = $data['maximum_value'];
        $this->minimum_value = $data['minimum_value'];
        $this->name = $data['name'];
        $this->percent_discount = $data['percent_discount'];
        $this->redeemable_at = $data['redeemable_at'];
        $this->state = $data['state'];
        $this->redeem_instructions_html = $data['redeem_instructions_html'];
        $this->terms_and_conditions_html = $data['terms_and_conditions_html'];
        $this->terms_and_conditions_pdf_url = $data['terms_and_conditions_pdf_url'];
        $this->terms_and_conditions_url = $data['terms_and_conditions_url'];
        $this->wrap_supported = $data['wrap_supported'];
    }
}
