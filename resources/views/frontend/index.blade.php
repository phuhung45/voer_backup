@extends('welcome')
@section('title', 'Trang chủ')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    
</body>
</html>
    <div class="container">
        <!-- LIST MODULE MAINPAGE -->
        <h5 class="home-section-heading">
            <p>{!! trans('lang.featured_materials') !!}</p>
            <hr style="border: 1px solid; border-radius: 5px; color:#ce204e; width:6%; margin-left: 1px">
        </h5>
        <div class="list-collection-mainpage row">
            @foreach ($material_top as $material_top_detail)
                <div class="col-xs-6 col-sm-4 col-md-4">
                    <div class="collection-mainpage-cover">
                        <a href="{{ route('slug', ['material_type' => 'c', 'slug' => $material_top_detail->slug(), 'material_id' => $material_top_detail->material_id]) }}"
                            title="{{ $material_top_detail->title }}">
                            @if (!empty($material_top_detail->fileRandImage()))
                                <img src="/images/contents/{{ $material_top_detail['material_id'] }}.jpg"
                                    alt="{{ $material_top_detail->title }}" />
                            @else
                                <img src="/images/contents/default_image_where_null_data"
                                    alt="{{ $material_top_detail->title }}" />
                            @endif
                        </a>
                    </div>
                    <div class="collection-mainpage-details clearfix">
                        <div class="content-collection">
                            <div class="category">
                                @foreach ($name_arr as $name)
                                    @if ($name[0]['material_id'] === $material_top_detail->id)
                                        <p>{{ $name[0]['name'] }}</p>
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="title-collection title--collection">
                            <a href='{{ route('slug', ['material_type' => 'c', 'slug' => $material_top_detail->slug(), 'material_id' => $material_top_detail->material_id]) }}'
                                title="{{ $material_top_detail->title }}">{{ $material_top_detail->title }}</a>
                        </div>
                        <div class="descr" style="height: 50px">
                            <p>{!! $material_top_detail->description !!}</p>
                        </div>
                        <hr>
                        <div class="author-collection" style="margin-top:auto">
                            <div class="avatar">
                                <img src="/images/authors/author1_detail.jpg" alt="Avatar" class="avatar" />
                            </div>
                            @foreach ($author as $item)
                                <a href="{{ route('profile', ['id' => $item['0']->id]) }}"
                                    title="{{ $item[0]->fullname }}">
                                    @if ($item[0]->material_rid === $material_top_detail->id)
                                        {{ $item[0]->fullname }}
                                    @endif
                                </a>
                            @endforeach
                            <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10"
                                href="{{ route('slug', ['material_type' => $material_top_detail->material_type, 'slug' => $material_top_detail->slug(), 'material_id' => $material_top_detail->material_id]) }}">{!! trans('lang.read') !!}</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- LIST MODULE MAINPAGE -->
    <!-- BROWSER -->
    <div class="home-browse clearfix">
        <a class="btn-browser-all left clear" href="/browse" title="Tra cứu Tài liệu">
            {!! trans('lang.browses') !!}
        </a>
    </div>
    <div class="mainpage-browser-content">
        <h5 class="home-section-heading">
            <p>{!! trans('lang.featured_authors') !!}</p>
            <hr style="border: 1px solid; border-radius: 5px; color:#ce204e; width:6%; margin-left: 1px">
        </h5>
        <div class="list-mainpage-browser list-author-mainpage row">
            @foreach ($author_top as $item)
                <div class="col-xs-4 col-sm-3 col-md-2">
                    <div class="browser-author-img">
                        <a href="{{ route('profile', ['id' => $item['id']]) }}" title="{{ $item->title }}">
                            <img src="/images/authors/{{ $item['id'] }}.jpg" />
                        </a>
                    </div>
                    <div class="browser-author-details">
                        <div class="icon-browser-author"></div>
                        <div class="browser-author-name">
                            <a href="{{ route('profile', ['id' => $item['id']]) }}" title="{{ $item->fullname }}">
                                {{ $item->fullname }} </a>
                        </div>
                        <div class="browser-author-add" style="height:50px"> {{ $item->affiliation }}
                        </div>
                    </div>
                    <hr style="width:100%; border:1px solid; color: #ce204e; border-radius: 5px;">
                </div>
            @endforeach
        </div>
    </div>
    <!-- END BROWSER -->
@endsection
