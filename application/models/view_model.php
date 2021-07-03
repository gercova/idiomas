<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class view_model extends CI_Model {

    protected $route;
    protected $data;
    protected $content_route = null;

    function render_view($route = null, $data = null, $content_route = null){
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view($route, $data);
		$this->load->view('layouts/footer');
        $this->load->view('layouts/footer_add');
        if($content_route !== null){
            $this->load->view($content_route);
        }
    }

}