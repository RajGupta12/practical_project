@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('global.restaurant.title_singular') }}
                    <a href="{{url('admin/restaurant')}}"><button type="button" class="btn btn-danger btn-sm pull-right" title="Click to back"><i class="fa fa-arrow-left" title="Click to refresh filter"></i></button></a>
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.restaurant.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('global.restaurant.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label for="code">{{ trans('global.restaurant.fields.code') }}*</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                            @if($errors->has('code'))
                                <p class="help-block">
                                    {{ $errors->first('code') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.code_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('global.restaurant.fields.description') }}</label>
                            <input type="text" id="description" name="description" class="form-control">
                            @if($errors->has('description'))
                                <p class="help-block">
                                    {{ $errors->first('description') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.description_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('global.restaurant.fields.phone') }}</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                            @if($errors->has('phone'))
                                <p class="help-block">
                                    {{ $errors->first('phone') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.phone_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('global.restaurant.fields.email') }}</label>
                            <input type="email" id="email" name="email" class="form-control">
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('rest_image') ? 'has-error' : '' }}">
                            <label for="rest_image">{{ trans('global.restaurant.fields.rest_image') }}</label>
                            <input type="file" id="rest_image" name="rest_image[]" class="form-control" multiple="" accept=".png,.jpg,.jpeg">
                            @if($errors->has('rest_image'))
                                <p class="help-block">
                                    {{ $errors->first('rest_image') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.rest_image_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('global.restaurant.fields.status') }}*
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                            @if($errors->has('status'))
                                <p class="help-block">
                                    {{ $errors->first('status') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.status_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
