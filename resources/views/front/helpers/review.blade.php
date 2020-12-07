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
        <div class="reviews col-sm-12 col-md-6 col-lg-8" id="app">
            <h5>@lang('productDetail.all')</h5>
            <hr>
            @if(!$reviews->isEmpty())
                <Reviews />
                @foreach($reviews as $one)
                    <div class="review">
                        <div class="head">
                            <div class="d-flex align-items-center">
                                <?php
                                $images = DB::table('users')->where('id', '=', $one->user_id)->get();
                                ?>
                                @foreach($images as $image)
                                    @if($image->image)
                                        <img class="card-img-top img-fluid" src="{{url('images',$image->image)}}" alt="Card image cap">
                                    @else
                                        <i class="fa fa-user"></i>
                                    @endif
                                @endforeach
                                @if(!$one->user_id)
                                    <i class="fa fa-user"></i>
                                @endif
                                <div>
                                    <strong>{{(Auth::check()&&(Auth::user()->name==$one->client_name))?"You":$one->client_name}}</strong>
                                    <br>
                                    <small>{{$one->created_at}}</small>
                                </div>
                                <small class="rated">
                                    @if($one->rating)
                                        @for($i=1;$i<=$one->rating;$i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        <strong>({{$one->rating}}/5)</strong>
                                    @endif
                                </small>
                            </div>
                        </div>
                        <br>
                        <b class="content">{{$one->review_content}}</b>
                    </div>
                    <hr>
                @endforeach
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
