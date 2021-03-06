<?php

class Magestore_Webpos_Block_Sales_Order_Totals extends Mage_Adminhtml_Block_Sales_Order_Totals {

    public function _initTotals() {
        parent::_initTotals();
        if($this->cashAmount() > 0)
            $this->_totals['webpos_cash'] = new Varien_Object(array(
                'code'      => 'webpos_cash',
                'strong'    => true,
                'value'     => $this->cashAmount(),
                'base_value'=> $this->cashAmount('base'),
                'label'     => $this->helper('sales')->__('Amount Tendered'),
            ));
    }

    public function cashAmount($type = null) {
        $order = $this->getParentBlock()->getOrder();
        if($type == 'base')
            $webposCash = $order->getWebposBaseCash();
        else
            $webposCash = $order->getWebposCash();
        return $webposCash;
    }
}
