@extends('layouts.admin')

@section('content')

    @include('partials.alerts', ['title' => '']){{{trans('auth.obsolete Ads')}}}

    @include('partials.table-add-del-view')

@endsection

@section('script')

    @include('partials.script-add-del-view')

@endsection
