<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\HTTP\Services\User\UserService;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  protected $userService;
  /**
   * Display a listing of the resource.
   */
  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  public function index()
  {
    return view('admin.user.list', [
      'title' => 'Danh Sách nhân viên',
      'users' => $this->userService->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $usertypes = UserType::all();
    return view('admin.user.add', [
      'title' => 'Thêm nhân viên mới',
      'usertypes' => $usertypes,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(UserRequest $request)
  {
    $this->userService->create($request);

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    $usertypes = UserType::all();
    return view('admin.user.edit', [
      'title' => 'Chỉnh Sửa nhân viên: ' . $user->name,
      'user' => $user,
      'usertypes' => $usertypes,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function showProfile()
  {
    $user = Auth::user();
    return view('admin.main', ['user' => $user]);
  }

  public function showInfo()
  {
    $user = Auth::user();
    $userTypes = UserType::all();
    return view('admin.info.detail',[
      'title' => 'Thông tin người dùng đăng nhập',
    ], compact('user', 'userTypes'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(User $user, UserRequest $request)
  {
    $this->userService->update($request, $user);
    return redirect('/admin/users/list');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request): JsonResponse
  {
    $result = $this->userService->destroy($request);
    if ($result) {
      return response()->json([
        'error' => false,
        'message' => 'Xóa thành công nhân viên'
      ]);
    }

    return response()->json([
      'error' => true
    ]);
  }
}
