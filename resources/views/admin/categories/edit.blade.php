@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Create Category</h4>
                            <p class="card-category">Here you can create new category</p>
                        </div>
                        <div class=" mx-auto p-5">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form method="post" action="{{ route('admin.categories.update', $category) }}">
                                @csrf
                                @method('put')
                                <div class="form-group my-5">
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Title">
                                </div>
                                <div class="form-group my-5">
                                    <textarea type="text" name="desc" class="form-control" placeholder="Description">{{ $category->desc }}</textarea>
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
