<?php
/**
 * @package    Leytech_RemoveTrailingSlashes
 * @author     Chris Nolan (chris@leytech.co.uk)
 * @copyright  Copyright (c) 2018 Leytech
 * @license    https://opensource.org/licenses/MIT  The MIT License  (MIT)
 */
class Leytech_RemoveTrailingSlashes_Model_Url extends Mage_Core_Model_Url
{
    /**
     * Build url by requested path and parameters
     *
     * @param string|null $routePath
     * @param array|null $routeParams
     * @return  string
     */
    public function getUrl($routePath = null, $routeParams = null)
    {
        $url = parent::getUrl($routePath, $routeParams);
        if(!Mage::helper('leytech_remove_trailing_slashes')->isEnabled()) {
            return $url;
        }
        if (Mage::helper('leytech_remove_trailing_slashes')->isAdmin()) {
            return $url;
        }
        return rtrim($url, '/');
    }
}