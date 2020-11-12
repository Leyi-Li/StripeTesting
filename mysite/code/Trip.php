<?php

class Trip extends DataObject {

    private static $db = array (
        'Name' => 'Varchar',
    );

    private static $has_many = array (
        'Destinations' => 'Destination'
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

}