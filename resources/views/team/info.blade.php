@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Administrators</h4>                      
                                            </div><!--end col-->
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Admin Id.</th>
                                                    <th>Role</th>
                                                    <th>start date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    <tr>
                                                        <td>Theodore Duran</td><td>8971</td><td>Head Coach</td><td>under 16</td><td>97%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kylie Bishop</td><td>3147</td><td>Norman</td><td>2005/09/08</td><td>63%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Willow Gilliam</td><td>3497</td><td>Amqui</td><td>2009/29/11</td><td>30%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Blossom Dickerson</td><td>5018</td><td>Kempten</td><td>2006/11/09</td><td>17%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Elliott Snyder</td><td>3925</td><td>Enines</td><td>2006/03/08</td><td>57%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Castor Pugh</td><td>9488</td><td>Neath</td><td>2014/23/12</td><td>93%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pearl Carlson</td><td>6231</td><td>Cobourg</td><td>2014/31/08</td><td>100%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Deirdre Bridges</td><td>1579</td><td>Eberswalde-Finow</td><td>2014/26/08</td><td>44%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Daniel Baldwin</td><td>6095</td><td>Moircy</td><td>2000/11/01</td><td>33%</td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Pearl Carlson</td><td>6231</td><td>Cobourg</td><td>2014/31/08</td><td>100%</td>
                                                    </tr>  
                                                    <tr>
                                                        <td>Unity Pugh</td>
                                                        <td>9958</td>
                                                        <td>Curicó</td>
                                                        <td>2005/02/11</td>
                                                        <td>37%</td>
                                                    </tr>    
                                                     <tr>
                                                        <td>Elliott Snyder</td><td>3925</td><td>Enines</td><td>2006/03/08</td><td>57%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>   
                                    </div><!--end card-body--> 
                                </div><!--end card--> 
                            </div> <!--end col-->                                                        
                        </div><!--end row-->

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Players</h4>                      
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
                                                             <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" onclick="setDeleteFormAction('{{ route('player.destroy', base64_encode($player->id)) }}')">Delete</button>
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
        
<!-- Bootstrap Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this player? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <form id="deleteForm" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


@endsection
@section('js')
<script>
  function setDeleteFormAction(actionUrl) {
    var deleteForm = document.getElementById('deleteForm');
    deleteForm.action = actionUrl;
  }
</script>
@endsection