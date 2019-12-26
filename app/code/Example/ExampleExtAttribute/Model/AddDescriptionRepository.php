<?php

namespace Example\ExampleExtAttribute\Model;

use Example\ExampleExtAttribute\Api\AllowAddDescriptionRepositoryInterface;
use Example\ExampleExtAttribute\Api\Data\AllowAddDescriptionInterface;
use Example\ExampleExtAttribute\Model\ResourceModel\AddDescription as Resource;

class AddDescriptionRepository implements AllowAddDescriptionRepositoryInterface
{

    /**
     * @var Resource
     */
    private $addDescriptionResource;

    /**
     * @var AddDescriptionFactory
     */
    private $addDescriptionFactory;

    public function __construct(
        Resource $addDescriptionResource,
        AddDescriptionFactory $addDescriptionFactory
    ) {
        $this->addDescriptionResource = $addDescriptionResource;
        $this->addDescriptionFactory = $addDescriptionFactory;
    }

    /**
     * @param int $id
     * @return AllowAddDescriptionInterface
     */
    public function get($id)
    {
        $addDescription = $this->addDescriptionFactory->create();
        $this->addDescriptionResource->load($addDescription, $id, 'entity_id');
        return $addDescription;
    }

    /**
     * @param AllowAddDescriptionInterface $addDescription
     * @return $this|AllowAddDescriptionRepositoryInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save($addDescription)
    {
        $this->addDescriptionResource->save($addDescription);
        return $this;
    }
}
