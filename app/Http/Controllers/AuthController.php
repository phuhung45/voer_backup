<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VprContentPerson;
use App\Models\VprUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Http\Requests\AuthorUserUpdateRequest;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:vpr_content_person,user_id',
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'fullname' => 'nullable',
                'first_name' => 'nullable',
                'last_name' => 'nullable',
                'email' => 'nullable|email',

            ], 
            [
                'username.required' => 'Không được để trống ID đăng nhập',
                'username.unique' => 'ID đăng nhập đã tồn tại, vui lòng kiểm trả lại',
                'password.required' => 'Không được để trống Mật khẩu',
                'password.confirmed' => 'Mật khẩu nhập lại không chính xác',
                'password.min' => 'Mật khẩu ít nhất gồm 6 ký tự',
                'password.string' => 'Mật khẩu không phù hợp, vui lòng nhập lại',
                'email.email' => 'Email không đúng định dạng',
            ]
          );
          $user_home = VprContentPerson::create([
                'user_id' => $request->username,
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => Hash::make($request['password']),
                'fullname' => $request->last_name.' '.$request->first_name,
          ]);
          if ($user_home) {
            $message = $request->validate;
            return redirect($message)->route('home')->with('success', 'Thêm người dùng mới thành công.');
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
        
        $user_info = VprContentPerson::where('id', '=', $id)->first();
        $data['user_info'] = $user_info; 
        // dd(asset('images/authors/authors/sTNztdH4jvMLa4IlyRg78aWO5k6JlQ633YPze6rr.png'));
        return view('user.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_info = VprContentPerson::where('id', '=', $id)->first();
        return view('user.edit',['user_info'=>$user_info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUserUpdateRequest $request, $id){
        $user_info = VprContentPerson::find($id);
        $user_info->fullname = $request->last_name .' '.$request->first_name;
        $user_info->email = $request->email;
        $user_info->last_name = $request->last_name;
        $user_info->first_name = $request->first_name;
        $user_info->homepage = $request->homepage;
        // if(!empty($request->password)){
        //     $user_info->password = Hash::make($request['password']);
        // }else{
        //     unset($user_info->password);
        // }
        $user_info->title = $request->title;
        $user_info->affiliation = $request->affiliation;
        $user_info->affiliation_url = $request->affiliation_url;
        $user_info->national = $request->national;
        $user_info->biography = $request->biography;
        $user_info->client_id = '0';

        if ($request->hasFile('avatar')) {
            // Delete old image
            if ($user_info->avatar) {
                // $user_info->avatar nó mởi chỉ trỏ vào author thôi 
                Storage::disk('public')->delete($user_info->avatar);
            }
            // Store image -> store where ?
            $image_path = $request->file('avatar')->store('authors', 'public');
            // Save to Database
            $user_info->avatar = $image_path;
        }
        if (!$user_info->save()) {
            return redirect()->back()->with('error', 'update không thành công.');
        }
        return redirect()->route('register.show', ['id' => auth('front')->user()->id])->with('success', 'Cập nhật thông tin tài khoản thành công.');
    }
    public function write($id){
        return view('browse.create');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
