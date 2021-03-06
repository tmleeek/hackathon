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


class AW_Points_Block_Adminhtml_Transaction_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'points';
        $this->_controller = 'adminhtml_transaction';
        parent::__construct();
        $this->_removeButton('save');
        $this->_removeButton('reset');
        $this->_removeButton('delete');
    }

    public function getHeaderText()
    {
        return Mage::helper('points')->__(
            'Transaction # %s | %s',
            Mage::registry('points_current_transaction')->getId(),
            Mage::getModel('core/date')->date(
                'M d, Y H:i:s', Mage::registry('points_current_transaction')->getChangeDate()
            )
        );
    }
}