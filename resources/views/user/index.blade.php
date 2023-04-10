@include('layouts.includes.navBar')
{{-- <link href="../frontend/css/bootstrap.css" rel="stylesheet">
<link href="../frontend/css/templates.css" rel="stylesheet">
<link href="../frontend/css/slide.css" rel="stylesheet">
<link href="../frontend/css/scrollbar.css" rel="stylesheet">
<link href="../frontend/css/common.css" rel="stylesheet">
<link href="../frontend/css/flat-ui.css" rel="stylesheet">
<link href="../frontend/fonts/font.css" rel="stylesheet">
<link href="../frontend/css/responsive.css" rel="stylesheet">
<link href="../frontend/css/display-mathml.css" rel="stylesheet">
<link href="../frontend/css/jquery/jRating/jRating.jquery.css" rel="stylesheet">
<link href="../frontend/css/style.css" rel="stylesheet">

<script type="text/javascript" src="/frontend/js/jquery.js"></script>
	<script type="text/javascript" src="/frontend/js/bootstrap.js"></script>
	<script type="text/javascript" src="/frontend/js/bootstrap-select.js"></script>
	<script type="text/javascript" src="/frontend/js/flatui-checkbox.js"></script>
	<script type="text/javascript" src="/frontend/js/common.js"></script>
	<script type="text/javascript" src="/frontend/js/application.js"></script>
	<script type="text/javascript" src="/frontend/js/display-mathml.js"></script>
    <script type="text/javascript" src="/frontend/js/scrollbar.js"></script>
    <script type="text/javascript" src="/frontend/js/jRating.jquery.min.js"></script>
    <script type="text/javascript" src="/frontend/js/voer.js"></script>
    <script type="text/javascript" src="/frontend/js/voer.materials.js"></script>
    <script type="text/javascript" src="/frontend/js/voer.search.js"></script>
    <script type="text/javascript" src="/frontend/js/jquery.bootstrap-growl.js"></script> --}}

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
            <td><a href="{{ route('register.edit', $user_info) }}" class="btn btn-primary"><i
                class="fas fa-edit"></i></a></td>
        </tr>
    </tbody>
</table>
