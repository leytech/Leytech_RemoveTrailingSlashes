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

    public function isEnabled()
    {
        return Mage::getStoreConfig(self::XML_PATH_SETTINGS_ENABLED);
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

}