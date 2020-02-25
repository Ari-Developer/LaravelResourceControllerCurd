@extends('layout.app')

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <h3>All Users</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email-Id</th>
                        <th>Mobile Number</th>
                        <th style="width:200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl = 1; @endphp
                    @forelse($allUsers as $user)
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phno }}</td>
                            <td>
                                <a href="{{ route('users.edit', array('id' => $user->id)) }}"
                                class="btn btn-sm btn-info">Edit</a>

                                <button type="button" data-id="{{ $user->id }}" class="btn btn-danger delBTN btn-sm">Delete</button>

                                <a href="{{ route('users.show', array('id' => $user->id)) }}"
                                class="btn btn-sm btn-dark">Show</a>

                                <form id="DeleteForm_{{ $user->id }}" action="{{ route('users.destroy', array('id' => $user->id)) }}" method="post">
                                    {{ csrf_field() }}{{ method_field('DELETE') }} 
                                </form>
                            </td>
                        </tr>
                        @php $sl++; @endphp
                    @empty
                    @endforelse
                </tbody>
            </table>
            @if(isset($allUsers)){{ $allUsers->links() }}@endif
        </div>
    </div>
@endsection

@push('page_js')
<script>
$( function() { 
    $('.delBTN').on('click', function() { 
        if(confirm('Are you sure you want to delete this user ?')) {
            $('#DeleteForm_' + $(this).data('id')).submit();
        }
    } );
} );
</script>
@endpush