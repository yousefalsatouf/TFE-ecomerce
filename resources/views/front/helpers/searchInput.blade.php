<div class="search-input">
    <h5>@lang('shop.searchByName')</h5>
    <form action='{{('/search')}}' class="form-inline ml-auto" method="post">
        <div class="d-flex justify-content-between align-items-center">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2">
            <label for="search">
                <input type="text" name="search" id="search" class="form-control mr-2" placeholder="@lang('header.search')">
            </label>
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<br>
