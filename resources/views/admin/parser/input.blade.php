@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Parse News</h4>
                            <p class="card-category">Here you can parse relevant news</p>
                        </div>
                        <div class=" mx-1 p-5">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('admin.parse.save') }}">
                                @csrf
                                <div class="form-group my-5">
                                    <input type="text" value="{{ old('url') }}" name="url" class="form-control" placeholder="Url to parse from">
                                </div>

                                <input type="submit" value="PARSE" class="btn btn-default">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

