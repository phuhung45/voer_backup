<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\VprUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:auth_user'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:auth_user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required'],
            'last_name' => ['required'],
        ],
        [
            'username.required' => 'Vui lòng điền tên đăng nhập của bạn',
            'username.string' => 'Tên đăng nhập phải là chuỗi ký tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại, vui lòng chọn tên đăng nhập khác',
            'email.required' => 'Vui lòng điền email của bạn',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại, vui lòng dùng email khác',
            'password.required' => 'Vui lòng điền mật khẩu của bạn',
            'password.min' => 'Mật khẩu ít nhất 8 ký tự, vui lòng nhập lại',
            'password.string' => 'Mật khẩu không phù hợp, vui lòng nhập lại',
            'password.confirmed' => 'Mật khẩu nhập lại không chính xác',
            'first_name.required' => 'Vui lòng điền họ của bạn',
            'last_name.required' => 'Vui lòng điền tên của bạn'
        ]
    );

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return VprUser::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'email' => $data['email'],
            'is_active' => $data['is_active'],
            'is_staff' => $data['is_staff'],
            'is_superuser' => $data['is_superuser'],
            'last_login' => '2022-01-01 00:00:00',
            'date_joined' => Carbon::now(),
        ]);
    }
}
