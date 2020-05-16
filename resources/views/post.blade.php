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
                <div class="card-header">{{{ trans('auth.create post')}}}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.store')}}">
                        
                        <div class="form-group">
                            @csrf
                            <label class="label"> {{{trans('auth.title post')}}}</label>
                            <input type="text" name="title" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="label"> {{{trans('auth.body post')}}}</label>
                            <textarea name="body" rows="10" cols="30" class="form-control" required     
></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-succes" />
                            
                        </div>
                    </form>
                </div>
                
            </div>

        </div>

    </div>
    
</div>
    
@endsection
