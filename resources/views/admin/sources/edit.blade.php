@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Source</h4>
                            <p class="card-category">Here you can update source</p>
                        </div>
                        <div class=" mx-1 p-5">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('admin.source.update', ['source' => $source]) }}">
                                @method('put')
                                @csrf
                                <div class="form-group my-5">
                                    <input type="text" value="{{ $source->source_name }}" name="source_name" class="form-control" placeholder='Title'>
                                </div>
                                <div class="form-group my-5">
                                    <input type="text" value="{{ $source->url }}" name="url" class="form-control" placeholder='URL'>
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



