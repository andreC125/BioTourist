@extends('layouts.user')

@section('content')

    @include('partials.alerts', ['title' => '']){{{trans('auth.ads pending')}}}

    @include('partials.table-add-del-view', ['noAdd' => true])

@endsection

@section('script')

    @include('partials.script-add-del-view')

@endsection
