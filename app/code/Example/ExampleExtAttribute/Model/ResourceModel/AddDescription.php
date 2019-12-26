<?php

namespace Example\ExampleExtAttribute\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class AddDescription extends AbstractDb
{
    const ID = 'id';
    const TABLE = 'extension_attribute_description';

    public function __construct(Context $context, $connectionName = null)
    {
        parent::__construct($context, $connectionName);
    }

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE, self::ID);
    }
}
