<?php
 class Slide_Banner_Block_Adminhtml_Setting extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        
		$this->_controller = 'adminhtml_setting';
		$this->_blockGroup = 'slide_banner_block1'; 
        $this->_headerText = Mage::helper('banner')->__('Banner Setting');
		 ///////CUSTOM code for new button:
       
       ///////End CUSTOM code
	  
	   //$data = array(
              // 'label' =>  'Save Setting',
			  	//'onclick'   => "banner_grid_massactionJsObject.apply()",
               //'onclick'   => "setLocation('".$this->getUrl('*/*/save')."')"
              // );
       ///////The URL I am using is a custom module that I set up earlier, Magento parses it to <MySite.com/shop/index.php/downloadtomas>, which then runs the script I have in the IndexController.php file
      // Mage_Adminhtml_Block_Widget_Container::addButton('download_to_mas', $data, 0, 100,  'header', 'header');
        parent::__construct();
		
		$this->_removeButton('add');
		
    }
	protected function _prepareLayout()
   {
       $this->setChild('grid',
       $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
       $this->_controller . '.grid')->setSaveParametersInSession(true) );
       return parent::_prepareLayout();
   }

}
