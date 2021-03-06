<?php
/**
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 *
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This software is designed to work with Magento community edition and
 * its use on an edition other than specified is prohibited. aheadWorks does not
 * provide extension support in case of incorrect edition use.
 * =================================================================
 *
 * @category   AW
 * @package    AW_Points
 * @version    1.7.3
 * @copyright  Copyright (c) 2010-2012  ()
 * @license
 */


class AW_Points_Model_Mysql4_Rule_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        $this->_init('points/rule');
    }

    public function addAvailableFilter()
    {
        $currentDate = Mage::getModel('core/date')->gmtDate('Y-m-d');
        $this->getSelect()
            ->where('is_active = ?', 1)
            ->where('date(from_date) <= ?', $currentDate)
            ->where('date(to_date) >= ? OR to_date is null', $currentDate);
        return $this;
    }

    public function addFilterByCustomerGroup($customerGroupId)
    {
        $this->getSelect()
            ->where('FIND_IN_SET(?, customer_group_ids)', $customerGroupId);
        return $this;
    }

    public function addFilterByWebsiteId($websiteId)
    {
        $this->getSelect()
            ->where('FIND_IN_SET(?, website_ids)', $websiteId);
        return $this;
    }

}
