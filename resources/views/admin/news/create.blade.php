@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Create News</h4>
                            <p class="card-category">Here you can create relevant news</p>
                        </div>
                        <div class=" mx-1 p-5">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('admin.news.store') }}">
                                @csrf
                                <div class="form-group my-5">
                                    <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Heading">
                                </div>
                                <div class="form-group my-5">
                                    <select  class="form-control" name="category_id">
                                        @foreach($categories as  $category)
                                            <option @if($category->id === old('category_id')) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group my-5">

                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article</label>
                                        <textarea class="form-control" name="article" rows="5">{{ old('article') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="status_id" class="form-control">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->news_status_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="submit" value="SEND" class="btn btn-default">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


