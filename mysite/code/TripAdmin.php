<?php

class TripAdmin extends ModelAdmin {
    private static $menu_title = 'Trips';
    private static $url_segment = 'Trips';
    private static $managed_models = array (
        'Trip',
        'Destination'
    );
}