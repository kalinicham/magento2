<?php

namespace Example\Example\Model\AllowAddDescription;

use Example\Example\Model\Resource\GetAllowedDescription;
use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;
use Example\ExampleApi\Api\GetAllowAddDescriptionInterface;
use Example\ExampleApi\Api\Data\AllowAddDescriptionInterfaceFactory;

/**
 * @inheritDoc
 */
class GetAllowAddDescription implements GetAllowAddDescriptionInterface
{
    /**
     * @var GetAllowedDescription
     */
    private $getAllowedDescription;

    /**
     * @var GetAllowedDescriptionBuilder
     */
    private $allowedDescriptionBuilder;

    /**
     * @var AllowAddDescriptionInterfaceFactory
     */
    private $allowAddDescriptionFactory;

    /**
     * @param GetAllowedDescription $getAllowedDescription
     * @param GetAllowedDescriptionBuilder $allowedDescriptionBuilder
     */
    public function __construct(
        GetAllowedDescription $getAllowedDescription,
        GetAllowedDescriptionBuilder $allowedDescriptionBuilder,
        AllowAddDescriptionInterfaceFactory $allowAddDescriptionFactory
    ) {
        $this->getAllowedDescription = $getAllowedDescription;
        $this->allowedDescriptionBuilder = $allowedDescriptionBuilder;
        $this->allowAddDescriptionFactory = $allowAddDescriptionFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(string $customerEmail): AllowAddDescriptionInterface
    {
        $data = $this->getAllowedDescription->execute($customerEmail);

        if (!$data) {
            return $this->allowAddDescriptionFactory->create();
        }

        return $this->allowedDescriptionBuilder->execute($data);

    }
}
