<?php
/**
 * Email Template Manager
 *
 * @category:    Aitoc
 * @package:     Aitoc_Aitemails
 * @version      2.0.15
 * @license:     GJkOrjFJ3FDd0bwCKiZv6ZcnFSqCjq1hKOLxXNQDVB
 * @copyright:   Copyright (c) 2015 AITOC, Inc. (http://www.aitoc.com)
 */
class Aitoc_Aitemails_Block_Email_Template_Grid_Renderer_Customtemplate extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action
{
    public function render(Varien_Object $row)
    {
        $str = '';
        
        if($row->getCustomTemplate()) {
            $str .= $row->getCustomTemplate();
        }        
        
        if($str == '') {
            $str .= '---';
        }
            
        return $str;
    }
}