<div id="sideBar" class=" col cat-icon pt-2 pb-2" role="menu">
{{-- hover color #094C59 --}}

    <div class="row pl-2">
        <select  class="col-7 mb-3 mt-0 btn col-5 p-2 bg-transparent" style="border-color: #2896A9; color:#2896A9; font-weight: bold; font-size: 14px;">
            <option disabled >Sort</option>
            <option selected>Most Relevant</option>
        </select>
    </div>



    <hr class="soft mt-0"/>

    {!! Form::open(['route' => 'filter','method'=> 'POST']) !!}
    
            <p id="container" class="click pl-2 mb-1 filter-cat">CATEGORY
                <i id="toggled-icon" class="fas fa-chevron-down rotate-reset arrow"></i>
            </p>
            <div class="list-content pl-2">
                <ul class="list-unstyled components mb-3 category-filter ">

                    <li class="active">
                        <a href="{{ route('cat',['cat'=>'Supermarket'])}}"  class="w-100 " ><input type="checkbox" class="mr-1" ><span  class="fas fa-store"></span> Supermarket</a>
                    </li>
                    <li class="active ">
                        <a href="{{ route('cat',['cat'=>'Fashion'])}}" class="w-100" ><input type="checkbox" class="mr-1"><span  class="fas fa-tshirt"></span> Fashion</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('cat',['cat'=>'Health & Beauty'])}}" class="w-100"><input type="checkbox" class="mr-1"><span  class="fas fa-mortar-pestle"></span> Health & Beauty</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('cat',['cat'=>'Phones & Tablets'])}}" class="w-100"><input type="checkbox" class="mr-1"><span  class="fas fa-tshirt"></span> Phones & Tablets</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('cat',['cat'=>'Home & Office'])}}" class="w-100"><input type="checkbox" class="mr-1"><span  class="fas fa-home"></span> Home & Office</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('cat',['cat'=>'Books'])}}" class="w-100"><input type="checkbox" class="mr-1"><span  class="fas fa-book"></span> Books</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('cat',['cat'=>'Electronics'])}}" class="w-100"><input type="checkbox" class="mr-1"><span  class="fas fa-tv"></span> Electronics</a>
                    </li>
                </ul>
            </div>


    <hr class="soft"/>


                <p id="container" class="click pl-2 mb-1 filter-cat">PRICE
                    <i id="toggled-icon" class="fas fa-chevron-down rotate-reset arrow"></i>
                {{--  <svg  class="icon-small rotate-reset arrow">
                    <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z">
                    </path>
                </svg>  --}}
                </p>

                <div class="list-content p-2">
                    <div class=" list-unstyled components row w-100 mx-auto">
                        <label class=" components pr-1 pl-1 col-6">
                            <small >From (EGP)</small>
                            <input type="number" class="w-100 " min="0" max="4749" >
                        </label>

                        <label class=" components col-6 pr-1 pl-1">
                            <small>To (EGP)</small>
                            <input type="number" class="w-100" min="1" max="4750" >
                        </label>
                    </div>

                    <div class=" w-100 row mx-auto slidecontainer">
                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                    </div>

                        <input class="valuesGetter" data-initial-start="0" data-initial-end="4750" data-start="0" data-end="4750" type="hidden">

                        <a class="btn btn-primary w-25 p-1" href="#">APPLY</a>


                </div>


                <hr class="soft"/>


                <p id="container" class="click pl-2 mb-1 filter-cat">RATING
                    <i id="toggled-icon" class="fas fa-chevron-down rotate-reset arrow"></i>
                {{--  <svg  class="icon-small rotate-reset arrow">
                    <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z">
                    </path>
                </svg>  --}}
                </p>
                <div class="list-content pl-2 mx-auto">
                    <ul class="list-unstyled components mb-3">
                        <div>
                            <span>⭐</span>
                            <span>⭐</span>
                            <span>⭐</span>
                            <span>⭐</span>
                            <span>⭐</span>
                        </div>

                    </ul>
                </div>


        <hr class="soft"/>


        {{Form::submit('Filter',['class'=> 'mt-3 btn col-5 p-2 bg-transparent d-block mx-auto', 'style'=>'border-color: #2896A9; color:#2896A9; font-weight: bold; font-size: 14px;'])}}


        {{ Form::close() }}

    </div>

