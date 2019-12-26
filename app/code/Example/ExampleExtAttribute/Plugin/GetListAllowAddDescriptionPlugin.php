<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Example\ExampleExtAttribute\Plugin;

use Example\ExampleExtAttribute\Api\Data\AllowAddDescriptionInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerSearchResultsInterface;

/**
 * Class add extension attribute to customer list
 */
class GetListAllowAddDescriptionPlugin
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
     * Add extension attribute "allow_add_description" to list
     *
     * @param CustomerRepositoryInterface $subject
     * @param CustomerSearchResultsInterface $searchCriteria
     * @return CustomerSearchResultsInterface
     * @SuppressWarnings("PMD.UnusedFormalParameter")
     */
    public function afterGetList(CustomerRepositoryInterface $subject, CustomerSearchResultsInterface $searchCriteria)
    {
        $customers = [];
        foreach ($searchCriteria->getItems() as $entity) {
            $allowDescription = $this->allowAddDescription->getByEntityId($entity->getId());

            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setAllowAddDescription($allowDescription);
            $entity->setExtensionAttributes($extensionAttributes);

            $customers[] = $entity;
        }
        $searchCriteria->setItems($customers);

        return $searchCriteria;
    }
}
