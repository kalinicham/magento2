<?php


namespace Example\ExampleExtAttribute\Api;


use Example\ExampleExtAttribute\Api\Data\AllowAddDescriptionInterface;

interface AllowAddDescriptionRepositoryInterface
{

    /**
     * @param int $id
     * @return AllowAddDescriptionInterface
     */
    public function get($id);

    /**
     * @param AllowAddDescriptionInterface
     * @return AllowAddDescriptionRepositoryInterface
     */
    public function save($addDescription);

}
