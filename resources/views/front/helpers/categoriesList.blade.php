<section class="categories-list">
    <div class="container">
        <h2>Our Categories</h2>
        <br>
        <div class="articles">
            @foreach($categories as $category)
                <div class="card">
                    <a href="{{url('/category/list/'.$category->name)}}">
                        <img src="{{asset('images/black.jpg')}}" class="images card-img w-100 h-100">
                    </a>
                    <div class="card-body">
                        <h3 class="card-text iphone">{{$category->name}}</h3>
                        <p>some content to test</p>
                    </div>
                    <a href="{{url('/category/list/'.$category->name)}}" class="text-dark">
                        <button class="btn bg-success btn-sm text-dark">
                            <b>Discover {{$category->name}}'s Products <i class="fa fa-eye"></i></b>
                        </button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
