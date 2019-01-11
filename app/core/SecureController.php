<?php

namespace App\Core;

abstract class SecureController extends Controller 
{
    protected $user;

    public function __construct($request)
    {
        parent::__construct($request);

        if (!$this->request->getSession()->isAttribut('user')){

            $this->redirection('Auth', 'login');

        }
        $this->user = $this->request->getSession()->getAttribut('user');
    }
}