<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends CI_Controller {
	
	public function index()
	{
		$this->load->view('frontend/include/header');
        $this->load->view('frontend/include/footer');
        $this->load->view('frontend/pages/about');
        $this->load->view('frontend/pages/contact');
        $this->load->view('frontend/pages/home');
        $this->load->view('frontend/pages/news');
        $this->load->view('frontend/pages/pricing');
        $this->load->view('frontend/pages/projects');
        $this->load->view('frontend/pages/services');
        $this->load->view('frontend/pages/team');
        $this->load->view('frontend/pages/testimonials');
        $this->load->view('frontend/pages/typography');
	}
}
