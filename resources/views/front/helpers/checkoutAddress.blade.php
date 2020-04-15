<div class="address">
    <div class="tab-content">
        <div id="address" class="active tab-block">
            <h3>Shopper Information</h3>
            <hr>
            @php
                $userId = Auth::user()->id;
                $addressIdUser = DB::table('user_infos')->where('user_id', $userId)->value('user_id');
                $addressInfos = DB::table('user_infos')->where('user_id', $userId)->get();
            @endphp
            @if($addressIdUser)
                <div class="user-info card">
                    <div class="card-header">
                        <i class="fa fa-user"></i>
                        <h4>{{strtoupper(Auth::user()->name)}}</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($addressInfos as $info)
                                <li>
                                    <h5>First Name</h5>
                                    <p>{{$info->first_name}}</p>
                                </li>
                                <li>
                                    <h5>Last Name</h5>
                                    <p>{{$info->last_name}}</p>
                                </li>
                                <li>
                                    <h5>Email</h5>
                                    <p>{{$info->user_email}}</p>
                                </li>
                                <li>
                                    <h5>Phone</h5>
                                    <p>{{$info->phone_number}}</p>
                                </li>
                                <li>
                                    <h5>State</h5>
                                    <p>{{$info->state}}</p>
                                </li>
                                <li>
                                    <h5>City</h5>
                                    <p>{{$info->city}}</p>
                                </li>
                                <li>
                                    <h5>Street</h5>
                                    <p>{{$info->street}}</p>
                                </li>
                                <li>
                                    <h5>Street Number</h5>
                                    <p>{{$info->street_number}}</p>
                                </li>
                                <li>
                                    <h5>Postal Code</h5>
                                    <p>{{$info->postal_code}}</p>
                                </li>
                                <li>
                                    <h5>Payment Method</h5>
                                    <p>{{$info->payment_type}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <form action="{{url('/formValidate')}}" method="post">
                    {{$addressIdUser}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first-name" class="form-label">First Name</label>
                            <input id="first-name" type="text" name="first_name" placeholder="First Name"  value="{{ old('first_name') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('first_name') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input id="last-name" type="text" name="last_name" placeholder="Last Name"  value="{{ old('last_name') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('last_name') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input id="phone" type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('phone_number') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="state" class="form-label">State Name</label>
                            <input id="state" type="text" name="state" placeholder="State" value="{{ old('state') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('state') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city" class="form-label">City Name</label>
                            <input id="city" type="text" name="city" placeholder="City Name" value="{{ old('city') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('city') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="postal-code" class="form-label">Postal code</label>
                            <input id="postal-code" type="text" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('postal_code') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="street" class="form-label">Street</label>
                            <input id="street" type="text" name="street" placeholder="Street" value="{{ old('street') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('street') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="street-number" class="form-label">Street Number</label>
                            <input id="street-number" type="text" name="street_number" placeholder="Street Number" value="{{ old('street_number') }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('street_number') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pay" class="form-label">
                                <input type="radio" name="pay" value="paypal" checked>
                                PayPal
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <input type="submit" value="Continue" class="btn btn-success">
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
