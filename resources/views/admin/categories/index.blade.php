@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Categories</h4>
                            <p class="card-category">Here you can see all the categories on the website</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Desc
                                    </th>
                                    <th>
                                        Made By
                                    </th>
                                    <th>
                                        Post
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    </thead>
                                    <tbody>
                                    @forelse($categoryList as $key => $category)
                                    <tr>
                                        <td>
                                            {{ $key }}
                                        </td>
                                        <td>
                                            {{ $category['title'] }}
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            Me
                                        </td>
                                        <td class="text-primary">
                                            {{ now() }}
                                        </td>
                                        <td class="td-actions text-left">
                                            <a href="{{ route('admin.categories.update',  ['category' => $key]) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('admin.categories.destroy', ['category' => $key]) }}" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr class="my-5">
                                            <td colspan="6">Nothing to show</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
