<?php
declare(strict_types=1);

namespace Example\ModifierCategory\Ui\DataProvider\Category;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Container;
use Magento\Ui\Component\DynamicRows;
use Magento\Ui\Component\Form\Element\Checkbox;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Element\Wysiwyg;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\DataProvider\Modifier\ModifierInterface;

/**
 * Custom tab modifier
 */
class CustomTab extends AbstractModifier implements ModifierInterface
{
    protected const BUTTON_ADD = 'button_add';
    protected const GROUP_CUSTOM_TAB_NAME = 'custom_tab';
    protected const GRID_TAB_NAME = 'options';
    protected const CONTAINER_HEADER_NAME = 'container_header';
    protected const CONTAINER_OPTION = 'container_option';
    protected const FIELD_IS_DELETE = 'is_delete';
    protected const CUSTOM_OPTIONS_LISTING = 'custom_tab_options_listing';
    protected const FIELD_SORT_ORDER_NAME = 'sort_order';
    protected const CONTAINER_COMMON_NAME = 'container_common';
    protected const FIELD_TITLE_NAME = 'title';
    protected const FIELD_IS_HIDE = 'is_hide';
    protected const FIELD_TEXT_TAB = 'text';
    protected const GROUP_CUSTOM_OPTIONS_SCOPE = 'custom_tab';

    protected array $meta = [];

    public function modifyData(array $data): array
    {
        return $data;
    }

    public function modifyMeta(array $meta): array
    {
        $this->meta = $meta;

        $this->createCustomTabPanel();

        return $this->meta;
    }

    protected function createCustomTabPanel(): void
    {
        $customTabPanel[self::GROUP_CUSTOM_TAB_NAME] = [
            'arguments' => [
                'data' => [
                    'config' => [
                        'componentType' => Fieldset::NAME,
                        'label' => __('Label For Fieldset'),
                        'dataScope' => static::GROUP_CUSTOM_OPTIONS_SCOPE,
                        'sortOrder' => 10,
                        'collapsible' => true
                    ]
                ]
            ],
            'children' => [
                self::CONTAINER_HEADER_NAME => $this->getHeaderContainerConfig(10),
                self::GRID_TAB_NAME => $this->getOptionsGridConfig(20),
            ],
        ];

        $this->meta = array_replace_recursive(
            $this->meta,
            $customTabPanel
        );
    }

    protected function getHeaderContainerConfig(int $sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => null,
                        'formElement' => Container::NAME,
                        'componentType' => Container::NAME,
                        'template' => 'ui/form/components/complex',
                        'sortOrder' => $sortOrder,
                        'content' => __('Custom tabs.'),
                    ],
                ],
            ],
            'children' => [
                self::BUTTON_ADD => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'title' => __('Add Tab'),
                                'formElement' => Container::NAME,
                                'componentType' => Container::NAME,
                                'component' => 'Magento_Ui/js/form/components/button',
                                'sortOrder' => 20,
                                'actions' => [
                                    [
                                        'targetName' => '${ $.ns }.${ $.ns }.' . self::GROUP_CUSTOM_TAB_NAME
                                            . '.' . self::GRID_TAB_NAME,
                                        '__disableTmpl' => ['targetName' => false],
                                        'actionName' => 'processingAddChild',
                                    ]
                                ]
                            ]
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getOptionsGridConfig(int $sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'componentType' => DynamicRows::NAME,
                        'component' => 'Magento_Catalog/js/components/dynamic-rows-import-custom-options',
                        'template' => 'ui/dynamic-rows/templates/collapsible',
                        'additionalClasses' => 'admin__field-wide',
                        'deleteProperty' => self::FIELD_IS_DELETE,
                        'deleteValue' => '1',
                        'addButton' => false,
                        'renderDefaultRecord' => false,
                        'columnsHeader' => false,
                        'collapsibleHeader' => true,
                        'sortOrder' => $sortOrder,
                        'dataProvider' => self::CUSTOM_OPTIONS_LISTING,
                        'imports' => [
                            'insertData' => '${ $.provider }:${ $.dataProvider }',
                            '__disableTmpl' => ['insertData' => false],
                        ],
                    ],
                ],
            ],
            'children' => [
                'record' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'headerLabel' => __('New Tab'),
                                'componentType' => Container::NAME,
                                'component' => 'Magento_Ui/js/dynamic-rows/record',
                                'positionProvider' => self::CONTAINER_OPTION . '.' . self::FIELD_SORT_ORDER_NAME,
                                'isTemplate' => true,
                                'is_collection' => true,
                            ],
                        ],
                    ],
                    'children' => [
                        self::CONTAINER_OPTION => [
                            'arguments' => [
                                'data' => [
                                    'config' => [
                                        'componentType' => Fieldset::NAME,
                                        'collapsible' => true,
                                        'label' => null,
                                        'sortOrder' => 10,
                                        'opened' => true,
                                    ],
                                ],
                            ],
                            'children' => [
                                self::CONTAINER_COMMON_NAME => $this->getCommonContainerConfig(10),
                                self::FIELD_TEXT_TAB => $this->getTextFieldConfig(20),
                            ],
                        ],
                    ]
                ]
            ]
        ];
    }


    protected function getCommonContainerConfig($sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'componentType' => Container::NAME,
                        'formElement' => Container::NAME,
                        'component' => 'Magento_Ui/js/form/components/group',
                        'breakLine' => false,
                        'showLabel' => false,
                        'additionalClasses' => 'admin__field-group-columns admin__control-group-equal',
                        'sortOrder' => $sortOrder,
                    ],
                ],
            ],
            'children' => [
                self::FIELD_TITLE_NAME => $this->getTitleFieldConfig(10),
                self::FIELD_IS_HIDE => $this->getHideFieldConfig(20),
            ]
        ];
    }

    protected function getTitleFieldConfig(int $sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Title'),
                        'componentType' => Field::NAME,
                        'component' => 'Magento_Catalog/component/static-type-input',
                        'valueUpdate' => 'input',
                        'formElement' => Input::NAME,
                        'dataScope' => self::FIELD_TITLE_NAME,
                        'dataType' => Text::NAME,
                        'sortOrder' => $sortOrder,
                        'validation' => [
                            'required-entry' => true
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getHideFieldConfig(int $sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Hide'),
                        'componentType' => Field::NAME,
                        'formElement' => Checkbox::NAME,
                        'dataScope' => self::FIELD_IS_HIDE,
                        'dataType' => Text::NAME,
                        'sortOrder' => $sortOrder,
                        'value' => '1',
                        'valueMap' => [
                            'true' => '1',
                            'false' => '0'
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getTextFieldConfig(int $sortOrder): array
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Text Tab'),
                        'componentType' => Field::NAME,
                        'formElement' => Wysiwyg::NAME,
                    ],
                ],
            ],
        ];
    }
}
