@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card rounded-5 mt-3 ">
                                    <div class=" card-header rounded-5">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title fs-1 text-primary text-uppercase">Players</h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">                      
                                                <a href="{{route('player.create',base64_encode($id))}}" class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4"><i class="far fa-plus-square"></i> Create a Player</a>                      
                                            </div>
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_2">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Picture</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Priority</th>
                                                    <th>Date of Birth</th>
                                                    <th>Proof ID</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($players as $player)
                                                    <tr>
                                                        <td>{{ $player->id }}</td>
                                                        <td>
                                                            @if($player->picture)
                                                                <img src="{{asset($player->picture)}}" alt="Player Picture" width="50">
                                                            @endif
                                                        </td>
                                                        <td>{{ $player->name }}</td>
                                                        <td>{{ $player->type }}</td>
                                                        <td>{{ $player->priority }}</td>
                                                        <td>{{ $player->dob }}</td>
                                                        <td>
                                                            @if($player->proof_id)
                                                                <a href="{{asset($player->proof_id)}}" target="_blank">View Document</a>
                                                            @endif
                                                        </td>
                                                        <td>{{ $player->phone }}</td>
                                                        <td>{{ $player->email }}</td>
                                                        <td>{{ $player->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                        <td>
                                                            <a href="{{ route('player.edit',base64_encode($player->id)) }}" class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</a>
                                                             
                                                              <form action="{{route('player.destroy', base64_encode($player->id)) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $player->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ $player->id }}')">
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
            title: 'Are you sure you want to delete this player?',
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

   
</script>
@endsection