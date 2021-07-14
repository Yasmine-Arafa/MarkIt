@extends('layouts.master')
@section('content')


 {{--If message assesst--}}
    @isset($mssg)
        <div class=" mx-auto w-75 h-75">
            <h1 class="text-center text-danger">{{$mssg}}</h1> 
        </div> 
    @else


<ul class="breadcrumb">
    <li><a  href="/" >Home</a> <span class="divider">/</span></li>
    <li><a href="{{route('products.index')}}">Products</a> <span class="divider">/</span></li>
    <li><a href="{{ route('cat',['cat'=>$product->cat])}}"  >{{$product->cat}}</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
</ul>


<div class=" flyout pt-3 pr-4 pl-4 pb-3 w-75  mx-auto " style=" background-color: #fff; border-radius: 4px; height: 400px; " >

	<!--Section: Block Content-->

		<div class="container-fliud" >
			<div class="wrapper row " >

                {{-- product image --}}

				<div class="col-md-6"style="height: 360px; white-space: nowrap; text-align: center;">
                    <span style="display: inline-block;
                    height: 100%;
                    vertical-align: middle;"></span>

                    <img 
                    src="/storage/images/{{$product->product_image}}" 
                    style="max-width:100%; vertical-align: middle; max-height:360px; " 
                    class="m-auto d-inline-block" 
                    alt="No Available Image">

                </div>

                {{-- End product image --}}


				<div class="col-md-6 pl-4">

                    {{-- product name and about --}}

                    <div class="d-flex flex-row" style="height:60px">
                        <h3 >{{ \Illuminate\Support\Str::limit($product->name, 35, $end='...') }}</h3>
                    </div>

                    <div class=" mt-3 " style="height:150px">
                        <h3 style="  text-transform: capitalize;
                        color: #12263a;
                        padding-bottom: 0.4rem;">About this item:</h3>
                        <p class="d-block" >{{ \Illuminate\Support\Str::limit($product->about, 200, $end='  ...') }}</p>
                    </div>

                {{-- End product name and about --}}

                {{-- product rate --}}

                    <div class="d-flex flex-row mt-2" style="height:20px">
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>

                {{-- End product rate --}}

                    <div class="d-flex flex-row mt-3 " style="height:30px;">
                        <h4 class="text-danger font-weight-bold"><span>Current Price: ${{$product->price}}</span></h4>
                    </div>

                    

                    @if(!Auth::guest())

                        <div class="mt-3">
                            {!! Form::open(['action' => 'CartController@store' ,'method'=> 'POST']) !!}

                                {!! Form::hidden('item_id', $product->id, ['class'=>'form-control']) !!}
                                {!! Form::hidden('user_id', $user_id = Auth()->user()->id, ['class'=>'form-control'])!!}

                                {{Form::number('quantity',NULL,['class'=> 'd-inline form-control','placeholder'=> 'Quantity', 'max'=>'6', 'min'=>'0', 'style'=>'width:40%;'])}}
                                
                                {{Form::button('Add To Cart   <i class="fas fa-shopping-cart pl-0 "></i>',['type'=>'submit','class'=> 'd-inline mx-auto btn btn-outline-success w-50 '])}}
                            {!!Form::close()!!}
                        </div>

                    @endif

				</div>
			</div>
		</div>
    </div>

    
    @endisset

@endsection

