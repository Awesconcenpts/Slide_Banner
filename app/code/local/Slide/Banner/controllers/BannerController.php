<?php 
class Slide_Banner_BannerController extends Mage_Adminhtml_Controller_Action
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
	public function newAction(){
		$this->_forward('edit');
	}
	public function editAction(){
		$id = $this->getRequest()->getParam('id', null);
        $model = Mage::getModel('banner/banner');
        if ($id) {
            $model->load((int) $id);
            if ($model->getId()) {
				
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if ($data) {
                    $model->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('banner')->__('Example does not exist'));
                $this->_redirect('*/*/');
            }
        }
        Mage::register('banner_data', $model);
 
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
		$this->_addLeft($this->getLayout()->createBlock('Slide_Banner_Block_Tabs'));
        $this->renderLayout();
		//var_dump(Mage::getSingleton('core/layout')->getUpdate()->getHandles());
//die();
	}
	public function saveAction(){
	 if ($data = $this->getRequest()->getPost())
        {
            $model = Mage::getModel('banner/banner');
			
			
			
			
			 if($_FILES['banner_image']['name'] != '') {
					try {    
						 $uploader = new Varien_File_Uploader('banner_image');
						 $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
						 $uploader->setAllowRenameFiles(false);
						 $uploader->setFilesDispersion(false);
					 
						 $path = Mage::getBaseDir('media') . DS .'slide_banner'.DS;
						//die();
						 $uploader->save($path, $_FILES['banner_image']['name']);
						 $data['banner_image'] = $_FILES['banner_image']['name'];
					} catch (Exception $e) {
						  echo $e;
					}
    				
					
			} 
			
			$data['banner_type'] = $_POST['banner_type'];
			
			
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            $model->setData($data);
 
            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try {
                if ($id) {
                    $model->setId($id);
                }
                $model->save();
 
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('banner')->__('Error saving banner'));
                }
 
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('banner')->__('Banner was successfully saved.'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
 
                // The following line decides if it is a "save" or "save and continue"
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
 
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }
 
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('banner')->__('No data found to save'));
        $this->_redirect('*/*/');	
	}
	public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $model = Mage::getModel('banner/banner');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('banner')->__('The Banner has been deleted.'));
                $this->_redirect('*/*/');
                return;
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('banner')->__('Unable to find the Banner to delete.'));
        $this->_redirect('*/*/');
    }

}
?>