@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to my Blog</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::check())
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('create')}}" class="btn btn-sm btn-primary">Create New Post</a>
                                    @if (Auth::user()->isAdmin())
                                        <a href="{{route('manage')}}" class="btn btn-sm btn-primary">Review Posts</a>
                                    @endif
                                </div>
                            </div>
                            <br/>
                        @endif

                        @foreach ($posts as $post)
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="js-view-post" data-id="{{$post->id}}">{{$post->title}} (Posted on {{$post->created_at}})</a><br/>
                                    Posted by: {{$post->user->name}}
                                </div>
                            </div>
                            <br/>
                        @endforeach

                        {{$posts->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="post-dialog" style="display: none;">
        <div id="post-dialog-content"></div>
    </div>
@endsection

@section('additional scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
