@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">News</h4>
                            <p class="card-category">Here you can see all the news on the website</p>
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
                                        Category
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Post by
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    </thead>
                                    <tbody>
                                    @forelse($newsList as $news)
                                        <tr>
                                            <td>
                                                {{ $news->id }}
                                            </td>
                                            <td>
                                                {{ $news->title }}
                                            </td>
                                            <td>
                                                {{ $news->category->name ?? 'Нет'}}
                                            </td>
                                            <td>
                                                {{ $news->status->news_status_name }}
                                            </td>
                                            <td class="text-primary">
                                                {{ $news->updated_at }}
                                            </td>
                                            <td class="td-actions text-left">
                                                <a href="{{ route('admin.news.edit',  ['news' => $news]) }}"  rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="javascript:" data-id = '{{ $news->id }}'   rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="6">Nothing to show</td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                </table>
                                <a href="{{ route('admin.news.create') }}" class="btn btn-success">Add news</a>
                            </div>
                            <div class="float-right mt-3 mx-2">
                                {{ $newsList->links() }}
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
                        url: '/admin/news/' + id,
                        complete: function ()  {
                            //alert("News with id  = "+  id + " was deleted");
                            location.reload();
                        }
                    })
                }
            })
        })
    </script>
@endpush

