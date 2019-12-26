<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Example\ExampleExtAttribute\Plugin;

use Magento\Customer\Api\Data\CustomerExtension;
use Magento\Customer\Api\Data\CustomerExtensionFactory;
use Magento\Customer\Api\Data\CustomerExtensionInterface;
use Magento\Customer\Api\Data\CustomerInterface;

/**
 * Load extension attribute
 */
class LoadExtensionAttributePlugin
{
    /**
     * @var CustomerExtensionFactory
     */
    private $extensionFactory;

    public function __construct(
        CustomerExtensionFactory $customerExtensionFactory
    ) {
        $this->extensionFactory = $customerExtensionFactory;
    }

    /**
     * Load all extension attribute
     *
     * @param CustomerInterface $customer
     * @param CustomerExtensionInterface|null $extension
     * @return CustomerExtension|CustomerExtensionInterface
     */
    public function afterGetExtensionAttributes(
        CustomerInterface $customer,
        CustomerExtensionInterface $extension = null
    ) {
        if ($extension === null) {
            $extension = $this->extensionFactory->create();
        }
        return $extension;
    }
}
