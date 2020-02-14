<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'Home');
        $this->load->model('Helper_model', 'Helper');
    }

    public function index()
    {
        $this->Home->view('home');
    }

    public function tentang()
    {
        $this->Home->view('tentang');
    }

    public function visimisi()
    {
        $this->Home->view('visimisi');
    }

    public function adrt()
    {
        $this->Home->view('adrt');
    }

    public function struktur()
    {
        $this->Home->view('struktur');
    }

    public function hubungikami()
    {
        $this->Home->view('contact_us');
    }

    public function maintenance()
    {
        echo "maintenance";
    }
}
