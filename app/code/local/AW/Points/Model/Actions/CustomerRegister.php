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


class AW_Points_Model_Actions_CustomerRegister extends AW_Points_Model_Actions_Abstract
{
    protected $_action = 'customer_register';
    protected $_comment = 'Reward for registration';

    public function setAmount($_amount)
    {
        if (!is_null($_amount)) {
            $this->_amount = $_amount;
        } else {
            //TODO: check
            $_amount = Mage::helper('points/config')->getPointsForRegistration();
        }
        return $this;
    }
}