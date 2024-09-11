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
                                                  <!--   <tr>                                                   
                                                        <td>Sahil </td>
                                                        <td>Amritsar</td> 
                                                        <td>123456987</td> 
                                                        <td>abc@gmail.com</td> 
                                                        <td> 
                                                            <span class="badge fs-14 bg-primary">Active</span> 
                                                            <span class="badge fs-14 bg-danger">Inactive</span> 
                                                        </td>
                                                        <td>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr> -->
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
                                                        <button type="button" onclick="executeExample('clubstatus')" class="btn btn-sm {{ $club->status ? ' fs-14 btn-danger' : ' fs-14 btn-primary' }} btn-status" data-form-action="{{ route('club.updateStatus', $club->id) }}">{{ $club->status ? 'Inactive' : 'Active' }}
                                                    </button>
                                                    <a class="mb-1 mb-md-0 btn btn-sm btn-primary"
                                                            href="{{ route('team.list', base64_encode($club->id)) }}"><i class="fas fa-users"></i> Team</a>
                                                            <a
                                                            href="{{ route('club.edit', base64_encode($club->id)) }}"
                                                            class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</a>
                                                            <button type="button" onclick="executeExample('warningConfirm')"  class="mb-1 mb-md-0 btn btn-sm btn-danger" data-bs-toggle="modal" data-id="{{ base64_encode($club->id) }}"><i class="far fa-trash-alt"></i> Delete</button></td>
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
        


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this club?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="statusModalLabel">Confirm Status Change</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to change the status of this club?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <form id="statusForm" action="" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger" id="confirmButton">Confirm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Button that triggered the modal
                var clubId = button.getAttribute('data-id'); // Extract info from data-* attributes
                var form = deleteModal.querySelector('form');
                form.action = '/club/destroy/' + clubId; // Set form action dynamically
            });
        });
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // When the form button is clicked, show the modal and set the form action
        document.querySelectorAll('.btn-status').forEach(function (button) {
          button.addEventListener('click', function () {
            // Get the form action from the button's data attribute
            var formAction = this.getAttribute('data-form-action');
            document.getElementById('statusForm').action = formAction;
            
            // Show the modal
            var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();
          });
        });
      });
    </script>
@endsection