<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    private $upload_path = 'assets/images/uploads/';

    public function __construct() {
        parent::__construct();
        $this->_require_login();
        $this->load->model('Post_model');
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['string', 'url', 'form']);
    }

    public function index() {
        $data['posts'] = $this->Post_model->get_all();
        $data['flash'] = $this->session->flashdata('msg');
        $this->_render('admin/posts/index', $data);
    }

    public function create() {
        $data['post']   = NULL;
        $data['action'] = 'create';
        $data['flash']  = '';
        $this->_render('admin/posts/form', $data);
    }

    public function store() {
        $this->_set_validation_rules();

        if (!$this->form_validation->run()) {
            $data['post']   = NULL;
            $data['action'] = 'create';
            $data['flash']  = validation_errors();
            $this->_render('admin/posts/form', $data);
            return;
        }

        $image_name = $this->_handle_upload();
        $slug       = $this->_make_slug($this->input->post('title'));

        $this->Post_model->create([
            'title'         => $this->input->post('title'),
            'slug'          => $slug,
            'description'   => $this->input->post('description'),
            'content'       => $this->input->post('content'),
            'author'        => $this->input->post('author'),
            'external_link' => $this->input->post('external_link'),
            'image'         => $image_name,
            'status'        => (int)$this->input->post('status'),
        ]);

        $this->session->set_flashdata('msg', 'Post created successfully!');
        redirect('admin/posts');
    }

    public function edit($id) {
        $post = $this->Post_model->get_by_id($id);
        if (!$post) show_404();
        $data['post']   = $post;
        $data['action'] = 'edit';
        $data['flash']  = '';
        $this->_render('admin/posts/form', $data);
    }

    public function update($id) {
        $post = $this->Post_model->get_by_id($id);
        if (!$post) show_404();

        $this->_set_validation_rules();

        if (!$this->form_validation->run()) {
            $data['post']   = $post;
            $data['action'] = 'edit';
            $data['flash']  = validation_errors();
            $this->_render('admin/posts/form', $data);
            return;
        }

        $update = [
            'title'         => $this->input->post('title'),
            'description'   => $this->input->post('description'),
            'content'       => $this->input->post('content'),
            'author'        => $this->input->post('author'),
            'external_link' => $this->input->post('external_link'),
            'status'        => (int)$this->input->post('status'),
        ];

        $new_image = $this->_handle_upload();
        if ($new_image) {
            if ($post['image']) {
                $old = FCPATH . $this->upload_path . $post['image'];
                if (file_exists($old)) @unlink($old);
            }
            $update['image'] = $new_image;
        }

        $this->Post_model->update($id, $update);
        $this->session->set_flashdata('msg', 'Post updated successfully!');
        redirect('admin/posts');
    }

    public function delete($id) {
        $this->Post_model->delete($id);
        $this->session->set_flashdata('msg', 'Post deleted.');
        redirect('admin/posts');
    }

    public function toggle($id) {
        $this->Post_model->toggle_status($id);
        redirect('admin/posts');
    }

    // ── Private helpers ──────────────────────────────────

    private function _require_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    private function _render($view, $data = []) {
        $this->load->view('admin/layouts/header', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/layouts/footer');
    }

    private function _set_validation_rules() {
        $this->form_validation->set_rules('title',       'Title',       'required|trim|max_length[255]');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('content',     'Content',     'required');
        $this->form_validation->set_rules('author',      'Author',      'required|trim|max_length[100]');
    }

    private function _handle_upload() {
        if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) return '';
        $config = [
            'upload_path'   => FCPATH . $this->upload_path,
            'allowed_types' => 'jpg|jpeg|png|gif|webp',
            'max_size'      => 5120,
            'encrypt_name'  => TRUE,
        ];
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }
        return '';
    }

    private function _make_slug($title) {
        $slug     = url_title(strtolower($title), '-', TRUE);
        $original = $slug;
        $i        = 1;
        while ($this->Post_model->slug_exists($slug)) {
            $slug = $original . '-' . $i++;
        }
        return $slug;
    }
}
