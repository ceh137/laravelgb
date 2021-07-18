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
                            @include('admin.components.success')
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
                                        Posts count
                                    </th>
                                    <th>
                                        Updated
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    </thead>
                                    <tbody>

                                    @forelse($categoryList as $category)

                                    <tr>
                                        <td>
                                            {{ $category->id }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->desc }}
                                        </td>
                                        <td>
                                            {{ count($category->news) }}
                                        </td>
                                        <td class="text-primary">
                                            {{ $category->updated_at }}
                                        </td>
                                        <td class="td-actions text-left">

                                            <a href="{{ route('admin.categories.edit', $category) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="javascript:" type="button" rel="tooltip" title="Remove" data-id="{{ $category->id }}" class="btn btn-danger btn-link btn-sm delete">
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
                            <div class="float-right mt-3 mx-2">
                                {{ $categoryList->links() }}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $('.delete').on('click', function () {
                let  id = $(this).data('id');
                if (confirm("Confirm delete ?")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '/admin/categories/' + id,
                        complete: function ()  {
                            //alert("Category with id  = "+  id + " was deleted");
                            location.reload();
                        }
                    })
                }
            })
        })
    </script>
@endpush

