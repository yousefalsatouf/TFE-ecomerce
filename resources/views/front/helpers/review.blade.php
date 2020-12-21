<section id="reviews">
    <div class="container d-flex justify-content-between flex-wrap">
        <div class="new col-sm-12 col-md-5 col-lg-3">
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            @guest
                <h5>@lang('commun.greeting') Stranger,</h5>
                <strong> Help others know about this product</strong>
                <hr>
                {!! Form::open(['route' => 'addReview', 'method' => 'post']) !!}
                <input type="hidden" name="product_id" value={{$product->id}}>
                <div class="form-group">
                    {{ Form::label('client_name', 'Name *') }}
                    {{ Form::text('client_name', null, array('class' => 'form-control', 'required')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('client_email', 'Email') }}
                    {{ Form::text('client_email', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group rating">
                    <label for="rating">Rating</label>
                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                </div>
                <div class="form-group">
                    {{ Form::label('review_content', 'Write something *') }}
                    {{ Form::textarea('review_content', null, array('class' => 'form-control', 'required')) }}
                </div>
                {{ Form::submit('Post', array('class' => 'post')) }}
                <br>
                {!! Form::close() !!}
            @else
                <h5>@lang('commun.greeting') {{Auth::user()->name}}, </h5>
                <strong>@lang('productDetail.helpingOthers')</strong>
                <hr>
                {!! Form::open(['route' => 'addReview', 'method' => 'post']) !!}
                <input type="hidden" name="product_id" value={{$product->id}}>
                <div class="form-group rating">
                    <label for="rating">Rating </label>
                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                </div>
                <div class="form-group">
                    {{ Form::label('review_content', 'Write something *') }}
                    {{ Form::textarea('review_content', null, array('class' => 'form-control', 'required')) }}
                </div>
                {{ Form::submit('Post', array('class' => 'post')) }}
                <br>
                {!! Form::close() !!}
            @endguest
        </div>
        <div class="reviews col-sm-12 col-md-6 col-lg-8">
            <h5>@lang('productDetail.all')</h5>
            <hr>
            @if(!$reviews->isEmpty())
                <div id="app">
                    <Reviews v-bind:reviews="{{json_encode($reviews)}}" auth="{{$auth}}"/>
                </div>                   
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
