<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Example\ExampleExtAttribute\Plugin;

use Example\ExampleExtAttribute\Api\Data\AllowAddDescriptionInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;

/**
 * Class add extension attribute to customer
 */
class GetAllowAddDescriptionPlugin
{
    /**
     * @var AllowAddDescriptionInterface
     */
    private $allowAddDescription;

    public function __construct(
        AllowAddDescriptionInterface $allowAddDescription
    ) {
        $this->allowAddDescription = $allowAddDescription;
    }

    /**
     * Add extension attribute "allow_add_description"
     *
     * @param CustomerRepositoryInterface $subject
     * @param CustomerInterface $resultCustomer
     * @return CustomerInterface
     * @SuppressWarnings("PMD.UnusedFormalParameter")
     */
    public function afterGet(CustomerRepositoryInterface $subject, CustomerInterface $resultCustomer)
    {
        $allowDescription = $this->allowAddDescription->getByEntityId($resultCustomer->getId());
        $extensionAttributes = $resultCustomer->getExtensionAttributes();
        $extensionAttributes->setAllowAddDescription($allowDescription);
        $resultCustomer->setExtensionAttributes($extensionAttributes);
        return $resultCustomer;
    }
}
