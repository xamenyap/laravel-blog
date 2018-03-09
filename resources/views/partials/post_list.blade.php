@foreach ($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="js-view-post" data-id="{{$post->id}}">{{$post->title}} (Posted on {{$post->created_at->format('Y-m-d H:i')}})</a><br/>
            Posted by: {{$post->user->name}}
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