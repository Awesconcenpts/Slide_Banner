<?php
 
class Slide_Banner_Block_Adminhtml_Banner_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
		
        if (Mage::getSingleton('adminhtml/session')->getBannerData())
        {
            $data = Mage::getSingleton('adminhtml/session')->getBannerData();
            Mage::getSingleton('adminhtml/session')->getBannerData(null);
        }
        elseif (Mage::registry('banner_data'))
        {
            $data = Mage::registry('banner_data')->getData();
        }
        else
        {
            $data = array();
        }
 
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data',
        ));
 
        $form->setUseContainer(true);
 
        $this->setForm($form);
 
        $fieldset = $form->addFieldset('banner_form', array(
             'legend' =>Mage::helper('banner')->__('Banner Information')
        ));
 
        $fieldset->addField('banner_title', 'text', array(
             'label'     => Mage::helper('banner')->__('Banner Title'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'banner_title',
            // 'note'     => Mage::helper('banner')->__('The name of the example.'),
        ));
		 
		$fieldset->addField('banner_type', 'text', array(
             'label'     => Mage::helper('banner')->__('Banner Position'),
             'class'     => '',
             'required'  => false,
             'name'      => 'banner_type',
            // 'note'     => Mage::helper('banner')->__('The name of the example.'),
        ));
		/*$fieldset->addField('banner_type', 'select', array(
          'label'     => Mage::helper('banner')->__('Banner Tyle'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'banner_type',
          'onclick' => "",
          'onchange' => "",
          'value'  => 'one',
          'values' => array('one'=>'Please Select..','left' => 'Left side Banner','slide' => 'Slide Banner'),
          'disabled' => false,
          'readonly' => false,
          'tabindex' => 1
        ));
		*/

		/*$fieldset->addField('banner_type', 'select', array(
             'label'     => Mage::helper('banner')->__('Banner Type'),
             'class'     => 'required-entry',
             'required'  => true,
             'name'      => 'banner_type',
			 'value'  => '0',
			 'values' => array(
					 array('0'=>'Please Select..','left' => 'Left side Banner','slide' => 'Slide Banner')
			 ),
            // 'note'     => Mage::helper('banner')->__('The name of the example.'),
        ));
		*/
 
        $fieldset->addField('banner_url', 'text', array(
             'label'     => Mage::helper('banner')->__('BannerLink URL'),
             'class'     => '',
             'required'  => false,
             'name'      => 'banner_url',
        ));
 		$fieldset->addField('banner_image', 'file', array(
            'label'     => Mage::helper('banner')->__('Upload Banner Image'),
            'class'     => '',
            'required'  => false,
            'name'      => 'banner_image',
        ));
        $fieldset->addField('banner_desc', 'textarea', array(
             'label'     => Mage::helper('banner')->__('Banner Description'),
             'class'     => '',
             'required'  => true,
             'name'      => 'banner_desc',
        ));
 
        $form->setValues($data);
 		$form->setUseContainer(true);
        return parent::_prepareForm();
    }
}