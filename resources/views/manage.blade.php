@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Posts</div>

                    <div class="panel-body">
                        @include('partials.post_list')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.post_dialog')
@endsection

@section('additional scripts')
    <script src="{{ asset('js/manage.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection