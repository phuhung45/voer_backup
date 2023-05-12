@extends('welcome')
@section('title', 'Viết giáo trình')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- Main content -->
<style>
    .input_authors {
        display: none;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <!-- /.card -->
            <div class="card">
                {{-- <div class="card-header">
                    <h1 class="card-title" style="padding-left: 2%; padding-top: 85px; ">Thêm Giáo trình mới
                    </h1>
                </div> --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="container">
                    <form id="form" action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data"
                        style="padding-left: 25px; padding-right: 25px;">
                        @csrf

                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="last_name" placeholder="nhập vào tiêu đề bài viết" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                id="description" placeholder="Mô tả bài viết">{!! old('description') !!}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group field_wrapper" id="navbar-search-input">

                            <label for="text">Thông tin giáo trình</label>
                            <br>
                            <div class="input-group">
                                <select id="select-state" class="form-select select-state" name="id[]"
                                    multiple>
                                    @foreach ($material as $item)
                                    <option class="input_material_id" name="id[]"
                                        value="{{ $item->material_id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Hình ảnh</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label" for="image">Tải lên hình ảnh giáo
                                        trình</label>
                                </div>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <?php
                                $categories = DB::table('vpr_content_category')
                                    ->select('id', 'name')
                                    ->get();
                                ?>

                            <div class="form-group">
                                <label for="categories">Danh mục bài viết</label>
                                <br>
                                @foreach ($categories as $category)
                                <input type="checkbox" name="categories[name][]" value="{{ $category->id }}">
                                {{ $category->name }}
                                @endforeach
                                @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="author">Tác giả</label>
                                <input type="number" name="author"
                                    class="form-control @error('author') is-invalid @enderror" id="author"
                                    placeholder="nhập vào id của tác giả" value="{{ auth('front')->user()->id }}"
                                    disabled>
                                @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="language">Ngôn ngữ</label>
                                <input type="text" name="language"
                                    class="form-control @error('language') is-invalid @enderror" id="language"
                                    placeholder="nhập vào ngôn ngữ bài viết" value="vi" disabled>
                                @error('language')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Thêm giáo trình</button>
                            <a href="{{ route('browse.index') }}"><button class="btn btn-danger btn-close"
                                    type="button">Hủy</button></a>
                            <br>
                            <br>
                    </form>
                </div>

            </div>
        </div>

        <!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
    <!-- /.col-md-6 -->
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function initSelect2(){
        let select2El = document.querySelectorAll('.select-state');
        for(let el of select2El){
            $(el).select2();
        }
    }
    var $example = $(".select-state").select2();
    var $exampleMulti = $(".select-state-multi").select2();

    $(".js-programmatic-set-val").on("click", function () {
        $example.val("CA").trigger("change");
    });

    $(".js-programmatic-open").on("click", function () {
        $example.select2("open");
    });

    $(".js-programmatic-close").on("click", function () {
        $example.select2("close");
    });

    $(".js-programmatic-init").on("click", function () {
        $example.select2();
    });

    $(".js-programmatic-destroy").on("click", function () {
        $example.select2("destroy");
    });
</script>

<script>
    $(document).on('click', '#btn-create', function() {
            var fieldsValues = [];
            var fieldsValuesChild = [];
            var arr = [];
            x = 1;
            y = 0;
            $(".material").each(function(index, field) {
                $(this).find(".mater-" + x).each(function(index, fieldChild) {
                    x++;
                    var fieldDataChild = {};
                    fieldDataChild['title-' + x] = $(fieldChild).find('input[type=radio]:checked')
                        .val();
                    fieldsValuesChild.push(fieldDataChild);
                });
                var fieldData = {};
                fieldData['lisense'] = $(field).find('.input_lisense').val();
                fieldData['url'] = $(field).find('.input_url').val();
                fieldData['version'] = $(field).find('.input_version').val();
                fieldData['authors'] = $(field).find('.input_authors').val();
                fieldData['type'] = $(field).find('.input_type').val();
                fieldData['title'] = fieldsValuesChild[y];
                y++;
                fieldsValues.push(fieldData);
            });
            console.log(fieldsValues);
        });
</script>

@endsection