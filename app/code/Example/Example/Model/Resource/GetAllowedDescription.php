<?php

namespace Example\Example\Model\Resource;

use Magento\Framework\App\ResourceConnection;
use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;

class GetAllowedDescription
{
    private const TABLE = 'extension_attribute_description';

    /**
     * @var ResourceConnection
     */
    private $connection;

    /**
     * @param ResourceConnection $connection
     */
    public function __construct(ResourceConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @todo; add description.
     *
     * @param string $customerEmail
     * @return array
     */
    public function execute(string $customerEmail)
    {
        $adapter = $this->connection->getConnection();
        $tableName = $adapter->getTableName(self::TABLE);
        $sql = $adapter->select()->from($tableName)->where(
            AllowAddDescriptionInterface::CUSTOMER_EMAIL . '=?',
            $customerEmail
        );

        return $adapter->fetchRow($sql);
    }
}
