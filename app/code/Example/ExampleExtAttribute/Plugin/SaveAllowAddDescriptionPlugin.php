<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Example\ExampleExtAttribute\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Example\ExampleExtAttribute\Api\AllowAddDescriptionRepositoryInterface as Resource;


/**
 * Save extension attribute
 */
class SaveAllowAddDescriptionPlugin
{
    /**
     * @var Resource
     */
    private $resource;

    public function __construct(
        Resource $resourceModel
    ) {
        $this->resource = $resourceModel;
    }

    /**
     * Save attribute "allow_add_description"
     *
     * @param CustomerRepositoryInterface $subject
     * @param CustomerInterface $resultCustomer
     * @return CustomerInterface
     */
    public function afterSave(CustomerRepositoryInterface $subject, CustomerInterface $resultCustomer)
    {
        $extensionAttributes = $resultCustomer->getExtensionAttributes();
        $allowAddDescription = $extensionAttributes->getAllowAddDescription();
        $this->resource->save($allowAddDescription);
        return $resultCustomer;
    }
}
