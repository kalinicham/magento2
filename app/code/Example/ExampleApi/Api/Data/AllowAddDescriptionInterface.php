<?php

namespace Example\ExampleApi\Api\Data;

/**
 *
 * @api
 */
interface AllowAddDescriptionInterface
{
    const ID = 'id';
    const CUSTOMER_EMAIL = 'customer_email';
    const ALLOW_ADD_DESCRIPTION = 'allow_add_description';

    /**
     * Set customer email to attribute
     * @param string $customerEmail
     * @return void ;
     */
    public function setCustomerEmail(string $customerEmail): void;

    /**
     * Set allow_add_description to attribute
     *
     * @param bool $addAllowDescription
     * @return void ;
     */
    public function setAllowAddDescription(bool $addAllowDescription): void;

    /**
     * Get allow_add_description
     *
     * @return string
     */
    public function getAllowDescription(): bool;

    /**
     * Get customer email
     *
     * @return string
     */
    public function getCustomerEmail(): string;
}
