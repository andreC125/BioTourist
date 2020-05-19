@extends('layouts.user')

@section('content')

    <div class="container">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{{trans('auth.you can change your address here')}}}</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{{trans('auth.about')}}}</h5>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>{{{trans('auth.report generated for')}}}</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>{{{trans('auth.for the site')}}}</td>
                            <td>Annonces</td>
                        </tr>
                        <tr>
                            <td>{{{trans('auth.at the url')}}}</td>
                            <td>annonces.oo</td>
                        </tr>
                        <tr>
                            <td>{{{trans('auth.the')}}}</td>
                            <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                        </tr>
                    </tbody>
                </table>
                <em>{{{trans('auth.you can save this page to retain your data using your browser\'s menu.')}}}</em>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{{trans('auth.user')}}}</h5>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>{{{trans('auth.id')}}}</td>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td>{{{trans('auth.login name')}}}</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>{{{trans('auth.email')}}}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>{{{trans('auth.date of registration')}}}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

