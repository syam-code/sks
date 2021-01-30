<?php

class Fungsi
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        // $this->ci->load->model('user_m');
    }
}
