@extends('layouts.user')

@section('content')

    @include('partials.alerts', ['title' => '']){{{trans('auth.active ads')}}}

    @include('partials.table-add-del-view', ['edit' => true])

@endsection

@section('script')

    @include('partials.script-add-del-view')

@endsection
