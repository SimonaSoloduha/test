@extends('layouts.main')

@section('title-block')Все блоги@endsection
<div class="edica-loader"></div>
<header class="edica-header">
    @section('content')
        <main class="blog">
            <div class="container">
                <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
                <section class="featured-posts-section">
                    <div class="row">
                        @foreach($data as $el)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ $el->photo }}" alt="blog post">
                                </div>
                                <p class="blog-post-category">Автор: {{ $el->author }}</p>
                                <a href="{{ route('blog-one', $el->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $el->title }}</h6>
                                </a>
                                <a href="{{ route('blog-one', $el->id) }}" class="blog-post-permalink">Посмотреть
                                    детали</a>
                            </div>
                        @endforeach
                    </div>
                    {{$data->links()}}
                </section>
            </div>
        </main>
    @endsection
</header>
