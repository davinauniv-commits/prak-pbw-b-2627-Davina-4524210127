<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    // Menampilkan daftar mahasiswa
    public function index()
    {
        $data['mahasiswa'] = $this->mahasiswaModel->findAll();

        return view('mahasiswa/index', $data);
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa/create');
    }

    // Menyimpan data mahasiswa baru
    public function store()
    {
        $rules = [
            'nim' => [
                'rules' => 'required|min_length[5]|max_length[15]|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => 'NIM wajib diisi.',
                    'is_unique' => 'NIM sudah terdaftar.',
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama wajib diisi.',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[mahasiswa.email]',
                'errors' => [
                    'required' => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email sudah digunakan.',
                ]
            ],
            'no_hp' => 'required|max_length[15]',
            'prodi' => 'required|max_length[80]',
            'angkatan' => 'required|exact_length[4]|numeric',
            'ipk' => 'permit_empty|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
            'status_mahasiswa' => 'required|in_list[Aktif,Cuti,Lulus]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->mahasiswaModel->insert([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'prodi' => $this->request->getPost('prodi'),
            'angkatan' => $this->request->getPost('angkatan'),
            'ipk' => $this->request->getPost('ipk') ?: 0,
            'status_mahasiswa' => $this->request->getPost('status_mahasiswa'),
        ]);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan form edit mahasiswa
    public function edit($id)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);

        if (!$data['mahasiswa']) {
            return redirect()->to('/mahasiswa')
                ->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa/edit', $data);
    }

    // Memperbarui data mahasiswa
    public function update($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->to('/mahasiswa')
                ->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        $rules = [
            'nim' => "required|min_length[5]|max_length[15]|is_unique[mahasiswa.nim,id,{$id}]",
            'nama' => 'required|min_length[3]|max_length[100]',
            'email' => "required|valid_email|is_unique[mahasiswa.email,id,{$id}]",
            'no_hp' => 'required|max_length[15]',
            'prodi' => 'required|max_length[80]',
            'angkatan' => 'required|exact_length[4]|numeric',
            'ipk' => 'permit_empty|decimal|greater_than_equal_to[0]|less_than_equal_to[4]',
            'status_mahasiswa' => 'required|in_list[Aktif,Cuti,Lulus]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->mahasiswaModel->update($id, [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'prodi' => $this->request->getPost('prodi'),
            'angkatan' => $this->request->getPost('angkatan'),
            'ipk' => $this->request->getPost('ipk') ?: 0,
            'status_mahasiswa' => $this->request->getPost('status_mahasiswa'),
        ]);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }


        public function delete($id)
        {
            $mahasiswa = $this->mahasiswaModel->find($id);

            if (!$mahasiswa) {
                return redirect()->to('/mahasiswa')
                    ->with('error', 'Data mahasiswa tidak ditemukan.');
            }

            $this->mahasiswaModel->delete($id);

            return redirect()->to('/mahasiswa')
                ->with('success', 'Data mahasiswa berhasil dihapus.');
        }

}
