<?php

class RestController extends Controller
{
    private static $allowed_actions = array(
        'delete'
    );

    public function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
    }

    public function delete(SS_HTTPRequest $request) {
        $selectedID = $this->getRequest()->params('ID');
        $destination = Destination::get()->byID($selectedID);
        $destination->delete();

        return $this->redirect('/');
    }

}
