<?php
 
class Slide_Banner_Block_Adminhtml_Setting_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('banner_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
		$this->_pagerVisibility =false;
		$this->_filterVisibility=false;
		$this->setTemplate('banner/grid2.phtml');
        $this->setSaveParametersInSession(true);
    }
 
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('banner/banner')->getCollection();//->addFieldToFilter('banner_type','slide');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
 
    protected function _prepareColumns()
    {
		/* $this->addColumn('action',
            array(
            'header'    =>  Mage::helper('banner')->__('Action'),
            'width'     => '100',
            'type'      => 'action',
            'getter'    => 'getId',
            'actions'   => array(
                    array(
                            'caption'   => Mage::helper('banner')->__('Edit'),
                            'url'       => array('base'=> '..edit'),
                            'field'     => 'id'
                    )
            ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'id',
            'is_system' => true,
    ));*/
		$this->addColumn('id', array(
        'header'   => Mage::helper('banner')->__('SN'),
        'width'    => '20px',
        'type'     => 'checkbox',
        'align'    => 'center',
        'index'    => 'id',
		'checked'  =>'checked',
        'values'   => $this->BannerGral(),
		'label' => Mage::helper('banner')->__('id'),
		'field_name' => 'checkbox_name[]',
        'editable' => 'true',
));
        /*$this->addColumn('id', array(
            'header'    => Mage::helper('banner')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'id',
        ));*/
 
        $this->addColumn('banner_title', array(
            'header'    => Mage::helper('banner')->__('Banner_Title'),
            'align'     =>'left',
            'index'     => 'banner_title',
        ));
 
        $this->addColumn('banner_url', array(
            'header'    => Mage::helper('banner')->__('Banner Link URL'),
            'align'     =>'left',
            'index'     => 'banner_url',
        ));
 
 
        return parent::_prepareColumns();
    }
 	public function BannerGral(){
			$pageid=(isset($_GET['page']) && $_GET['page']!='')?$_GET['page']:'fdsfdsfgd';
			$model = Mage::getModel('banner/bannersetting')->getCollection()->addFieldToFilter('page_id',$pageid);
			$arrys=array();
			foreach ($model as $ccitem) {
				$arrys[]=$ccitem['banner_id'];
			}
			//die();
		return $arrys;	
	}
   
	/*protected function _prepareMassaction()
	{
		$this->setMassactionIdField('id');
		$this->getMassactionBlock()->setFormFieldName('id');
		$this->getMassactionBlock()->addItem('delete', array(
		'label'=> Mage::helper('banner')->__('Delete'),
		'url'  => $this->getUrl('save', array('' => '')),        // public function massDeleteAction() in Mage_Adminhtml_Tax_RateController
		'confirm' => Mage::helper('banner')->__('Are you sure?')
		));
		return $this;
	}
	*/
}