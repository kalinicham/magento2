<?php


namespace Example\Example\Model;

use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;

class AllowAddDescription implements AllowAddDescriptionInterface
{
    /**
     * @var string
     */
    private $customerEmail = '';

    /**
     * @var bool
     */
    private $allowAddDescription = false;

    public function setCustomerEmail(string $customerEmail): void
    {
        $this->customerEmail = $customerEmail;
    }

    public function setAllowAddDescription(bool $allowAddDescription): void
    {
        $this->allowAddDescription = $allowAddDescription;
    }
    /**
     * @inheritDoc
     */
    public function getAllowDescription(): bool
    {
        return $this->allowAddDescription;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }
}
