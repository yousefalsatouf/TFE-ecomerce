<section class="categories-list">
    <div class="container">
        <h2>{{__('home.categoriesList')}}</h2>
        <br>
        <div class="articles">
            @foreach($categories as $category)
                <div class="card">
                    <a href="{{url('/category/list/'.$category->id)}}">
                        <img src="{{url('images', $category->image)}}" class="images card-img w-100 h-100" alt="photo">
                    </a>
                    <div class="card-body">
                        <h3 class="card-text iphone">{{strtoupper($category->name)}}</h3>
                        <p>{{$category->description}}</p>
                    </div>
                    <a href="{{url('/category/list/'.$category->id)}}" class="text-dark link">
                            <strong>{{__('home.discover')}} {{$category->name}}</strong>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
