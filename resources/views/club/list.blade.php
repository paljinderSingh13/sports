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
                                                <h3 class="card-title fs-1 text-primary text-uppercase">List of Club</h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">                      
                                                <a href="{{route('club.create')}}" class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4"><i class="far fa-plus-square"></i> Create a Club</a>                      
                                            </div><!--end col-->

                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Address</th>                
                                                    <th>City</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>              
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($clubs as $club)
                                                <tr>
                                                    <td><img src="{{ asset($club->logo) }}" alt="Logo" width="50">
                                                    </td>
                                                    <td>{{ $club->name }}</td>
                                                    <td>{{ $club->address }}</td>
                                                    <td>{{ $club->city }}</td>
                                                    <td>{{ $club->phone }}</td>
                                                    <td>{{ $club->email }}</td>
                                                    <!-- <td>{{ $club->status }}</td> -->
                                                    <td>
                                                        {{ $club->status ? 'Active' : 'Inactive' }}
                                                    </td>
                                                    <td>
                                                    <form action="{{ route('club.updateStatus', $club->id) }}" method="POST" style="display:inline-block;" id="status-form-{{ $club->id }}">
                                                                @csrf
                                                                <button type="button" class="btn btn-sm {{ $club->status ? 'badge fs-14 bg-danger' : 'badge fs-14 bg-primary' }} btn-status" 
                                                                    onclick="confirmStatusChange(event, '{{ $club->id }}')">
                                                                    {{ $club->status ? 'Inactive' : 'Active' }}
                                                                </button>
                                                    </form>
                                                    <a class="mb-1 mb-md-0 btn btn-sm btn-primary"
                                                            href="{{ route('team.list', base64_encode($club->id)) }}"><i class="fas fa-users"></i> Team</a>
                                                            <a
                                                            href="{{ route('club.edit', base64_encode($club->id)) }}"
                                                            class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</a>

                                                            <form action="{{ route('club.destroy',base64_encode($club->id)) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $club->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ $club->id }}')">
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
    function confirmDelete(event, Id) {
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
                document.getElementById('delete-form-' + Id).submit();
            }
        });
    }

    // Function to show the SweetAlert2 confirmation dialog for status change
    function confirmStatusChange(event, Id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to change this club status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#085e96',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-form-' + Id).submit();
            }
        });
    }
</script>
@endsection