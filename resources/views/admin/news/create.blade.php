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
                        <div class=" mx-auto p-5">
                            <form method="post" action="{{ route('admin.news.store') }}">
                                @csrf
                                <div class="form-group my-5">
                                    <input type="text" name="heading" class="form-control" placeholder="Heading">
                                </div>
                                <div class="form-group my-5">
                                    <select  class="form-control" name="category">
                                        @foreach($categories as $key => $category)
                                            <option value="{{ $key }}">{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group my-5">

                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article</label>
                                        <textarea class="form-control" name="article" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="status" class="form-control">
                                        <option value="1">DRAFT</option>
                                        <option value="2">PROCESSING</option>
                                        <option value="3">PUBLISHED</option>
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


