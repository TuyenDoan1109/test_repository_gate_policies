<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Web\User\CreateuserRequest;
use App\Http\Requests\Web\User\UpdateuserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->middleware('auth:admin');
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAllWithPaginate();
//        return $users;
        return view('admin.users.index', compact('users'));
    }

    public function indexWithDeleted() {
        $users = $this->userRepository->getAllWithDeleted();
        return view('user.users.indexWithDeleted', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];
        $user = $this->userRepository->create($data);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Thêm mới thát bại');
        }
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
        $user = $this->userRepository->getById($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];
        $user = $this->userRepository->update($id, $data);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Update thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Update thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->delete($id);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

    public function forceDelete($id) {
        $user = $this->userRepository->deleteForever($id);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Forever Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Forever Delete thất bại');
        }
    }

    public function restore($id) {
        $user = $this->userRepository->restoreDeleted($id);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

}
