@extends('layouts.includes.navBar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin người dùng</title>
</head>
<style>
    .btn-primary{
        margin-left: 0px !important;
    }
</style>
<body>
<h2 style="margin-top: 150px">Thông tin người dùng</h2>

<table class="table table-striped table-valign-middle" style="margin-top: 20px; border:1px solid">
    <thead>
        <tr>
            <th>Tên đăng nhập</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Title</th>
            <th>Liên kết</th>
            <th>Trang chủ</th>
            <th>Quốc tịch</th>
            <th>Tiểu sử</th>
            <th>Avatar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user_info->user_id }}</td>
            <td>{{ $user_info->fullname }}</td>
            <td>{{ $user_info->email }}</td>
            <td>{{ $user_info->last_name }}</td>
            <td>{{ $user_info->first_name }}</td>
            <td>{{ $user_info->title }}</td>
            <td>{{ $user_info->affiliation }}</td>
            <td>{{ $user_info->homepage }}</td>
            <td>{{ $user_info->national }}</td>
            <td>{{ $user_info->biography }}</td>
            <td><img class="user-avatar" src="{{ asset('images/' .$user_info->avatar) }}" alt=""></td>
            <td>
                <a href="{{ route('register.edit', $user_info) }}" class="btn btn-primary"><i
                class="fas fa-edit"></i></a>
                <a href="{{ route('change-password', $user_info) }}" class="btn btn-success"><i class="fa-solid fa-key"></i></a>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>