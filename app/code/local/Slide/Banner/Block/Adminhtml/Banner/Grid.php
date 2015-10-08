<?php
 
class Slide_Banner_Block_Adminhtml_Banner_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {

        parent::__construct();
        $this->setId('banner_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }
 
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('banner/banner')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
 
    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'    => Mage::helper('banner')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'id',
        ));
 
        $this->addColumn('banner_title', array(
            'header'    => Mage::helper('banner')->__('Banner Title'),
            'align'     =>'left',
            'index'     => 'banner_title',
        ));

        $this->addColumn('description', array(
            'header'    => Mage::helper('banner')->__('Banner URL'),
            'align'     =>'left',
            'index'     => 'banner_url',
        ));
 
       
 
        return parent::_prepareColumns();
    }
 
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}