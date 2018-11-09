<?php
/**
 * @package    Leytech_RemoveTrailingSlashes
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2018 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
 */

class Leytech_RemoveTrailingSlashes_Helper_Data extends Mage_Core_Helper_Data
{

    const XML_PATH_SETTINGS_ENABLED = 'leytech_remove_trailing_slashes/settings/enabled';
    const XML_PATH_SETTINGS_WHITELIST = 'leytech_remove_trailing_slashes/settings/whitelist';

    public function isEnabled()
    {
        return Mage::getStoreConfig(self::XML_PATH_SETTINGS_ENABLED);
    }

    public function getWhitelist()
    {
        return Mage::getStoreConfig(self::XML_PATH_SETTINGS_WHITELIST);
    }

    public function getWhitelistAsArray()
    {
        return preg_split("/\r\n|\n|\r/", $this->getWhitelist());
    }

    public function isAdmin()
    {
        if(Mage::app()->getStore()->isAdmin()) {
            return true;
        }
        if(Mage::getDesign()->getArea() == 'adminhtml') {
            return true;
        }
        return false;
    }

    public function isPathInWhitelist($path)
    {
        $whitelist = $this->getWhiteListAsArray();
        if (!empty($whitelist)) {
            foreach ($whitelist as $pattern) {
                if (preg_match($pattern, $path) === 1) {
                    return true;
                }
            }
        }
        return false;
    }

}