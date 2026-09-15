<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Andi Pratama',
            'nim' => '2301001',
            'email' => 'andi@gmail.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Surabaya',
            'status' => 'Aktif',
        ],
        [
            'id' => 2,
            'nama' => 'Budi Santoso',
            'nim' => '2301002',
            'email' => 'budi@gmail.com',
            'nomor_telepon' => '082345678901',
            'alamat' => 'Sidoarjo',
            'status' => 'Aktif',
        ],
        [
            'id' => 3,
            'nama' => 'Citra Lestari',
            'nim' => '2301003',
            'email' => 'citra@gmail.com',
            'nomor_telepon' => '083456789012',
            'alamat' => 'Gresik',
            'status' => 'Tidak Aktif',
        ]
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with(
                'success',
                "Member \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database)."
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}
