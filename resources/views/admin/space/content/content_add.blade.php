@extends('layouts.app')

@section('title', 'IdeaSpace')

@section('content')

    <h1 style="padding-left:20px">{{ trans('template_content_add.add_new') }} {{ $form['#label'] }}</h1>

    {!! Form::open(array('route' => ['content_add', $space_id, $contenttype_name], 'method' => 'POST', 'autocomplete' => 'false')) !!}

    @if (count($errors) > 0)
    <div class="row">
        <div class="col-md-9" style="padding-left:35px">
            <div class="alert alert-danger">
            {{ trans('template_content_add.field_errors') }}
            </div>
        </div>
    </div>
    @endif

    <div class="row">

        <!-- mainbar //-->
        <div class="col-md-9" style="padding-left:35px">

            <div class="form-group {{ $errors->has('isvr_content_title')?'has-error':'' }}">
            {!! Form::text('isvr_content_title', '', array('class'=>'form-control input-lg', 'placeholder'=> trans('template_content_add.content_title_placeholder'), 'maxlength' => '250')) !!}
            <span class="info-block">{{ trans('template_content_add.content_title_info') }}</span>
            {!! $errors->has('isvr_content_title')?$errors->first('isvr_content_title', '<span class="help-block">:message</span>'):'' !!}
            </div>

            @foreach ($form['#fields'] as $field_id => $properties)
                @include($properties['#template'], ['field_id' => $field_id, 'form' => $properties])
            @endforeach        

            <div class="form-group text-center">
                <button type="button" class="btn btn-primary btn-lg content-add-save" style="margin-right:20px"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {{ trans('template_content_add.save') }}</button> <a href="{{ route('space_edit', ['id' => $space_id]) }}" role="button" class="btn btn-default btn-lg content-add-cancel"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {{ trans('template_content_add.cancel') }}</a>
            </div>

        </div>

        <!-- sidebar //-->
        <div class="col-md-3">

            @include('admin.space.theme_partial', ['theme' => $theme])

        </div>

    </div><!-- row //-->

    {!! Form::close() !!}

    @include('admin.asset_library.assets_modal')

@endsection
