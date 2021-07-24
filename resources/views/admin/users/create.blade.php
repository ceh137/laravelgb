@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Create a  User</h4>
                            <p class="card-category">Here you can create new  user</p>
                        </div>
                        <div class=" mx-1 p-5">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('admin.users.store') }}">
                                @csrf
                                <div class="form-group my-5">
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group my-5">
                                    <input type="mail" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group my-5">
                                    <input type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group my-5">
                                    <select  class="form-control" name="is_admin">
                                        <option  value="0">Пользователь</option>

                                        <option  value="1">Администратор</option>

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


