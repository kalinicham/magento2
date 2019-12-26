<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Example\ExampleExtAttribute\Plugin;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Example\ExampleExtAttribute\Model\ResourceModel\AddDescription as ResourceModel;

/**
 * Save extension attribute
 */
class SaveAllowAddDescriptionPlugin
{
    /**
     * @var ResourceModel
     */
    private $resourceModel;

    public function __construct(
        ResourceModel $resourceModel
    ) {
        $this->resourceModel = $resourceModel;
    }

    /**
     * Save attribute "allow_add_description"
     *
     * @param CustomerRepositoryInterface $subject
     * @param CustomerInterface $resultCustomer
     * @return CustomerInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function afterSave(CustomerRepositoryInterface $subject, CustomerInterface $resultCustomer)
    {
        $extensionAttributes = $resultCustomer->getExtensionAttributes();
        $allowAddDescription = $extensionAttributes->getAllowAddDescription();
        $this->resourceModel->save($allowAddDescription);
        return $resultCustomer;
    }
}
