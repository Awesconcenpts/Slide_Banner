<?php
 class Slide_Banner_Block_Adminhtml_Banner extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_banner';
		$this->_blockGroup = 'slide_banner_block1'; 
        $this->_headerText = Mage::helper('banner')->__('Banner Manager');
        $this->_addButtonLabel = Mage::helper('banner')->__('Add News Banner');
        parent::__construct();
    }
	protected function _prepareLayout()
   {
       $this->setChild('grid',
       $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
       $this->_controller . '.grid')->setSaveParametersInSession(true) );
       return parent::_prepareLayout();
   }
}
