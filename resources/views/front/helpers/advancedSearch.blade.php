<div class="advanced-search">
    <br>
    <div class="container">
        <div class="search">
            <div class="search-specific">
                <h5>@lang('shop.advancedSearch')</h5>
                <hr>
                <div class="search-area">
                    {!! Form::open(['url' => '/advancedSearch']) !!}
                    <div class="form-group">
                        <label for="category"><b>@lang('shop.cat')</b><br>
                            <select name="category" class="browser-default custom-select" id="category">
                                @if(isset($categories))
                                    <option selected={{true}} value={{false}}>all</option>
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
                        <label for="max" class="d-flex">
                            <b>Promo</b>
                            <input type="checkbox" class="form-control" id="max" name="onSold">
                        </label>
                        <label for="top" class="d-flex">
                            <b>@lang('shop.top')</b>
                            <input type="checkbox" class="form-control" id="top" name="topProd">
                        </label>
                        <label for="new" class="d-flex">
                            <b>@lang('shop.new')</b>
                            <input type="checkbox" class="form-control" id="new" name="newProd">
                        </label>
                    </div>
                    <button type="submit">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
