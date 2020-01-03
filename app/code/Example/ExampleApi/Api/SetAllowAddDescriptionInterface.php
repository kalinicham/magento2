<?php

namespace Example\ExampleApi\Api;

use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;

/**
 * Save value allow_add_description to customer
 */
interface SetAllowAddDescriptionInterface
{

    /**
     * @param string $customerEmail
     * @param bool $allowAddDescription
     * @return AllowAddDescriptionInterface;
     * @api
     */
    public function execute($customerEmail, $allowAddDescription);
}
