@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('global.restaurant.title_singular') }}
                    <a href="{{url('admin/restaurant')}}"><button type="button" class="btn btn-danger btn-sm pull-right" title="Click to back"><i class="fa fa-arrow-left" title="Click to refresh filter"></i></button></a>

                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.restaurant.update", [$restaurant->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('global.restaurant.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($restaurant) ? $restaurant->name : '') }}">
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
                            <input type="email" id="code" name="code" class="form-control" value="{{ old('email', isset($restaurant) ? $restaurant->email : '') }}">
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
                            <input type="text" id="description" name="description" class="form-control" value="{{ old('email', isset($restaurant) ? $restaurant->description : '') }}">
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
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('email', isset($restaurant) ? $restaurant->phone : '') }}">
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
                            <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($restaurant) ? $restaurant->email : '') }}">
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('global.restaurant.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="images">Images </label>
                            <div class="images">
                                @foreach($restaurant->images as $key => $value )
                                <img data-toggle="modal" data-target="#exampleModal" class="image" data-id="{{$value->id}}" data-res-id="{{$restaurant->id}}" height="50px" src="{{ url('image/'.$value->name)}}" alt="{{$value->name}}"/>
                                @endforeach
                                <button type="button" data-toggle="modal" data-target="#exampleModal" data-res-id="{{$restaurant->id}}"  class="image btn btn-success btn-sm " title="Add more image"><i class="fa fa-plus" title="Click to refresh filter"></i></button>

                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('global.restaurant.fields.status') }}*
                               <select name="status" id="status" class="form-control" >
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route("admin.restaurant.update_image") }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
                @csrf
                <div class="form-group ">
                    <label for="rest_image">Image Name </label>
                    <input type="hidden" id="img_id" name="img_id" class="form-control">
                    <input type="hidden" id="rest_id" name="rest_id" class="form-control">
                    <input type="file" id="rest_image" name="rest_image" class="form-control" accept=".png,.jpg,.jpeg">

                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<script type="text/javascript">
    $(document).ready(function () {
        // $('.images').click(function(){
            $('.image').on('click', function () {
                if($(this).attr('data-id')){
                    $('#exampleModalLabel').text('Update Image');
                }else{
                    $('#exampleModalLabel').text('Add Image');
                }
              $('#img_id').val($(this).attr('data-id'));
              $('#rest_id').val($(this).attr('data-res-id'));

        });
        });
</script>
