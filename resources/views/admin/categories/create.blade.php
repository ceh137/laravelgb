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
                            <form method="post" action="{{ route('admin.categories.store') }}">
                                @csrf
                                <div class="form-group my-5">
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                                <div class="form-group my-5">
                                    <textarea type="text" name="desc" class="form-control" placeholder="Description"></textarea>
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



