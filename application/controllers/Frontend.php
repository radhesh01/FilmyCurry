<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

    private $settings = [];

    public function __construct() {
        parent::__construct();
        $this->load->model(['Post_model', 'Setting_model']);
        $this->settings = $this->Setting_model->get_flat();
    }

    public function index() {
        $data['settings'] = $this->settings;
        $data['posts']    = $this->Post_model->get_active();
        $this->_render('frontend/home', $data);
    }

    public function post($slug) {
        $post = $this->Post_model->get_by_slug($slug);
        if (!$post) show_404();
        $data['settings'] = $this->settings;
        $data['post']     = $post;
        $this->_render('frontend/post', $data);
    }

    public function about() {
        $data['settings'] = $this->settings;
        $this->_render('frontend/about', $data);
    }

    public function work() {
        $data['settings'] = $this->settings;
        $data['posts']    = $this->Post_model->get_active();
        $this->_render('frontend/work', $data);
    }

    public function contact() {
        $data['settings'] = $this->settings;
        $this->_render('frontend/contact', $data);
    }

    public function send_contact() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name',    'Name',    'required|trim');
        $this->form_validation->set_rules('email',   'Email',   'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');

        if ($this->form_validation->run()) {
            // Basic mail — swap for SMTP if needed
            $to      = $this->settings['site_email'] ?? 'contact@filmycurry.com';
            $subject = 'New Contact: ' . $this->input->post('name', TRUE);
            $body    = "Name: "    . $this->input->post('name', TRUE) . "\n"
                     . "Email: "   . $this->input->post('email', TRUE) . "\n"
                     . "Phone: "   . $this->input->post('phone', TRUE) . "\n"
                     . "Budget: "  . $this->input->post('budget', TRUE) . "\n\n"
                     . "Message:\n" . $this->input->post('message', TRUE);
            @mail($to, $subject, $body, 'From: ' . $this->input->post('email', TRUE));
            $this->session->set_flashdata('success', 'Message sent! We\'ll get back to you soon.');
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        redirect('contact');
    }

    private function _render($view, $data = []) {
        // Pass settings to layout
        $data['_settings'] = $this->settings;
        $this->load->view('layouts/frontend_layout_v2', ['content' => $this->load->view($view, $data, TRUE), 'data' => $data]);
    }
}
