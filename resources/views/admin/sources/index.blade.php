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
                                        URL
                                    </th>
                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Updated
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    </thead>
                                    <tbody>
                                    @forelse($sources as $source)
                                        <tr>
                                            <td>
                                                {{ $source->id }}
                                            </td>
                                            <td>
                                                {{ $source->url }}
                                            </td>
                                            <td>
                                                {{ $source->source_name }}
                                            </td>
                                            <td class="text-primary">
                                                {{ $source->updated_at }}
                                            </td>
                                            <td class="td-actions text-left">
                                                <a href="{{ route('admin.source.edit',  ['source' => $source]) }}"  rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="javascript:" data-id = '{{ $source->id }}'   rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
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
                                <a href="{{ route('admin.source.create') }}" class="btn btn-success">Add source</a>
                            </div>
                            <div class="float-right mt-3 mx-2">
                                {{ $sources->links() }}
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
                        url: '/admin/source/' + id,
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


