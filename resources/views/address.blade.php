@extends('layouts.app')

@section('addAddress')

    <div class="container">
        <script>
            var addresses = [];
        </script>
        <div class="row">
            <div class="col">
                <form method="post" action="{{route('add-address')}}">

                    <div class="col-sm-7">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group inline">
                            <label for="name">Name *</label><br>
                            <input id='name' name="name" class="form-control" value="{{old('name')}}"/>
                            @if($errors->has('name'))
                                <div>{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="city">City *</label><br>
                            <input id="city" type="text" class="form-control" value="{{old('city')}}"name="city">
                            @if($errors->has('city'))
                                <div>{{ $errors->first('city') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="area">Area *</label><br>
                            <input id="area" type="text" class="form-control" value="{{old('area')}}" name="area">
                            @if($errors->has('area'))
                                <div>{{ $errors->first('area') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="street">Street</label><br>

                            <input id="street" type="text" class="form-control" value="{{old('street')}}" name="street">
                            @if($errors->has('street'))
                                <div>{{ $errors->first('street') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="house">House</label><br>
                            <input id="house" type="text" class="form-control" value="{{old('house')}}" name="house">
                            @if($errors->has('house'))
                                <div>{{ $errors->first('house') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="additional_information">Additional information</label><br>

                            <textarea id="additional_information" class="form-control" value="{{old('street')}}" name="additional_information"></textarea>
                        </div>
                        <button class="banner-btn inline">ADD ADDRESS</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="addresses">

                    @foreach($addresses as $address)
                        <div>
                            <script>
                                addresses.push("<?php echo $address['city'];?> <?php echo $address['street'];?> <?php echo $address['house'];?>");
                            </script>
                            <p><b>{{$address['name']}}</b></p>
                            <p>{{$address['city']}}, {{$address['area']}}, {{$address['street']}}, {{$address['house']}}</p>
                            <div class="map" style="width:400px;height:200px;"></div>
                            <form method="post"
                                  action="{{route('delete-address', ['id' => $address['id']])}}">
                                {{method_field('DELETE')}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="banner-btn">
                                    <button name="address_id" value="{{$address['id']}}">Delete</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgD5jrmV7TZa1AWIKaRTzrjluLSRVph5E&callback=initMap&libraries=&v=weekly"
            defer
    ></script>
@endsection
