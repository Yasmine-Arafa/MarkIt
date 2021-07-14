@extends('layouts.master')
@section('content')
<div id="" class=" pt-2">
    {{--
    <ul class="breadcrumb">
        <li>
            <h4 class="pull-right text-dark"> {{count($products)}} products are available </h4>
        </li>
    </ul>
    --}}
	<hr class="soft mt-0"/>

    {{--If message assesst--}}
    @isset($mssg)
        <div class=" mx-auto w-75 h-75">
            <h1 class="text-center text-danger">{{$mssg}}</h1> 
        </div>   
    @else
<div class="flyout p-2 " style=" background-color: #fff;  min-height: 384px;" >

        <!-------------- Start Block View  ------------------------->
                <div class="row">


                    @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-2">

                        <!-- product card -->
                        <a href="{{ route('products.show',['product'=>$product->id])}}" class="text-decoration-none text-dark">

                        <div class="m-auto" style="height:auto; width: 100%; box-shadow: 1px 1px 5px 1px rgb(0 0 0 / 10%);">

                                <div class="container p-0 m-auto w-100 h-100">

                                        <div class="pb-1 pt-3 pr-3 pl-3 w-100 m-auto row"    >
                                            <img src="/storage/images/{{$product->product_image}}" style="height:220px; width: 220px;" class="m-auto d-block" alt="No Available Image">
                                        </div>

                                        <div class="w-100 p-2 text-center mx-auto row">
                                            <a class="text-decoration-none pb-1 text-dark col-12" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ; " href="{{ route('products.show',['product'=>$product->id])}}">{{ \Illuminate\Support\Str::limit($product->name, 20, $end='...') }}</a>

                                            <a class="text-decoration-none text-secondary col-12" href="{{ route('cat',['cat'=>$product->cat])}}" ><h6 class="small" >{{$product->cat}}</h6></a>
                                            <h6 style="font-size: 14px; font-weight: bold;" class="text-danger mx-auto col-12">{{$product->price}} EGP</h6>
                                            <h6 class=" text-dark col-12" >Rating</h6>
                                        </div>


                                        @if(!Auth::guest())

                                                <div class="h-auto pb-3 pr-3 pl-3">
                                                    {!! Form::open(['action' => 'CartController@store' ,'method'=> 'POST']) !!}

                                                        {!! Form::hidden('item_id', $product->id, ['class'=>'form-control']) !!}
                                                        {!! Form::hidden('user_id', $user_id = Auth()->user()->id, ['class'=>'form-control'])!!}

                                                        {{Form::button('Add To Cart   <i class="fas fa-shopping-cart pl-0 "></i>',['type'=>'submit','class'=> 'btn btn-primary w-100 inline'])}}

                                                    {!!Form::close()!!}
                                                </div>

                                        @endif

                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach

                </div>
        <!-------------- End Block View  ------------------------->
			<br class="clr"/>



</div>
</div>

@endisset

@endsection


