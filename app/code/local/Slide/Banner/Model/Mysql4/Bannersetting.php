<?php
class Slide_Banner_Model_Mysql4_Bannersetting extends Mage_Core_Model_Mysql4_Abstract
{
     public function _construct()
     {
         $this->_init('banner/bannersetting', 'setting_id');
     }
}