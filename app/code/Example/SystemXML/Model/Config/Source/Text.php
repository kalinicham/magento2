<?php
declare(strict_types=1);

namespace Example\SystemXML\Model\Config\Source;


use Magento\Framework\Data\OptionSourceInterface;

/**
 * todo: Enter comment
 */
class Text implements OptionSourceInterface
{

    public function toOptionArray(): array
    {
        return [
            [
                'value' => 1,
                'label' => 'First'
            ],
            [
                'value' => 2,
                'label' => 'Second'
            ],
        ];
    }
}
