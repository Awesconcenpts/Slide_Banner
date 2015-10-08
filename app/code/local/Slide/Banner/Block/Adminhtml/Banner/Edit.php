<?php
 
class Slide_Banner_Block_Adminhtml_Banner_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
		parent::__construct();
 
        $this->_objectId = 'id';
        $this->_blockGroup = 'slide_banner_block1';
        $this->_controller = 'adminhtml_banner';
        $this->_mode = 'edit';
 
        $this->_addButton('save_and_continue', array(
                  'label' => Mage::helper('banner')->__('Save And Continue Edit'),
                  'onclick' => 'saveAndContinueEdit()',
                  'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', Mage::helper('banner')->__('Save Banner'));
 
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }
 
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }
 
    public function getHeaderText()
    {
        if (Mage::registry('banner_data') && Mage::registry('banner_data')->getId())
        {
            return Mage::helper('banner')->__('Edit Banner "%s"', $this->htmlEscape(Mage::registry('banner_data')->getBannerTitle()));
        } else {
            return Mage::helper('banner')->__('New Banner');
        }
    }
 
}