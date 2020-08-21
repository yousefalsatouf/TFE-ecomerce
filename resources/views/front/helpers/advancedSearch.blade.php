<div class="advanced-search">
    <br>
    <div class="container">
        <div class="search">
            <div class="search-specific">
                <h6>@lang('shop.advancedSearch')</h6>
                <hr>
                <div class="search-area">
                    {!! Form::open(['url' => '/advancedSearch']) !!}
                    <div class="form-group">
                        <label for="category"><b>@lang('shop.cat')</b><br>
                            <select name="category" class="browser-default custom-select" id="category">
                                @if(isset($categories))
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->name}}">{{ucwords($cat->name)}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="maxPrice"><b>@lang('shop.price')</b>
                            <input type="number" class="form-control" id="greater-than" name="maxPrice" placeholder="Max Price">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="greater-than" class="d-flex">
                            <b>Promo</b>
                            <input type="checkbox" class="form-control" id="greater-than" name="onSold">
                        </label>
                    </div>
                    <button type="submit">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
