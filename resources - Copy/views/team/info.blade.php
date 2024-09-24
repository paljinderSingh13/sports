@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
                    @if(auth()->user()->role != 'player')
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card rounded-5 mt-3">
                                    <div class="card-header rounded-5">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0">                      
                                                <h3 class="card-title fs-1 text-primary text-uppercase">Administrator List</h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">                      
                                                <a href="{{ route('administrator.create', base64_encode($id)) }}" class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4"><i class="far fa-plus-square"></i> Create Administrator</a>                      
                                            </div><!--end col-->

                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    
                                                    <th>Name</th>
                                                    <th>Type</th>                                                  
                                                    <th>Phone</th>                                                  
                                                    <th>Email</th>                                                  
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>       
                                                    @foreach($administrators as $administrator)
                                                        <tr>
                                                            <td>{{ $administrator->name }}</td> <!-- Administrator Name -->
                                                            <td>{{ $administrator->type }}</td> <!-- Designation -->
                                                            <td>{{ $administrator->phone }}</td> <!-- Phone Number -->
                                                            <td>{{ $administrator->email }}</td> <!-- Email -->
                                                            <td>
                                                                <span>{{ $administrator->status ? 'Active' : 'Inactive' }}</span> <!-- Status Display -->
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('administrator.updateStatus', $administrator->id) }}" method="POST" style="display:inline-block;" id="status-form-{{ $administrator->id }}">
                                                                @csrf
                                                                <button type="button" class="btn btn-sm {{ $administrator->status ? 'badge fs-14 bg-danger' : 'badge fs-14 bg-primary' }} btn-status" 
                                                                    onclick="confirmStatusChangeAdmin(event, '{{ $administrator->id }}')" style="width: 70px;" onmouseover="this.style.color='white'">
                                                                    {{ $administrator->status ? 'Inactive' : 'Active' }}
                                                                </button>
                                                            </form>
                                                                <a href="{{ route('administrator.edit', base64_encode($administrator->id)) }}" class="mb-1 mb-md-0 btn btn-sm btn-blue">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </a>
                                                                
                                                                <form action="{{ route('administrator.destroy', base64_encode($administrator->id)) }}" method="POST" style="display:inline-block;" id="delete-formAdmin-{{ $administrator->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteAdmin(event, '{{ $administrator->id }}')">
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
                        </div>
                    @endif 
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card rounded-5 mt-3 ">
                                    <div class=" card-header rounded-5">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title fs-1 text-primary text-uppercase">Players</h4>                      
                                            </div><!--end col-->
                                            @if(auth()->user()->role != 'player')
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">                      
                                                <a href="{{route('player.create',base64_encode($id))}}" class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4"><i class="far fa-plus-square"></i> Create a Player</a>                      
                                            </div>
                                            @endif
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_2">
                                                <thead class="table-light">
                                                <tr>
                                                    <!-- <th>ID</th> -->
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
                                                        <!-- <td>{{ $player->id }}</td> -->
                                                        <td>
                                                            @if($player->picture)
                                                                <img src="{{ asset($player->picture) }}" alt="logo" class="rounded-circle thumb-md me-1 d-inline">
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
                                                          <form action="{{ route('player.updateStatus', $player->id) }}" method="POST" style="display:inline-block;" id="status-formPlayer-{{ $player->id }}">
                                                                @csrf
                                                                <button type="button" class="btn btn-sm {{ $player->status ? 'badge fs-14 bg-danger' : 'badge fs-14 bg-primary' }} btn-status" 
                                                                    onclick="confirmStatusChangePlayer(event, '{{ $player->id }}')" style="width: 70px;" onmouseover="this.style.color='white'">
                                                                    {{ $player->status ? 'Inactive' : 'Active' }}
                                                                </button>
                                                            </form> 
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
                    @if(auth()->user()->role != 'player')    
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card rounded-5 mt-3 ">
                                    <div class=" card-header rounded-5">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title fs-1 text-primary text-uppercase">Schedule</h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">                      
                                                <a href="{{route('schedule.create',base64_encode($id))}}" class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4"><i class="far fa-plus-square"></i> Create a Schedule</a>                      
                                            </div>
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card rounded-5 mt-3 ">
                                        <div class=" card-header rounded-5">
                                            <div class="row align-items-center">
                                                <div class="col">                      
                                                    <h5 class="card-title fs-4 text-primary text-uppercase">Tournament</h5>                      
                                                </div><!--end col-->
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table datatable" id="datatable_2">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Opposing Team</th>
                                                        <th>Location</th>
                                                        <th>City</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($scheduleTournaments as $tournament)
                                                        <tr>
                                                            <td>{{ $tournament->type }}</td>
                                                            <td>{{ $tournament->opposing_team_id }}</td>
                                                            <td>{{ $tournament->location }}</td>
                                                            <td>{{ $tournament->city }}</td>
                                                            <td>{{ $tournament->date }}</td>
                                                            <td>{{ $tournament->time }}</td>
                                                            
                                                            <td>{{ $tournament->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                                <form action="{{ route('schedule.updateStatus', $tournament->id) }}" method="POST" style="display:inline-block;" id="status-formtour-{{ $tournament->id }}">
                                                                    @csrf
                                                                    <button type="button" class="btn btn-sm {{ $tournament->status ? 'badge fs-14 bg-danger' : 'badge fs-14 bg-primary' }} btn-status" 
                                                                        onclick="confirmStatusChangeTour(event, '{{ $tournament->id }}')" style="width: 70px;" onmouseover="this.style.color='white'">
                                                                        {{ $tournament->status ? 'Inactive' : 'Active' }}
                                                                    </button>
                                                                </form> 
                                                                <a href="{{ route('schedule.edit', base64_encode($tournament->id)) }}" class="mb-1 mb-md-0 btn btn-sm btn-blue">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </a>

                                                                <form action="{{ route('schedule.destroy', base64_encode($tournament->id)) }}" method="POST" style="display:inline-block;" id="delete-formT-{{ $tournament->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteT(event, '{{ $tournament->id }}')">
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
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card rounded-5 mt-3 ">
                                        <div class=" card-header rounded-5">
                                            <div class="row align-items-center">
                                                <div class="col">                      
                                                    <h5 class="card-title fs-4 text-primary text-uppercase">Practice</h5>                      
                                                </div><!--end col-->
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table datatable" id="datatable_2">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>Type</th>
                                                       
                                                        <th>Purpose Detail</th>
                                                        
                                                        <th>Date From</th>
                                                        <th>Date To</th>
                                                        <th>Time From</th>
                                                        <th>Time To</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($schedulePractice as $practice)
                                                        <tr>
                                                            <td>{{ $practice->type }}</td>
                                                            <td>{{ $practice->purpose_detail }}</td>
                                                            
                                                            <td>{{ $practice->date_from }}</td>
                                                            <td>{{ $practice->date_to }}</td>
                                                            <td>{{ $practice->timing_from }}</td>
                                                            <td>{{ $practice->timing_to }}</td>
                                                            <td>{{ $practice->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                                <form action="{{ route('schedule.updateStatus', $practice->id) }}" method="POST" style="display:inline-block;" id="status-formPractice-{{ $practice->id }}">
                                                                    @csrf
                                                                    <button type="button" class="btn btn-sm {{ $practice->status ? 'badge fs-14 bg-danger' : 'badge fs-14 bg-primary' }} btn-status" 
                                                                        onclick="confirmStatusChangePractice(event, '{{ $practice->id }}')" style="width: 70px;" onmouseover="this.style.color='white'">
                                                                        {{ $practice->status ? 'Inactive' : 'Active' }}
                                                                    </button>
                                                                </form> 
                                                                <a href="{{ route('schedule.edit', base64_encode($practice->id)) }}" class="mb-1 mb-md-0 btn btn-sm btn-blue">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </a>

                                                                <form action="{{ route('schedule.destroy', base64_encode($practice->id)) }}" method="POST" style="display:inline-block;" id="delete-formP-{{ $practice->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteP(event, '{{ $practice->id }}')">
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
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card rounded-5 mt-3 ">
                                        <div class=" card-header rounded-5">
                                            <div class="row align-items-center">
                                                <div class="col">                      
                                                    <h5 class="card-title fs-4 text-primary text-uppercase">Game</h5>                      
                                                </div><!--end col-->
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table datatable" id="datatable_2">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Purpose Detail</th>
                                                       
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                       
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($scheduleGame as $game)
                                                        <tr>
                                                            <td>{{ $game->type }}</td>
                                                            <td>{{ $game->purpose_detail }}</td>
                                                            
                                                            <td>{{ $game->date }}</td>
                                                            <td>{{ $game->time }}</td>
                                                            
                                                            <td>{{ $game->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                            <td>
                                                                <form action="{{ route('schedule.updateStatus', $game->id) }}" method="POST" style="display:inline-block;" id="status-formGame-{{ $game->id }}">
                                                                    @csrf
                                                                    <button type="button" class="btn btn-sm {{ $game->status ? 'badge fs-14 bg-danger' : 'badge fs-14 bg-primary' }} btn-status" 
                                                                        onclick="confirmStatusChangeGame(event, '{{ $game->id }}')" style="width: 70px;" onmouseover="this.style.color='white'">
                                                                        {{ $game->status ? 'Inactive' : 'Active' }}
                                                                    </button>
                                                                </form> 
                                                                <a href="{{ route('schedule.edit', base64_encode($game->id)) }}" class="mb-1 mb-md-0 btn btn-sm btn-blue">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </a>

                                                                <form action="{{ route('schedule.destroy', base64_encode($game->id)) }}" method="POST" style="display:inline-block;" id="delete-formG-{{ $game->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteG(event, '{{ $game->id }}')">
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
                            </div>
                        </div> 
                    @endif      
        </div>                             
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

    function confirmDeleteAdmin(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to delete this administrator",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the corresponding form
                document.getElementById(`delete-formAdmin-${id}`).submit();
            }
        });
    }

    function confirmDeleteT(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to delete this tournament?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-formT-' + id).submit();
        }
        });
    }
    function confirmDeleteG(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to delete this game?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-formG-' + id).submit();
        }
        });
    }
    function confirmDeleteP(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to delete this practice?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-formP-' + id).submit();
        }
        });
    }

    function confirmStatusChangeAdmin(event, Id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to change this Administrator status?',
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


    function confirmStatusChangePlayer(event, Id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to change this Player status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#085e96',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-formPlayer-' + Id).submit();
            }
        });
    }
    function confirmStatusChangeTour(event, Id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to change this Tournament status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#085e96',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-formtour-' + Id).submit();
            }
        });
    }

    function confirmStatusChangePractice(event, Id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to change this Practice status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#085e96',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-formPractice-' + Id).submit();
            }
        });
    }

     function confirmStatusChangeGame(event, Id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to change this Game status?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#085e96',
            cancelButtonColor: '#dd3333',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-formGame-' + Id).submit();
            }
        });
    }
   
</script>
@endsection