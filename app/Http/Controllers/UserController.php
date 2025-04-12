<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
  public function index()
  {
    $users = User::all();
    return view('pages/users/index', compact('users'));
  }

  public function create()
  {
    return view('pages/users/create');
  }

  public function show($id)
  {
    $user = User::find($id);
    return view('pages/users/show', compact('user'));
  }

  public function store()
  {
    User::create([
      'name' => $_POST['name'] ?? '',
      'email' => $_POST['email'] ?? ''
    ]);

    return redirect()->to('/users')->withSuccess(['User created!']);
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('pages/users/edit', compact('user'));
  }

  public function update($id)
  {
    User::update($id, [
      'name' => $_POST['name'] ?? '',
      'email' => $_POST['email'] ?? ''
    ]);

    return redirect()->to('/users')->withSuccess(['User updated!']);
  }

  public function destroy($id)
  {
    User::delete($id);
    return redirect()->to('/users')->withSuccess(['User deleted!']);
  }
}
