<?php


namespace Example\ExampleApi\Api;

use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;

/**
 * Interface GetAllowAddDescriptionInterface
 */
interface GetAllowAddDescriptionInterface
{
    /**
     * Get customer allowed add description
     *
     * @param string $customerEmail
     * @return AllowAddDescriptionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     * @api
     */
    public function execute(string $customerEmail);
}
