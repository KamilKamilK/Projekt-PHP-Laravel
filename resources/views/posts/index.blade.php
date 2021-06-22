@extends('layouts.app')


@section('title', 'Blog Posts')

@section('content')
    <div class="row">
        <div class="col-8">
            {{--    @each('posts.partials.post', $posts, 'post')--}}
            @forelse($posts as $key=> $post)
                @include('posts.partials.post', [])
            @empty
                No blog posts yet!
            @endforelse

            {{--    <h1>hello world!</h1>--}}
            {{--    <div>--}}
            {{--        @for ($i=0;$i <10; $i++)--}}
            {{--            <div>The current value is {{$i}}</div>--}}
            {{--        @endfor--}}
            {{--    </div>--}}
            {{--    <div>--}}
            {{--        @php $done = false @endphp--}}

            {{--        @while(!$done)--}}
            {{--            <div>--}}
            {{--                I'm not done--}}
            {{--            </div>--}}

            {{--            @php--}}
            {{--            if(random_int(0,1) === 1) $done = true--}}
            {{--            @endphp--}}
            {{--        @endwhile--}}
            {{--    </div>--}}
        </div>
        <div class="col-4">
            <div class="container">
                <div class="row">
                    {{--                    Zastąpienie kodu class="card" wykorzystując blade component @card--}}
                    {{--                    Przykład kiedy w foreach jest nie tylko kolekcja--}}

                    @card(['title'=> 'Most Commented'])
                    @slot('subtitle')
                        What people are currently talking about
                    @endslot
                    @slot('items')
                        @foreach($mostCommented as $post)
                            <li class="list-group-item">
                                <a href="{{route('posts.show', ['post'=> $post->id]) }}">
                                    {{$post->title}}
                                </a>
                            </li>
                        @endforeach
                    @endslot
                    @endcard

{{--                    <div class="card" style="width: 100%;">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Most Commented</h5>--}}
{{--                            <h6 class="card-subtitle mb-2 text-muted">What people talking about</h6>--}}
{{--                            <ul class="list-group list-group-flush">--}}
{{--                                @foreach($mostCommented as $post)--}}
{{--                                    <li class="list-group-item">--}}
{{--                                        <a href="{{route('posts.show', ['post'=> $post->id]) }}">--}}
{{--                                            {{$post->title}}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

                <div class="row mt-4">

{{--                    Zastąpienie kodu class="card" wykorzystując blade component @card--}}
{{--                    Przykład kiedy w foreach jest kolekcja--}}

                    {{--                    <div class="card" style="width: 100%;">--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <h5 class="card-title">Most Active</h5>--}}
                    {{--                            <h6 class="card-subtitle mb-2 text-muted">Users with most posts written</h6>--}}
                    {{--                            <ul class="list-group list-group-flush">--}}
                    {{--                                @foreach($mostActive as $user)--}}
                    {{--                                    <li class="list-group-item">--}}
                    {{--                                        {{$user->name}}--}}
                    {{--                                    </li>--}}
                    {{--                                @endforeach--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                    @card(['title'=> 'Most Active'])
                    @slot('subtitle')
                        Writters with most posts written
                    @endslot
                    @slot('items', collect($mostActive)->pluck('name'))
                    @endcard
                </div>

                <div class="row mt-4">

                    @card(['title'=> 'Most Active Last Month'])
                    @slot('subtitle')
                        Users with most posts written in last month
                    @endslot
                    @slot('items', collect($mostActiveLastMonth)->pluck('name'))
                    @endcard
                </div>
            </div>
        </div>
@endsection
