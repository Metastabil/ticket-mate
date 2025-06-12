<?php
namespace App\Controllers;

use JetBrains\PhpStorm\NoReturn;
use App\Models\UserModel;

/**
 * @author Julius Derigs
 * @version 1.0.0
 */

class Users extends BaseController {
    /**
     * @var UserModel
     */
    private UserModel $user_model;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();

        $this->user_model = new UserModel();
    }

    /**
     * @return void
     */
    public function index() :void {
        $data = [
            'title' => LANG['users']['titles']['index'],
            'elements' => $this->user_model->select()
        ];

        $this->view->render('templates/header', $data)
                   ->render('users/index', $data)
                   ->render('templates/footer');
    }

    /**
     * @return void
     */
    public function create() :void {
        $data = [
            'title' => LANG['users']['titles']['create']
        ];

        $required_fields = [
            'first-name',
            'last-name',
            'email',
            'password'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $input = [
                'first_name' => esc(get_input('first-name')),
                'last_name' => esc(get_input('last-name')),
                'email' => esc(get_input('email')),
                'phone' => esc(get_input('phone')),
                'mobile' => esc(get_input('mobile')),
                'password' => password_hash(get_input('password'), PASSWORD_DEFAULT),
                'administrator' => (int)(bool)get_input('administrator')
            ];

            if ($this->user_model->insert($input)) {
                set_message('success', LANG['messages']['success']['saved']);
            }
            else {
                set_message('error', LANG['messages']['error']['saved']);
            }

            redirect(base_url('users'));
        }

        $this->view->render('templates/header', $data)
                   ->render('users/create', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id) :void {
        $data = [
            'title' => LANG['users']['titles']['show'],
            'element' => $this->user_model->select($id)
        ];

        $this->view->render('templates/header', $data)
                   ->render('users/show', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    public function update(int $id) :void {
        $data = [
            'title' => LANG['users']['titles']['show'],
            'element' => $this->user_model->select($id)
        ];

        $required_fields = [
            'first-name',
            'last-name',
            'email'
        ];

        if (is_post() && check_required_fields($required_fields)) {
            $input = [
                'id' => $id,
                'first_name' => esc(get_input('first-name')),
                'last_name' => esc(get_input('last-name')),
                'email' => esc(get_input('email')),
                'phone' => esc(get_input('phone')),
                'mobile' => esc(get_input('mobile')),
                'administrator' => (int)(bool)get_input('administrator'),
                'deleted' => 0
            ];

            if (!empty(get_input('password'))) {
                $input['password'] = password_hash(get_input('password'), PASSWORD_DEFAULT);
            }
            else {
                $input['password'] = $data['element']['password'];
            }

            if ($this->user_model->update($input)) {
                set_message('success', LANG['messages']['success']['saved']);
            }
            else {
                set_message('error', LANG['messages']['error']['saved']);
            }

            redirect(base_url('users'));
        }

        $this->view->render('templates/header', $data)
                   ->render('users/update', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    #[NoReturn] public function delete(int $id) :void {
        $element = $this->user_model->select($id);
        $element['id'] = $id;
        $element['deleted'] = 1;

        if ($this->user_model->update($element)) {
            set_message('success', LANG['messages']['success']['deleted']);
        }
        else {
            set_message('error', LANG['messages']['error']['deleted']);
        }

        redirect(base_url('users'));
    }
}