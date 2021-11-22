@extends('layouts.main')

@section('title-block') {{ $data->title }} @endsection


<div class="edica-loader"></div>
<header class="edica-header">
    @section('content')
        @if($errors->any())
            <div class="alert-dark">
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>
                            {{ $errors }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main class="blog">
            <div class="container">
                <h1 class="edica-page-title" data-aos="fade-up">{{ $data->title }}</h1>
                <section class="featured-posts-section">
                    <div class="row">
                        <div class="col-md-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ $data->photo }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">Автор: {{ $data->author }}</p>
                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $data->title }}</h6>
                            </a>
                            <p class="blog-post-category">{{ $data->text }}</p>
                            <p class="blog-post-category">Дата публикации: {{ $data->updated_at }}</p>

                            <a href="{{ route('blog-update', $data->id)}}" class="blog-post-permalink">Редактировать</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 contact-form-wrapper">
                            <h5 data-aos="fade-up">Добавить комментарий</h5>
                            <form action="{{ route('blog-comment', $data->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6" data-aos="fade-up">
                                        <label for="name">Имя</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Your full name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" data-aos="fade-up" data-aos-delay="100">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6" data-aos="fade-up" data-aos-delay="200">
                                        <label for="message">Комментарий</label>
                                        <textarea name="message" id="message" rows="6"
                                                  class="form-control">Комментарий</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning btn-lg" data-aos-delay="300">Добавить
                                    комментарий
                                </button>
                            </form>
                        </div>

                        <div class="col-md-4 contact-sidebar" data-aos="fade-left">
                            <h5>Комментарии</h5>
                            @foreach($comments as $com)
                                <h5>{{ $com->name }}</h5>
                                <p>{{ $com->message }}<br>{{ $com->updated_at }}</p>
                            @endforeach
                        </div>
                    </div>

                </section>
            </div>
        </main>
    @endsection
</header>
