<?php
/**
 * Magestore
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category    Magestore
 * @package     Magestore_Inventorydropship
 * @copyright   Copyright (c) 2012 Magestore (http://www.magestore.com/)
 * @license     http://www.magestore.com/license-agreement.html
 */

/**
 * Inventorydropship Edit Block
 * 
 * @category     Magestore
 * @package     Magestore_Inventorydropship
 * @author      Magestore Developer
 */
class Magestore_Inventorydropship_Block_Adminhtml_Inventorydropship_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        
        $this->_objectId = 'id';
        $this->_blockGroup = 'inventorydropship';
        $this->_controller = 'adminhtml_inventorydropship';
        
        $this->_updateButton('save', 'label', Mage::helper('inventorydropship')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('inventorydropship')->__('Delete Item'));
        
        $this->_addButton('saveandcontinue', array(
            'label'        => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'    => 'saveAndContinueEdit()',
            'class'        => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('inventorydropship_content') == null)
                    tinyMCE.execCommand('mceAddControl', false, 'inventorydropship_content');
                else
                    tinyMCE.execCommand('mceRemoveControl', false, 'inventorydropship_content');
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }
    
    /**
     * get text to show in header when edit an item
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('inventorydropship_data')
            && Mage::registry('inventorydropship_data')->getId()
        ) {
            return Mage::helper('inventorydropship')->__("Edit Item '%s'",
                                                $this->htmlEscape(Mage::registry('inventorydropship_data')->getTitle())
            );
        }
        return Mage::helper('inventorydropship')->__('Add Item');
    }
}