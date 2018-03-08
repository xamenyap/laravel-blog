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

                        @include('partials.post_list')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.post_dialog')
@endsection

@section('additional scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
