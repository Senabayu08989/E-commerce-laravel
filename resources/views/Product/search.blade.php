@extends('master');
@section('content')
<div class="custom-product">
    <div class="col-sm-4">
        <a href="#">Filter</a>
    </div>
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h2>Search</h2>
            @foreach ($data as $item)
            <div class="search-item">
                <a href="{{url('product/'.$item->id)}}">
                    <img src="{{$item->gallery}}" class="trending-img">
                    <div class="">
                        <h2>{{$item->name}}</h2>
                        <h5>{{$item->desc}}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

