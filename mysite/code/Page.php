<?php

class Page extends SiteTree
{
    private static $db = array(
    );

    private static $has_one = array(
    );

    private static $has_many = array(
        'Trips' => 'Trip',
        'Destinations' => 'Destination'
    );

    private static $allowed_children = array(
        'TripPage'
    );
}
