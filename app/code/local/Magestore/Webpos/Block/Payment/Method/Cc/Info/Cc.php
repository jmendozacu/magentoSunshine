<?php
class Magestore_Webpos_Block_Payment_Method_Cc_Info_Cc extends Mage_Payment_Block_Info
{
	/* 
		This block will show the payment method information
	*/
	
    protected function _prepareSpecificInformation($transport = null)
    {
        if (null !== $this->_paymentSpecificInformation) {
            return $this->_paymentSpecificInformation;
        }
        $info = $this->getInfo();
        $transport = new Varien_Object();
        $transport = parent::_prepareSpecificInformation($transport);
        return $transport;
    }
	protected function _construct() 
    {
        parent::_construct();
        /* 
			$this->setTemplate('webpos/admin/webpos/payment/method/info/cc.phtml'); 
		*/
    }
	
	public function getMethodTitle(){
		return Mage::helper('webpos/payment')->getCcMethodTitle();
	}

}
