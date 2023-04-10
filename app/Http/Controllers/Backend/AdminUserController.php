<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\VprUser;
use Illuminate\Support\Carbon;
use App\Http\Requests\UserUpdateRequest;
use App\Models\VprContentPerson;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Gate;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('is_supperuser');
        $users = new VprUser();
        $users = $users->latest('date_joined')->paginate(10);

        $data['users'] = $users;
        return view('backend.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('create');
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // dd("store");
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'username' => 'required|unique:auth_user,username',
                'email' => 'required|email|unique:auth_user,email',
                'password' => 'required|min:6',
            ], 
            [
                'first_name.required' => 'Không được để trống họ',
                'last_name.required' => 'Không được để trống tên',
                'username.required' => 'Không được để trống tên đăng nhập',
                'username.unique' => 'tên đăng nhập đã tồn tại',
                'email.required' => 'Không được để trống email',
                'email.unique' => 'Email đã tồn tại',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Không được để trống mật khẩu',
                'password.min' => 'mật khẩu cần ít nhất 6 ký tự',

            ]
          );

        $user = VprUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request['password']),
            'is_active' => $request->is_active,
            'is_staff' => $request->is_staff,
            'is_superuser' => $request->is_superuser,
            'last_login' => '2022-1-1 00:00:00',
            'date_joined' => Carbon::now(),
        ]);
        // dd($user);

        if ($user) {
            $user_author = VprContentPerson::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'fullname' => $request->last_name.' '.$request->first_name,
                'email' => $request->email,
                'user_id' => $request->username,
                'password' => Hash::make($request['password']),
            ]);
            $message = $request->validate;
            return redirect($message)->route('user.index')->with('success', 'Thêm người dùng mới thành công.');
        }else{
            return redirect()->back()->with('error', 'Xảy ra lỗi khi thêm người dùng.');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = VprUser::where('id', $id)->first();
        return view('backend.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

        $user = VprUser::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request['password']);
        }else{
            unset($user->password);
        }
        $user->is_staff = $request->is_staff;
        $user->is_active = $request->is_active;
        $user->is_superuser = $request->is_superuser;

        if (!$user->save()) {
            return redirect()->back()->with('error', 'update không thành công.');
        }
        return redirect()->route('user.index')->with('success', 'Cập nhật thông tin tài liệu thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = VprUser::find($id);
        $user->delete();

        return response('Xóa bản ghi thành công.', 200);
    }
}
