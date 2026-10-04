<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required|max_length[50]',
                'password' => 'required',
            ];

            if (!$this->validateData($this->request->getPost(), $rules)) {
                return view('login', ['validation' => $this->validator]);
            }

            $userModel = new UserModel();
            $user = $userModel->where('username', $this->request->getPost('username'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                session()->regenerate(true);
                session()->set([
                    'user_id'      => $user['id'],
                    'username'     => $user['username'],
                    'full_name'    => $user['full_name'],
                    'isLoggedIn'   => true,
                ]);

                return redirect()->to('/customers');
            }

            return view('login', [
                'validation' => null,
                'error'      => 'Invalid username or password.',
            ]);
        }

        return view('login', [
            'validation' => null,
            'error'      => null,
        ]);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
    
    
}
