<?php

class TripFormPage_Controller extends Page_Controller {
    private static $allowed_actions = [
        'TripForm',
        'handleTrip'
    ];

    public function TripForm() {
        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Name', '')
                    ->setAttribute('Placeholder', 'Name*')
            ),
            FieldList::create(
                FormAction::create('handleTrip','Post Trip')
            )
        );
        return $form;
    }

    /**
     * @param Form $form 
     */
    public function handleTrip($data, $form){
        $trip = $Trip::create();
        $form->saveInto($trip);
        $form->sessionMessage('New Trip Created', 'good');

        return $this->redirectBack();
    }
}