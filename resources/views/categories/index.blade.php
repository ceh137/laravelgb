@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @forelse($categoryList as $category)
                <div class="post-preview">
                    <a href="{{ route('cat.news', ['cat_id' => $category->category_id]) }}">
                        <h2 class="post-title">{{ $category->name }}</h2>
                        <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on September 24, 2021
                    </p>
                </div>
                    <hr class="my-4" />
            @empty
                    <h3 class="text-center">Записей Нет</h3>
                <!-- Divider-->
                @endforelse

            </div>
        </div>
    </div>
@endsection
