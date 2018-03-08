@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Post</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        @if (session('save_success'))
                            <p class="text-success">Post created successfully</p>
                        @endif
                        </div>
                    </div>
                    <div class="row">
                        <form class="form-horizontal" method="POST" action="{{route('save')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Title:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" placeholder="Enter post title" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Content:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="content" placeholder="Enter post content" name="content" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection