<section id="reviews">
    <div id="app">
        <Reviews
         v-bind:reviews="{{json_encode($reviews)}}" 
         auth="{{$auth}}" 
         empty="{{$reviews->isEmpty()}}"
         name="{{Auth::check()? Auth::user()->name : null}}"
         productid="{{$product->id}}"
         />
    </div>
</section>
<br>
