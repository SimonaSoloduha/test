@extends('layouts.main')

@section('title-block')Добавить блог@endsection

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

    <div class="container">
        <div class="row">
            <div class="col-lg-11 mx-auto">
                <h1 class="edica-page-title" data-aos="fade-up">Добавить блог</h1>
                <section class="edica-contact py-5 mb-5">

                    <form action="{{ route ('blog-add-submit') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6" data-aos="fade-up">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Введите название">
                            </div>
                            <div class="form-group col-md-6" data-aos="fade-up">
                                <label for="photo">Фото</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <div class="form-group col-md-6" data-aos="fade-up">
                                <label for="title">Введите текст</label>
                                <textarea name="text" id="text" rows="9" class="form-control">Введите текст</textarea>
                            </div>
                            <div class="form-group col-md-6" data-aos="fade-up">
                                <label for="author">Автор</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Имя">
                            </div>
                            <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up"
                                    data-aos-delay="300">Добавить
                            </button>

                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

@endsection
