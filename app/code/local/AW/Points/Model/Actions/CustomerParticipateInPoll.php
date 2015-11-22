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


class AW_Points_Model_Actions_CustomerParticipateInPoll extends AW_Points_Model_Actions_Abstract
{
    protected $_action = 'customer_participate_in_poll';
    protected $_comment = 'Reward for participating in poll';

    protected function _applyLimitations($amount)
    {
        $pointLimitForAction = Mage::helper('points/config')->getPointsLimitForParticipatingInPoll();

        $collection = Mage::getModel('points/transaction')
            ->getCollection()
            ->addFieldToFilter('summary_id', $this->getSummary()->getId())
            ->addFieldToFilter('action', $this->getAction())
            ->limitByDay(Mage::getModel('core/date')->gmtTimestamp());

        /* Current summ getting */
        $summ = 0;
        foreach ($collection as $transaction) {
            $summ += $transaction->getBalanceChange();
        }
        return parent::_applyLimitations($this->_calculateNewAmount($summ, $amount, $pointLimitForAction));
    }
}