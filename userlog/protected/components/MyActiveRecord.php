<?php

class MyActiveRecord extends CActiveRecord {

    //public $pageSize = 500;
    protected function items() {
        //User Status
        $items['userStatus']['0'] = "Inactive";
        $items['userStatus']['1'] = "Active";
        
        $items['type']['0'] = "Admin";
        $items['type']['1'] = "User";
        return $items;
    }

    public function get_items($param) {
        $items = $this->items();

        return isset($items[$param]) ? $items[$param] : "No Data";
    }

    public function get_item($param1, $param2) {
        $items = $this->items();

        if (isset($items[$param1][$param2]))
            return $items[$param1][$param2];
        else
            return "No Data Found";
    }

    public function behaviors(){
      return array( 'ActiveRecordLogableBehavior'=>
        'application.components.ActiveRecordLogableBehavior',
      'CAdvancedArBehavior' => array(
          'class' => 'application.extensions.CAdvancedArBehavior')
         ); 
    }
    /** function used for SiteLogo Path * */
}