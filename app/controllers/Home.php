<?php

class Home extends Controller
{
    public function index($a = null, $b = null, $c = null)
    {
        // Load the home view
        $this->view('home');
    }

}
