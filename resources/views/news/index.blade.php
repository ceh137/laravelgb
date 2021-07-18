@extends('layouts.main')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @forelse($newsList as  $news)
                    <div class="post-preview">
                        <a href="{{ route('news.single' , ['news' => $news]) }}">
                            <h2 class="post-title">{{ $news->title }}</h2>
                            <h5 class="post-subtitle">Category <strong>{{ $news->category->name }}</strong></h5>
                        </a>
                        <p class="post-meta">
                            Posted by  {{ optional($news)->author }}
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2021
                        </p>
                    </div>
                    <hr class="my-4" />
                @empty
                    <h3 class="text-center">Nothing to show</h3>
                    <!-- Divider-->
                @endforelse

            </div>
            <div class="my-5">
                {{ $newsList->links() }}
            </div>
        </div>

    </div>
@endsection

