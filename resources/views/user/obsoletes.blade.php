@extends('layouts.user')

@section('content')

    @include('partials.alerts', ['title' => '']){{{trans('auth.obsolete ads')}}}

    @include('partials.table-add-del-view')

@endsection

@section('script')

    @include('partials.script-add-del-view')

@endsection
