<?php

/**
 * This file is part of The Official Amazon Payments Magento Extension
 * (c) creativestyle GmbH <amazon@creativestyle.de>
 * All rights reserved
 *
 * Reuse or modification of this source code is not allowed
 * without written permission from creativestyle GmbH
 *
 * @category   Creativestyle
 * @package    Creativestyle_CheckoutByAmazon
 * @copyright  Copyright (c) 2011 - 2013 creativestyle GmbH (http://www.creativestyle.de)
 * @author     Marek Zabrowarny / creativestyle GmbH <amazon@creativestyle.de>
 */
class Creativestyle_CheckoutByAmazon_Model_Log_Abstract extends Mage_Core_Model_Abstract {

    protected
        $_resourceName = 'checkoutbyamazon/log_abstract';

    protected function _construct() {
        $this->_init($this->_resourceName);
    }

    public function cleanLogs($dueDate = null) {
        $this->getResource()->cleanLogs($dueDate);
        return $this;
    }
}