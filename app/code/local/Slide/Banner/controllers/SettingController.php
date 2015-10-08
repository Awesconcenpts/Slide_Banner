<?php 
class Slide_Banner_SettingController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
		$this->loadLayout();
		//$block = $this->getLayout()->createBlock(
		//	'Mage_Core_Block_Template',
		//	'Super_Awesome_Block_Adminhtml_Awesome_Grid',
			//array('template' => 'banner/list.phtml')
		//);
		//$this->getLayout()->getBlock('content')->append($block);
		
		$this->renderLayout();

//var_dump(Mage::getSingleton('core/layout')->getUpdate()->getHandles());
//die();

    }
	
	public function saveAction(){
		$post=$this->getRequest()->getPost();
		if($post){
			$pageid=(isset($_GET['page']) && $_GET['page']!='')?$_GET['page']:$post['pages'];
			$model = Mage::getModel('banner/bannersetting')->getCollection()->addFieldToFilter('page_id',$pageid);
			foreach ($model as $ccitem) {
				$ccitem->delete();
			}
			if(isset($post['checkbox_name']) && is_array($post['checkbox_name'])){
				$banner=$post['checkbox_name'];
				foreach($banner as $id){
					$setting=Mage::getModel('banner/bannersetting');
					$setting->setbanner_id($id);
					$setting->setpage_id($pageid);
					$query = $setting->save();
				}
			}
		 $this->_redirect('*/*/',array('_query'=>array('page'=>$pageid)));
		 
		 }
	  
	}
	

}
?>