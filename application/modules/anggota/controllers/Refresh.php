<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Refresh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Main_model', 'Main');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Refresh_model', 'Refresh');
    }

    public function index()
    {
        $this->Refresh->refresh();
    }

    public function shareprofit()
    {
        $this->Refresh->share_profit();
    }
}
