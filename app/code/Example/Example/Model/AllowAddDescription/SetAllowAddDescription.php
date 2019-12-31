<?php


namespace Example\Example\Model\AllowAddDescription;


use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;
use Example\ExampleApi\Api\SetAllowAddDescriptionInterface;

class SetAllowAddDescription implements SetAllowAddDescriptionInterface
{

    /**
     * @inheritDoc
     */
    public function execute($customerEmail, $allowAddDescription)
    {
        $this->setAllowedDescription->execute($customerEmail, $allowAddDescription);
    }
}
