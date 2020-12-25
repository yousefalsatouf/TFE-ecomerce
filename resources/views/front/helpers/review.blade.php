<section id="reviews">
    <div class="container d-flex justify-content-between flex-wrap" id="app">
        <div class="new col-sm-12 col-md-5 col-lg-3">
            <Rating auth="{{$auth}}" name="{{Auth::check()? Auth::user()->name : null}}" productid="{{$product->id}}"/>
        </div>
        <div class="reviews col-sm-12 col-md-6 col-lg-8">
            <h1>@lang('productDetail.all')</h1>
            <hr>
            @if(!$reviews->isEmpty())
                    <Reviews v-bind:reviews="{{json_encode($reviews)}}" auth="{{$auth}}"/>
            @else
                <div class="review">
                    <div class="text-danger">
                       @lang('productDetail.noReview')
                    </div>
                </div>
            @endif
         </div>
    </div>
</section>
<br>
