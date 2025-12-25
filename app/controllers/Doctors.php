<?php

class Doctors extends Controller
{
    public function index($a = null, $b = null, $c = null)
    {
        // Load the doctors view
        $this->view('doctors');
    }

}
