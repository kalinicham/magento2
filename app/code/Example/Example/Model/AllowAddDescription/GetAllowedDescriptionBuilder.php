<?php

namespace Example\Example\Model\AllowAddDescription;

use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;
use Example\ExampleApi\Api\Data\AllowAddDescriptionInterfaceFactory;
use Magento\Framework\Exception\LocalizedException;

class GetAllowedDescriptionBuilder
{
    /**
     * @var AllowAddDescriptionInterfaceFactory
     */
    private $allowAddDescriptionFactory;

    /**
     * @param AllowAddDescriptionInterfaceFactory $allowAddDescriptionFactory
     */
    public function __construct(AllowAddDescriptionInterfaceFactory $allowAddDescription)
    {
        $this->allowAddDescriptionFactory = $allowAddDescription;
    }

    /**
     * @param array $data
     * @return AllowAddDescriptionInterface
     * @throws LocalizedException
     */
    public function execute(array $data): AllowAddDescriptionInterface
    {
        return $this->process($data);
    }

    /**
     * @param array $data
     * @return AllowAddDescriptionInterface
     * @throws LocalizedException
     */
    private function process(array $data): AllowAddDescriptionInterface
    {
        $customerEmail = $data['customer_email'] ?? '';
        $allowAddDescription = $data['allow_add_description'] ?? false;
        if (!$customerEmail) {
            return $this->allowAddDescriptionFactory->create();
        }
        $allowAddDescriptionModel = $this->allowAddDescriptionFactory->create();
        $allowAddDescriptionModel->setCustomerEmail($customerEmail);
        $allowAddDescriptionModel->setAllowAddDescription($allowAddDescription);

        return $allowAddDescriptionModel;
    }
}
