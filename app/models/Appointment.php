<?php


class Appointment
{
    use Model;

    protected $table = 'appointments';
    protected $allowedColumns = [
        'p_id',
        'd_id',
        'appointment_date',
        'appointment_time',
        'creation_date'
    ]; 
    // specify which columns are allowed to be inserted or updated
}