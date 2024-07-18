<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user, $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->latest('id')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all()->groupBy('group');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $dataCreate = $request->all();
        $dataCreate['password'] = Hash::make($request->password);
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('image', $fileName, 'public');
        $dataCreate['image'] = '/storage/' . $path;
        $user = $this->user->create($dataCreate);
        $user->roles()->attach($dataCreate['role_ids']);
        return to_route('users.index')->with(['massage' => 'Thêm mới thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findOrFail($id)->load('roles');
        $roles = $this->role->all()->groupBy('group');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);
        $currentImage = $user->image;
        $dataUpdate = $request->except('password', 'image', 'role_ids');
        if ($request->password) {
            $dataUpdate['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($currentImage) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $currentImage));
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $dataUpdate['image'] = '/storage/' . $path;
        } else {
            $dataUpdate['image'] = $currentImage;
        }

        // Update the user with new data
        $user->update($dataUpdate);

        if ($request->has('role_ids')) {
            $user->roles()->sync($request->input('role_ids'));
        }

        return redirect()->route('users.index')->with(['message' => 'Chỉnh sửa thành công']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->findOrFail($id)->load('roles');
        $user->delete();

        return redirect()->route('users.index')->with(['message' => 'Xóa thành công']);
    }
}
