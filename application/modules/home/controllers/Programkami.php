<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Programkami extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'Home');
        $this->load->model('Blog_model', 'Blog');
        $this->load->model('Helper_model', 'Helper');
    }

    public function index()
    {
        $this->all();
    }

    public function all($page = "1")
    {
        $this->load->library('pagination');

        //konfigurasi pagination
        $config['base_url'] = base_url() . "home/programkami/all";
        $config['total_rows'] = $this->Blog->count_blog();
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="row"><div class="col"><ul class="pagination float-right">';
        $config['full_tag_close']   = '</ul></div></div>';
        $config['num_tag_open']     = '<li class="page-item"><a class="page-link">';
        $config['num_tag_close']    = '</a></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="page-item"><a class="page-link">';
        $config['next_tagl_close']  = '<i class="fas fa-angle-right"></i></a></li>';
        $config['prev_tag_open']    = '<li class="page-item"><a class="page-link">';
        $config['prev_tagl_close']  = '<i class="fas fa-angle-left"></i></a></li>';
        $config['first_tag_open']   = '<li class="page-item"><a class="page-link">';
        $config['first_tagl_close'] = '</a></li>';
        $config['last_tag_open']    = '<li class="page-item"><a class="page-link">';
        $config['last_tagl_close']  = '</a></li>';

        $this->pagination->initialize($config);
        $main['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $main['blog'] = $this->Blog->get_blog($config["per_page"], $main['page']);
        $main['pagination'] = $this->pagination->create_links();
        $this->Home->view('blog_all', $main);
    }

    public function read($slug)
    {
        if ($slug != "") {
            $query = $this->db->query(' SELECT *
											FROM tb_blog
											WHERE slug = "' . $slug . '"');
            if ($query->num_rows() > 0) {
                $main['blog'] = $query->row_array();
                $this->Home->view('blog_readmore', $main);
            } else {
                redirect('programkami');
            }
        }
    }
}
