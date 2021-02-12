@extends('master');
@section('content')
<div class="custom-product">

    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2>Cart List</h2>
            <a class="btn btn-success" href="/ordernow">Ordernow</a> <br><br>
            @foreach ($products as $item)
            <div class="search-item row cartlist-devider">
                <div class="col-sm-3">
                    <a href="{{url('product/'.$item->id)}}">
                        <img src="{{$item->gallery}}" class="trending-img">
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="{{url('product/'.$item->id)}}">
                        <div class="">
                            <h2>{{$item->name}}</h2>
                            <h5>{{$item->desc}}</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove From Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

