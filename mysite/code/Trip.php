<?php
/**
 * @property string Name 
 */
class Trip extends DataObject {

    private static $db = array (
        'Name' => 'Varchar',
    );

    private static $has_many = array (
        'Destinations' => 'Destination'
    );

    private static $has_one = array (
        'TripFormPage' => 'TripFormPage'
    );

    /** 
     * @return DateTime - first destination’s start time
    */
    public function startTime() {
        
    }

    /** 
     * @return DateTime - last destination’s end time
    */
    public function endTime() {
        
    }

    /** 
     * @return Currency - sum of all destinations’ budgets
    */
    public function budget() {
        
    }

    public function getCMSfields() {
        $fields = parent::getCMSFields();
	    return $fields;
    }

}