@foreach($browses as $browse)

<?php
    if($browse->material_type == 1){
        $browse->material_type = "m";
    }else{
        $browse->material_type = "c";
    }
    ?>

<div class="material-list-entry clearfix">

    <div class="material-cover-wrapper left">
        <div class="material-cover left">
            <a title="" alt=""
                href="{{route('slug',['material_type' => $browse->material_type,'slug' =>Str::slug($browse->title), 'material_id' => $browse->material_id])}}">
                @if (!empty($browse->image))
                <img src="images/{{ $browse->image }}" alt="{{ $browse->title }}">
                @else
                <img src="images/thumb/ebc61d79899d290aacd70cf04f945622.jpg">
                @endif
            </a>
        </div>

        <div class="material-tiny-icon">
            <img src="images/icon-puzzle-24.png">
        </div>
    </div>
    <div class="material-brief left">

        <h5 class="module-title">
            <a title="{{ $browse->title }}" alt="{{ $browse->title }}"
                href="{{route('slug',['material_type' => $browse->material_type,'slug' =>Str::slug($browse->title), 'material_id' => $browse->material_id])}}">
                {{$browse->title}} </a>
        </h5>
        <p>{{$browse->description}}</p>
        <div class="brief-published">


            <a href="javascript:void(0)" title="Lượt xem">
                <i class="icon icon-view"></i>
                <span class="stats-count">705</span>
            </a>


            <!--
            <a href="javascript:void(0)">
                <i class="icon icon-favorite "  data-material-id="bdccc437" data-material-version="1" title="Thêm vào tài liệu yêu thích"></i>
                <span class="stats-count" title="Lượt ưa thích">0</span>
            </a>
         -->


            <a title="Ngày tải lên">{{$browse->modified}}</a>

        </div>


    </div>
</div>

@endforeach

{{ $browses->appends(request()->query())->links("pagination::bootstrap-4") }}