@extends('master');
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{$data->gallery}}" class="detail-img">
        </div>
        <div class="col-sm-6" >
            <a href="{{url('product')}}">Back</a>
            <h2>{{$data->name}}</h2>
            <br>
            <h3>Harga           : RP {{$data->price}}</h3>
            <h4>Deskripsi       : {{$data->desc}}</h4>
            <h4>Category        : {{$data->category}}</h4>
            <br>
            <button class="btn btn-primary">Add to Chart</button>
            <button class="btn btn-success">Buy Now</button>
            <br><br>
        </div>
    </div>
</div>

@endsection

