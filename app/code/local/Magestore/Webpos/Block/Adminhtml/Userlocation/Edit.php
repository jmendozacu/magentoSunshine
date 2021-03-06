<?php
/**
 * Created by PhpStorm.
 * User: Quoc Viet
 * Date: 07/07/2015
 * Time: 9:58 SA
 */

class Magestore_Webpos_Block_Adminhtml_Userlocation_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'webpos';
        $this->_controller = 'adminhtml_userlocation';

        $this->_updateButton('save', 'label', Mage::helper('webpos')->__('Save Location'));
        $this->_updateButton('delete', 'label', Mage::helper('webpos')->__('Delete Location'));

        $this->_addButton('saveandcontinue', array(
            'label'        => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'    => 'saveAndContinueEdit()',
            'class'        => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('userlocation_content') == null)
                    tinyMCE.execCommand('mceAddControl', false, 'userlocation_content');
                else
                    tinyMCE.execCommand('mceRemoveControl', false, 'userlocation_content');
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }


    public function getHeaderText()
    {
        if (Mage::registry('userlocation_data')
            && Mage::registry('userlocation_data')->getId()
        ) {
            return Mage::helper('webpos')->__("Edit Location '%s'",
                $this->htmlEscape(Mage::registry('userlocation_data')->getDisplayName())
            );
        }
        return Mage::helper('webpos')->__('Add Location');
    }
}