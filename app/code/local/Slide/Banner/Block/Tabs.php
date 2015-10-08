<?php
 class Slide_Banner_Block_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('tabsss');

        /*
         * By default DestElementId = 'content'... if you trace the function you will see.
         * Meaning, it responds to layout block name?! like "content", "footer", "left"... 
         * Its basicaly telling the layout where to output tabs canvas aka display area
         */
        //$this->setDestElementId('my_custom_edit_form');
        
        $this->setTitle(Mage::helper('banner')->__('Banners'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('tab_id1', array(
            'label'     => Mage::helper('banner')->__('Banner Information'),
            'title'     => Mage::helper('banner')->__('Banner Information'),
            'content'   => $this->getLayout()->createBlock("Slide_Banner_Block_Adminhtml_Banner_Edit")->toHtml(),
            'active'    => true
        ));
		/*
        $this->addTab('tab_id2', array(
            'label'     => Mage::helper('banner')->__('Banner Display Setting'),
            'title'     => Mage::helper('banner')->__('Banner Display Setting'),
            'content'   => $this->getLayout()->createBlock("Slide_Banner_Block_Adminhtml_Banner_Setting")->toHtml(),//$block,//'Another content here. As mentioned, we could add direct string here, or we can use something like $this->getLayout()->createBlock("adminhtml/cms_page_edit_tab_main")->toHtml()',
            'active'    => false
        ));
        
            */   
        
        return parent::_beforeToHtml();
    } 
}
