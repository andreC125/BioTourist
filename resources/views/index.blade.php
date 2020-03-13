@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class= "col-md-8">
            <table class="table tables-striped">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->title}}</td>
                        <td>
                            <a href="{{route('post.show', $post->id) }}" class="btn btn-primary">Voir
Post</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>