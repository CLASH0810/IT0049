<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = trim($this->request->getPost('username'));
            $password = $this->request->getPost('password');

            if ($username === '' || $password === '') {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Username and password are required.');
            }

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if (!$user || !password_verify($password, $user['password'])) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid username or password.');
            }

            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => true
            ]);

            return redirect()->to('/');
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}