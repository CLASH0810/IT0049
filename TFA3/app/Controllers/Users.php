<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $users = $userModel->findAll();

        return view('users/index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $userModel = new UserModel();

        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();

            $rules = [
                'username'  => 'required|max_length[50]|is_unique[users.username]',
                'full_name' => 'required|max_length[100]',
            ];

            if (!$this->validateData($data, $rules)) {
                return view('users/new', [
                    'validation' => $this->validator,
                    'user'       => $data,
                ]);
            }

            $userModel->insert([
                'username'   => $data['username'],
                'full_name'  => $data['full_name'],
                'created_at' => date('Y-m-d H:i:s'),
                'avatar'     => null,
            ]);

            return redirect()->to('/users');
        }

        return view('users/new', [
            'validation' => null,
            'user'       => [],
        ]);
    }

    public function edit($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if (!$user) {
            throw PageNotFoundException::forPageNotFound(
                'User not found'
            );
        }

        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();
            $data['id'] = $id;

            $rules = [
                'id'        => 'required|is_natural_no_zero',
                'username'  => "required|max_length[50]|is_unique[users.username,id,{$id}]",
                'full_name' => 'required|max_length[100]',
            ];

            if (!$this->validateData($data, $rules)) {
                return view('users/edit', [
                    'validation' => $this->validator,
                    'user'       => array_merge($user, $data),
                ]);
            }

            $updateData = [
                'username'  => $data['username'],
                'full_name' => $data['full_name'],
            ];

            $avatar = $this->request->getFile('avatar');

            if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
                $fileRules = [
                    'avatar' => [
                        'is_image[avatar]',
                        'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                        'max_size[avatar,2048]',
                    ],
                ];

                if (!$this->validateData([], $fileRules)) {
                    return view('users/edit', [
                        'validation' => $this->validator,
                        'user'       => array_merge($user, $data),
                    ]);
                }

                $uploadPath = FCPATH . 'uploads/avatars';

                $newName = $avatar->getRandomName();

                $avatar->move($uploadPath, $newName);

                service('image')
                    ->withFile($uploadPath . DIRECTORY_SEPARATOR . $newName)
                    ->fit(200, 200, 'center')
                    ->save($uploadPath . DIRECTORY_SEPARATOR . $newName);

                if (!empty($user['avatar'])) {
                    $oldAvatar = $uploadPath . DIRECTORY_SEPARATOR . $user['avatar'];

                    if (is_file($oldAvatar)) {
                        unlink($oldAvatar);
                    }
                }

                $updateData['avatar'] = $newName;
            }

            $userModel->update($id, $updateData);

            return redirect()->to('/users');
        }

        return view('users/edit', [
            'validation' => null,
            'user'       => $user,
        ]);
    }
}