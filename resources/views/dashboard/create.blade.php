@extends('layouts.dashboard')

@section('content')


    <div class="row justify-content-center w-100 " style="width:fit-content;">


        <div class="card w-100 text-light mt-3 mb-5 " style="background-color:#1C1E1F;">

            <div class="card-body w-100 ">

    {!! Form::open(['action' => 'DashboardController@store','method'=> 'POST', 'enctype' => 'multipart/form-data']) !!}


    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=> 'form-control','placeholder'=> 'Product Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('cat','Category',['class'=> ' d-block'])}}
        {{Form::select('cat', array('Supermarket'=> 'Supermarket', 'Fashion' => 'Fashion', 'Health & Beauty' => 'Health & Beauty', 'Phones & Tablets' => 'Phones & Tablets', 'Home & Office' => 'Home & Office', 'Books' => 'Books', 'Electronics' => 'Electronics' ),['class'=> 'form-control w-25'])}}
    </div>


    <div class="form-group">
        {{Form::label('image','Product Image',['class'=> ' d-block'])}}
        {{Form::file('image',['class'=>'w-25'])}}
    </div>

    <div class="form-group">
        {{Form::label('description','Description')}}
        {{Form::textarea('description','',['class'=> 'form-control','placeholder'=> 'Product Description'])}}
    </div>

    <div class="form-group">
        {{Form::label('price','Price')}}
        {{Form::number('price','',['class'=> 'form-control w-25','placeholder'=> 'Product Price'])}}
    </div>


        <div class="mt-4 mb-2">
            {{Form::submit('Submit',['class'=> 'btn btn-light d-flex m-auto '])}}
            {!!Form::close()!!}
        </div>

            </div>
        </div>
    </div>
@endsection


