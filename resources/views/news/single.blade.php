@extends('layouts.main')
@section('content')
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <div class="float-left">
                    <h4><strong>{{ $article->category->name }}</strong></h4>
                </div>
                <p>{{ $article->article }}</p>
                <br><br>

                    Placeholder text by
                    <a href="http://spaceipsum.com/">Space Ipsum</a>
                    &middot; Images by
                    <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                </p>
            </div>
        </div>
    </div>
</article>
@endsection
