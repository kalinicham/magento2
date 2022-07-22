<?php
declare(strict_types=1);

namespace Example\SystemXML\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Helper data config SystemXML
 */
class DataConfig extends AbstractHelper
{
    private const XML_PATH_CUSTOM_TAB = "custom_tab/";
    public const CUSTOM_TAB_ENABLE = 'enable';

    /**
     * Get general config
     *
     * @param $code
     *
     * @return mixed
     */
    public function getGeneralConfig($code)
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CUSTOM_TAB . "general/" . $code);
    }
}
