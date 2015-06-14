@extends('checkout')
@section('content')
    <h1>Payment & Billing</h1>
    <hr>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>Payment Information</h3>
    {!! Form::open(['route' => 'checkout.billing']) !!}
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label>Name on card</label>
                <input type="text" name="name_on_card" value="{{ $checkout['payment']['name_on_card'] or Input::old('name_on_card') }}" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Credit card number</label>
                <input type="text" name="card_number" value="{{ $checkout['payment']['card_number'] or Input::old('card_number') }}" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Card Type</label>
                <select name="card_type" class="form-control">
                    <option value="0">Select Cart Type</option>
                    <option value="1">American Express</option>
                    <option value="2">Discover</option>
                    <option value="3">MasterCard</option>
                    <option value="4">Visa</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
            <label>Expiration date</label>
            <div class="row">
                <div class="col-md-6">
                    <select name="expiration_date_month" class="form-control">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="expiration_date_year" class="form-control">
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                    </select>
                </div>
            </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>CCV Code</label>
                <input type="text" name="ccv_code" value="{{ $checkout['payment']['ccv_code'] or Input::old('ccv_code') }}" class="form-control" placeholder="3 digits only">
            </div>
        </div>

    </div>

    <div class="checkbox">
        <label>
            <input name="same_address" type="checkbox" value="1"> Use my shipping address as my billing address
        </label>
        <hr>
    </div>

    <h3>Billing Address</h3>
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Second Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Address Line 1</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Address Line 2</label>
                <input type="text" name="address1" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" value="{{ $checkout['billing']['city'] or Input::old('city') }}" class="form-control" placeholder="Enter city">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>State/Province/Region</label>
                <select name="city" class="form-control">
                    <option>Select State/Province/Region</option>
                    <option>California</option>
                    <option>Florida</option>
                    <option>New York</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Country</label>
                <select name="country" class="form-control">
                    <option>Select country</option>
                    <option>USA</option>
                    <option>England</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Zip Code</label>
                <input type="text" name="zipcode" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Name">
            </div>
        </div>

    </div>

    <div class="form-group">
        <a class="btn btn-lg btn-default" href="{{ route('checkout.shipping') }}">Back to shipping information</a>
        {!! Form::submit('Continue to confirm', ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    <?php echo '<pre>'; ?>
    {{ var_dump($checkout) }}
    <?php echo '</pre>'; ?>
@stop
