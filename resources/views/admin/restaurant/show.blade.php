@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('global.restaurant.title') }}
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('global.restaurant.fields.name') }}
                                </th>
                                <td>
                                    {{ $restaurant->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.restaurant.fields.email') }}
                                </th>
                                <td>
                                    {{ $restaurant->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.restaurant.fields.description') }}
                                </th>
                                <td>
                                    {{ $restaurant->description }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('global.restaurant.fields.code') }}
                                </th>
                                <td>
                                    {{ $restaurant->code }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                   Image
                                </th>
                                <td>
                                    @foreach($restaurant->images as $key => $value )

                                        <img src="{{ URL::to('/public/image/') }}{{$value->name}}" alt="{{$value->name}}"/>
                                    @endforeach
                                </td>

                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
