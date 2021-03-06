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
class Aitoc_Aitemails_Block_Email_Template_Grid_Renderer_Sender extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $str = 'Name Lastname [mail@example.com]';
        
        if($row->getTemplateSenderName()) {
            $str .= htmlspecialchars($row->getTemplateSenderName()) . ' ';
        }        
        
        if($row->getTemplateSenderEmail()) {
            $str .= '[' . $row->getTemplateSenderEmail() . ']';
        }        
        
        if($str == '') {
            $str .= '---';
        }
            
        return $str;
    }
}