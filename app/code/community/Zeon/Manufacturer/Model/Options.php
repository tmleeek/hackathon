<?php
/**
 * zeonsolutions inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.zeonsolutions.com/shop/license-community.txt
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * This package designed for Magento COMMUNITY edition
 * =================================================================
 * zeonsolutions does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * zeonsolutions does not provide extension support in case of
 * incorrect edition usage.
 * =================================================================
 *
 * @category   Zeon
 * @package    Zeon_Manufacturer
 * @version    0.0.1
 * @copyright  @copyright Copyright (c) 2013 zeonsolutions.Inc. (http://www.zeonsolutions.com)
 * @license    http://www.zeonsolutions.com/shop/license-community.txt
 */

class Zeon_Manufacturer_Model_Options extends Mage_Core_Model_Abstract
{
    public function getManufacturers()
    {
        $attributeCode = Mage::helper('zeon_manufacturer')->getManufacturersAttributeCode();
        $attribute = Mage::getModel('eav/config')->getAttribute('catalog_product', "$attributeCode");
        foreach ($attribute->getSource()->getAllOptions(true, true) as $option) {
             $attributeArray[$option['value']] = $option['label'];
        }
        return($attributeArray);
    }
}