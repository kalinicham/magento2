<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Example\ExampleExtAttribute\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Example\ExampleExtAttribute\Api\AllowAddDescriptionRepositoryInterface;

/**
 * Class add extension attribute to customer
 */
class GetAllowAddDescriptionPlugin
{
    /**
     * @var AllowAddDescriptionRepositoryInterface
     */
    private $allowAddDescription;

    public function __construct(
        AllowAddDescriptionRepositoryInterface $allowAddDescription
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
        $allowDescription = $this->allowAddDescription->get($resultCustomer->getId());
        $extensionAttributes = $resultCustomer->getExtensionAttributes();
        $extensionAttributes->setAllowAddDescription($allowDescription);
        $resultCustomer->setExtensionAttributes($extensionAttributes);
        return $resultCustomer;
    }
}
