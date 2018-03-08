@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Posts</div>

                    <div class="panel-body">
                        @foreach ($posts as $post)
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#">{{$post->title}} (Posted on {{$post->created_at}})</a><br/>
                                    Posted by: {{$post->user->name}}
                                </div>
                                <br/>
                                <div class="col-md-12">
                                    {{str_limit($post->content, 50)}}
                                </div>
                                @if ($post->isPending())
                                    <br/>
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-sm btn-primary js-publish-post" data-id="{{$post->id}}">Publish</a>
                                    </div>
                                @endif
                            </div>
                            <br/>
                        @endforeach

                        {{$posts->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional scripts')
    <script src="{{ asset('js/manage.js') }}"></script>
@endsection