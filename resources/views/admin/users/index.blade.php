@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Users</h4>
                            <p class="card-category">Here you can see all the users of the website</p>
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
                                        Username
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Created time
                                    </th>

                                    <th>
                                        Action
                                    </th>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>
                                                {{   $user->id }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->created_at }}
                                            </td>

                                            <td class="td-actions text-left">
                                                <a href="{{ route('admin.users.edit',  ['user' => $user]) }}"  rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="javascript:" data-id = '{{ $user->id }}'   rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
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
                                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Add user</a>
                            </div>
                            <div class="float-right mt-3 mx-2">
                                {{ $users->links() }}
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
                        url: '/admin/users/' + id,
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

