@extends('welcome')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- Main content -->
<style>
    .input_authors{
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
                                <input type="hidden" class="input_lisence" name="content[0][lisence]"
                                    value="http://creativecommons.org/licenses/by/3.0/">
                                <input type="hidden" id="input_title" class="input_title" name="content[0][title]"
                                    value="">
                                <input type="hidden" class="input_url" name="content[0][url]"
                                    value="http://www.voer.edu.vn/m/">
                                <input type="hidden" class="input_version" name="content[0][version]" value="1">
                                <input type="hidden" class="input_authors" name="content[0][authors][]"
                                    value="{{ $author[0]->fullname }}" placeholder="Your author">
                                <input type="text" id="input_author" class="input_authors" name="content[0][authors]"
                                    value="{{ $author[0]->fullname }}" placeholder="Your author" disabled>

                                <input type="hidden" class="input_type" name="content[0][type]" value="module"
                                    placeholder="Your id">
                                <br>
                                <select id="select-state-0" class="form-select select-state" name="content[0][id]">
                                    @foreach ($material as $item)
                                    <option class="input_material_id" name="content[0][id]"
                                        value="{{ $item->material_id }}" class="input_material_id" name="content[0][id]"
                                        value="{{ $item->material_id }}" onclick="handle(0)">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="radio" class="input_material_id" name="content[0][id]"
                                    value="{{ $item->material_id }}" placeholder="Your id" onclick="handle(0)">
                                <p style="margin-left: 25px; margin-top: -21px;">{{ $item->title }}</p> --}}
                            </div>

                            <button type="button" data-number="0" class="add_field">Thêm tài liệu</button>
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
    initSelect2();
//     $("#select-state-0").select2({
//   maximumSelectionLength: 30
// });
    $(document).on('click', '.add_field', function() {
            const number = Number($(this).data('number')) + 1
            const html = `
            <hr style="height: 2px; background:black; margin-bottom:-40px;">
            <br>
            <div class="input-group">
                <input type="hidden" class="input_lisence" name="content[` + number + `][lisence]"
                    value="http://creativecommons.org/licenses/by/3.0/">
                    
                <input type="hidden" id="input_title" class="input_title" name="content[` + number + `][title]"
                    value="">
                <input type="hidden" class="input_url" name="content[` + number + `][url]"
                    value="http://www.voer.edu.vn/m/">
                <input type="hidden" class="input_version" name="content[` + number + `][version]"
                    value="1">
                <input type="hidden" class="input_authors" name="content[` + number + `][authors][]"
                    value="{{ $author[0]->fullname }}" placeholder="Your author">
                <input type="text" class="input_authors" name="content[` + number + `][authors]"
                    value="{{ $author[0]->fullname }}" placeholder="Your author" disabled>
                <input type="hidden" class="input_type" name="content[` + number + `][type]"
                    value="module" placeholder="Your id">
                    <br>
                    <br>
                    <select id="select-state-${number}" class="form-select select-state" name="content[` + number + `][id]">
                                    @foreach ($material as $item)
        
                            <option class="input_material_id" name="content[` + number + `][id]"
                            value="{{ $item->material_id }}"
                            onclick="handle(
                            ` +
                            number +
                            `)"
                        >{{ $item->title }}</option>
                                    @endforeach
                                    </select>
                </div>
            `;
            $(html).insertAfter('.input-group:last');
            $(this).data('number', number);
            initSelect2();
            handleSelect.listener(`#select-state-${number}`)
        })
        let handleSelect = function(){
            let listener = function(el){
                $(el).on('change',function(e) {
                    init(this);
                })
            }
            let init = function(e){
                const _this = $(e);
                let value = _this.find(':selected').text();
                $(_this.closest('div.input-group')).find('input.input_title').val(value);
            }

            return {
                init: (el) => {
                    init(el);
                },
                listener: (el) => {
                    listener(el);
                },
                firstInit: (el) => {
                    init(el);
                    listener(el);
                }
            }
        }()
        // init
        handleSelect.firstInit(`#select-state-0`);
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