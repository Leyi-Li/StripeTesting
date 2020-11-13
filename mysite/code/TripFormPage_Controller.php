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
                FormAction::create('handleTrip','Submit')
            )
        );
        return $form;
    }

    /**
     * @param Form $form 
     */
    public function handleTrip($data, $form){
        $existing = Trip::get()->filter([
            'Name' => $data['Name']
        ]
        );

        if($existing->exists()){
            $form->sessionMessage('This trip already exsits', 'bad');
            return $this->redirectBack();
        }

        /** @var Trip $trip */
        $trip = Trip::create(); 
        $form->saveInto($trip);
        $trip->write();
        $form->sessionMessage('New Trip Created', 'good');

        return $this->redirect('new-destination/?tripID='.$trip->ID);
    }
}