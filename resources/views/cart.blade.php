@extends('layouts.master')
@section('content')


<ul class="breadcrumb">
    <li>
        <h3>  <small class="pull-right"> ({{count($orders)}} items) in Cart </small></h3>
    </li>
</ul>


	<hr class="soft"/>

    <div style="width: 90%;" class="mx-auto">

<div class=" mb-3 row" style=" width: 100%; " >
    <div class="col-7" style=" width: 53.47%; color: #8e8e93; font-weight: 500; font-size: 14px; line-height: 1.14; border-collapse: collapse;">ITEM</div>
    <div class="col-2" style=" width: 53.47%; color: #8e8e93; font-weight: 500; font-size: 14px; line-height: 1.14; border-collapse: collapse;">Quantity</div>
    <div class="col-2" style=" width: 53.47%; color: #8e8e93; font-weight: 500; font-size: 14px; line-height: 1.14; border-collapse: collapse;">TOTAL PRICE</div>
    <div class="col-1" style=" width: 53.47%; color: #8e8e93; font-weight: 500; font-size: 14px; line-height: 1.14; border-collapse: collapse;">REMOVE</div>
</div>

    @foreach ($orders as $order)


    <div class=" mb-2 flyout" style=" background-color: #fff; border-radius: 4px; border-collapse: collapse; display: table;  width: 100%;" >
        <div class=" ml-1 mt-1 mb-2 row "  >


            <a href="{{ route('products.show',['product'=>$order->item_id])}}" >
                <div class=" image ft-product-image " style=" padding:10px; ">
                <img class="lazy image -loaded" width="60" height="60" src="/storage/images/{{$order->products->product_image}}" alt="Image" >
                </div>
            </a>

            <div class="col-5 mr-5 " style=" padding:10px; ">
                <a  href="{{ route('products.show',['product'=>$order->item_id])}}" class="text-dark d-block mb-2"  style="font-size: 16px; font-weight: 500; line-height: 1.25; text-decoration:none;" >{{ \Illuminate\Support\Str::limit($order->products->name, 25, $end='...') }}</a>
                <a class=" text-primary" style="text-decoration: none;" href="{{ route('cat',['cat'=>$order->products->cat])}}" >{{$order->products->cat}}</a>

            </div>


        
                                            {{-- Update Quantity form --}}

            <div class="form-group col-2 mt-2 "  >


                {!! Form::open(['action' => 'CartController@store' ,'method'=> 'POST']) !!}

                {!! Form::hidden('item_id', $order->item_id, ['class'=>'form-control']) !!}
                {!! Form::hidden('user_id', $order->user_id = Auth()->user()->id, ['class'=>'form-control'])!!}
                {!! Form::hidden('id', $order->id, ['class'=>'form-control']) !!}


                {{Form::number('quantity', $order->quantity,['class'=> 'form-control w-100 row','placeholder'=> 'Quantity Number', 'max'=>'6', 'min'=>'0'])}}

                {{Form::submit('Update',['class'=> 'btn w-75 mx-auto', 'style'=>'position: absolute; left:0;'])}}

                {!!Form::close()!!}

            </div>
            
                                        {{-- End Update Quantity Form --}}
            


            <div class="col-1 mt-4 mr-5">
               <h3 class=" text-dark" >{{$order->price}}</h3>
            </div>


            <div class="col-1 ml-4" style="float:right;">

                {!! Form::open(['action'=> ['CartController@destroy', $order->id],'method'=> 'DELETE']) !!}
                {!! Form::hidden('id', $order->id, ['class'=>'form-control']) !!}
                {{Form::submit('Delete', ['class'=> 'btn btn-danger mt-2', 'style'=>''])}}
                {!!Form::close()!!}
            </div>

        </div>
    </div>

@endforeach
</div>
@endsection
