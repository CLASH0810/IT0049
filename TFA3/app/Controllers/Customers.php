<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $customers = $customerModel->findAll();

        return view('customers/index', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        $customerModel = new CustomerModel();

        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();

            $rules = [
                'full_name' => 'required|max_length[100]',
                'email'     => 'required|valid_email|max_length[100]',
                'phone'     => 'permit_empty|max_length[20]',
            ];

            if (!$this->validateData($data, $rules)) {
                return view('customers/new', [
                    'validation' => $this->validator,
                    'customer'   => $data,
                ]);
            }

            $customerModel->insert([
                'full_name'  => $data['full_name'],
                'email'      => $data['email'],
                'phone'      => $data['phone'] ?? null,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/customers');
        }

        return view('customers/new', [
            'validation' => null,
            'customer'   => [],
        ]);
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();

        $customer = $customerModel->find($id);

        if (!$customer) {
            throw PageNotFoundException::forPageNotFound(
                'Customer not found'
            );
        }

        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();

            $rules = [
                'full_name' => 'required|max_length[100]',
                'email'     => 'required|valid_email|max_length[100]',
                'phone'     => 'permit_empty|max_length[20]',
            ];

            if (!$this->validateData($data, $rules)) {
                return view('customers/edit', [
                    'validation' => $this->validator,
                    'customer'   => array_merge($customer, $data),
                ]);
            }

            $customerModel->update($id, [
                'full_name' => $data['full_name'],
                'email'     => $data['email'],
                'phone'     => $data['phone'] ?? null,
            ]);

            return redirect()->to('/customers');
        }

        return view('customers/edit', [
            'validation' => null,
            'customer'   => $customer,
        ]);
    }
}