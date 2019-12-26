<?php


namespace Example\ExampleExtAttribute\Api\Data;


interface AllowAddDescriptionInterface
{
    const VALUE = 'allow_add_description';
    /**
     * @return string
     */
    public function getAllowDescription();

    /**
     * @return $this
     */
    public function setAllowDescription($value);

}
