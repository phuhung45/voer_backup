@extends('layouts.includes.navBar')
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Thêm bài viết mới</title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

          <!-- Preloader -->
          <!-- Navbar -->
          <!-- /.navbar -->

          <!-- Content Wrapper. Contains page content -->
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">

                      <!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
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
                              <form id="form" action="{{ route('collection.store') }}" method="POST"
                                  enctype="multipart/form-data" style="padding-left: 25px; padding-right: 25px;">
                                  @csrf

                                  <div class="form-group">
                                      <label for="title">Tiêu đề</label>
                                      <input type="text" name="title"
                                          class="form-control @error('title') is-invalid @enderror" id="last_name"
                                          placeholder="nhập vào tiêu đề bài viết" value="{{ old('title') }}">
                                      @error('title')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>


                                  <div class="form-group">
                                      <label for="description">Mô tả</label>
                                      <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                          placeholder="Mô tả bài viết">{!! old('description') !!}</textarea>
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
                                          <input type="hidden" class="input_version" name="content[0][version]"
                                              value="1">
                                          <input type="hidden" class="input_authors" name="content[0][authors][]"
                                              value="{{ $author[0]->fullname }}" placeholder="Your author">
                                          <input type="text" id ="input_author" class="input_authors" name="content[0][authors]"
                                              value="{{ $author[0]->fullname }}" placeholder="Your author" disabled>
                                          <input type="hidden" class="input_type" name="content[0][type]"
                                              value="module" placeholder="Your id">
                                              <br>
                                          @foreach ($material as $item)
                                              <input type="radio" class="input_material_id" name="content[0][id]"
                                                  value="{{ $item->material_id }}"
                                                  placeholder="Your id"
                                                  onclick="handle(0)"
                                                  ><p style="margin-left: 25px; margin-top: -21px;">{{ $item->title }}</p>
                                          @endforeach
                                      </div>

                                      <button type="button" data-number="0" class="add_field">Thêm tài liệu</button>
                                      <div class="form-group">
                                          <label for="image">Hình ảnh</label>
                                          <div class="custom-file">
                                              <input type="file" class="custom-file-input" name="image"
                                                  id="image">
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
                                      $categories = DB::table('vpr_content_category')->select('id', 'name')->get()
                                      ?>
                                      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>
                                                    <div class="form-group">
                                                      <label for="categories">Danh mục bài viết</label>
                                                      <br>
                                                        @foreach ($categories as $category)
                                                        <input type="checkbox" name="categories[name][]" value="{{ $category->id }}"> {{ $category->name }}
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
                                              class="form-control @error('author') is-invalid @enderror"
                                              id="author" placeholder="nhập vào id của tác giả"
                                              value="{{ auth('front')->user()->id }}" disabled>
                                          @error('author')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>

                                      <div class="form-group">
                                          <label for="language">Ngôn ngữ</label>
                                          <input type="text" name="language"
                                              class="form-control @error('language') is-invalid @enderror"
                                              id="language" placeholder="nhập vào ngôn ngữ bài viết" value="vi"
                                              disabled>
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
          <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->

      <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
          $.widget.bridge('uibutton', $.ui.button)
      </script>



      <script>
          $(document).on('click', '.add_field', function() {
              const number = Number($(this).data('number')) + 1
              const html = `
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
              @foreach ($material as $item)
                
          <input type="radio" id="input_id" class="input_material_id" name="content[` + number + `][id]"
              value="{{ $item->material_id }}" placeholder="Your id"
              onclick="handle(
              `
              +number+
              `)"

              ><p style="margin-left: 25px; margin-top: -21px;">{{ $item->title }}</p>

              @endforeach
          </div>
      `;
              $(html).insertAfter('.input-group:last');
              $(this).data('number', number);
          })
      </script>

      <script>

        console.log("----");
        
        handle = (id) => {
        const rd = document.getElementsByName(`content[${id}][id]`)
          rd.forEach(element => {
          if (element.checked) {
            const inp = document.getElementsByName(`content[${id}][title]`)
            inp.forEach(it => {
              it.value = element.nextSibling.textContent
            })
            console.log(element.nextSibling.textContent);
          }

          
        });
        }
      </script>

<script>
    $(".multiple_select").mousedown(function(e) {
      if (e.target.tagName == "OPTION") 
      {
        return; //don't close dropdown if i select option
      }
      $(this).toggleClass('multiple_select_active'); //close dropdown if click inside <select> box
  });
  $(".multiple_select").on('blur', function(e) {
      $(this).removeClass('multiple_select_active'); //close dropdown if click outside <select>
  });
      
  $('.multiple_select option').mousedown(function(e) { //no ctrl to select multiple
      e.preventDefault(); 
      $(this).prop('selected', $(this).prop('selected') ? false : true); //set selected options on click
      $(this).parent().change(); //trigger change event
  });
  
      
      $("#myFilter").on('change', function() {
        var selected = $("#myFilter").val().toString(); //here I get all options and convert to string
        var document_style = document.documentElement.style;
        if(selected !== "")
          document_style.setProperty('--text', "'Selected: "+selected+"'");
        else
          document_style.setProperty('--text', "'Select values'");
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
      <script src="{{ asset('js/addColumn.js') }}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <!-- ChartJS -->
      <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
      <!-- Sparkline -->
      <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
      <!-- JQVMap -->
      <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
      <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
      <!-- daterangepicker -->
      <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
      <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
      <!-- Summernote -->
      <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
      <!-- overlayScrollbars -->
      <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('dist/js/adminlte.js') }}"></script>
      <!-- AdminLTE for demo purposes -->
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  </body>

  </html>
