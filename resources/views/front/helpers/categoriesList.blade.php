<section class="categories-list">
    <div class="container">
        <h2>{{__('home.categoriesList')}}</h2>
        <br>
        <div class="articles">
            @foreach($categories as $category)
                <div class="card">
                    <a href="{{url('/category/list/'.$category->name)}}">
                        <img src="{{url('images', $category->image)}}" class="images card-img w-100 h-100" alt="photo">
                    </a>
                    <div class="card-body">
                        <h3 class="card-text iphone">{{strtoupper($category->name)}}</h3>
                        <p>{{$category->description}}</p>
                    </div>
                    <a href="{{url('/category/list/'.$category->name)}}" class="text-dark link">
                            <b>{{__('home.discover')}} {{$category->name}}</b>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
