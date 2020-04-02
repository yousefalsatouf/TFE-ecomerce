<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="accordion mt-5" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <span>List of Categories</span>
                            <button class="btn btn-outline-success collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa fa-bars"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php  $cats = DB::table('categories')->get(); ?>
                            @foreach($cats as $cat)
                                <a class="dropdown-item text-dark" href="{{url('/category')}}/list/{{$cat->name}}">{{ucwords($cat->name)}}
                                    <i class="float-right fa fa-caret-right"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
