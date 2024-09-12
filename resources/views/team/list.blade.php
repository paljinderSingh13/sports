@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card rounded-5 mt-3">
                                    <div class="card-header rounded-5">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0">                      
                                                <h4 class="card-title fs-1 text-primary text-uppercase">Teams </h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">
                                            <a class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4" href="{{route('team.create',base64_encode($id))}}"><i class="far fa-plus-square"></i> Add Team</a>
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Age Group</th>
                                                    <th>Season</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($teams as $team)
                                                    <tr>
                                                        <td>{{ $team->name }}</td>
                                                        <td>{{ $team->age_group }}</td>
                                                        <td>{{ $team->season }}</td>
                                                        <td>
                                                        {{ $team->status ? 'Active' : 'Inactive' }}
                                                    </td>
                                                        <td>
                                                            <form action="{{ route('team.updateStatus', $team->id) }}" method="POST" style="display:inline-block;" id="status-form-{{ $team->id }}">
                                                                @csrf
                                                                <button type="button" class="btn btn-sm {{ $team->status ? 'badge fs-14 bg-danger' : 'badge fs-14 bg-primary' }} btn-status" 
                                                                    onclick="confirmStatusChange(event, '{{ $team->id }}')">
                                                                    {{ $team->status ? 'Inactive' : 'Active' }}
                                                                </button>
                                                            </form>
                                                            &nbsp;
                                                            <a href="{{ route('administrator.create', $team->id) }}" class="btn btn-success btn-sm">
                                                                <i class="far fa-user"></i> Administrator
                                                            </a>
                                                            &nbsp;
                                                            <a href="{{ route('team.info', base64_encode($team->id)) }}" class="mb-1 mb-md-0 btn btn-sm btn-success">Team Info</a>
                                                            <a href="{{ route('team.edit', $team->id) }}" class="btn btn-blue btn-sm">
                                                                <i class="far fa-edit"></i> Edit
                                                            </a>
                                                            <form action="{{ route('team.destroy',base64_encode($team->id)) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $team->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ $team->id }}')">
                                                                    <i class="far fa-trash-alt"></i> Delete
                                                                </button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                 
                                                </tbody>
                                            </table>
                                        </div>   
                                    </div><!--end card-body--> 
                                </div><!--end card--> 
                            </div> <!--end col-->                                                        
                        </div><!--end row-->

                                                        
                    </div><!-- container -->

@endsection
@section('js')
    <script>
    // Function to show the SweetAlert2 confirmation dialog for delete
    function confirmDelete(event, teamId) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to delete this club?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#085e96',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + teamId).submit();
            }
        });
    }

    // Function to show the SweetAlert2 confirmation dialog for status change
    function confirmStatusChange(event, teamId) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to change this team status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#085e96',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-form-' + teamId).submit();
            }
        });
    }
</script>
@endsection