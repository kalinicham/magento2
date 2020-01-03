<?php


namespace Example\Example\Model\Resource;


use Example\ExampleApi\Api\Data\AllowAddDescriptionInterface;
use Magento\Framework\App\ResourceConnection;

class SetAllowedDescription
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
     * @param string $customerEmail
     * @param bool $allowAddDescription
     * @return bool
     */
    public function execute($customerEmail, $allowAddDescription)
    {
        $connection = $this->connection->getConnection();
        $connection->update(
             $connection->getTableName(self::TABLE),
            [
                AllowAddDescriptionInterface::ALLOW_ADD_DESCRIPTION => $allowAddDescription
            ],
            [
                AllowAddDescriptionInterface::CUSTOMER_EMAIL . ' =?' => $customerEmail
            ]
        );
    }
}
