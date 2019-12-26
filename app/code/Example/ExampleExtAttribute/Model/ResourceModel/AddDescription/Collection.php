<?php

namespace Example\ExampleExtAttribute\Model\ResourceModel\AddDescription;

use Example\ExampleExtAttribute\Model\AddDescription as Model;
use Example\ExampleExtAttribute\Model\ResourceModel\AddDescription as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
