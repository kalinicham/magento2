<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Example\ExampleExtAttribute\Model;

use Example\ExampleExtAttribute\Api\Data\AllowAddDescriptionInterface;
use Example\ExampleExtAttribute\Model\ResourceModel\AddDescription as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class AddDescription extends AbstractModel implements AllowAddDescriptionInterface
{
    private $resourceModel;

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getAllowDescription()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * @inheritDoc
     */
    public function setAllowDescription($value)
    {
        return $this->setData(self::VALUE, $value);
    }

    public function getByEntityId($id)
    {
        return $this->load($id, 'entity_id');
    }
}
