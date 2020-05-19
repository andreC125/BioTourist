@extends('layouts.app')
<style>
    .display-comment .display_comment {
        margin_left 40px
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>{{ $post->title }}</b></p>
                    <p>
                        {{ $post->body}}
                    </p>
                    <hr />
                    
                    
                        <div class="display-comment">
                    @include('partials._comment_replies', ['comments'=> $post->comments, 'post_id'=> $post->id])
                    <hr />
                    <h4>{{{trans('auth.add a comment')}}}</h4>
                <form method="post" action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment_body" class="form-control" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value={{{trans('auth.add a comment')}}} />

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
</div>
@endsection

