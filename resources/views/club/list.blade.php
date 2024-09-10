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
                                        <h4 class="card-title">Club List</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
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
                                                <th>Contact Name</th>
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
                                                    <td>{{ $club->contact_name }}</td>
                                                    <td>{{ $club->phone }}</td>
                                                    <td>{{ $club->email }}</td>
                                                    <!-- <td>{{ $club->status }}</td> -->
                                                    <td>
                                                        {{ $club->status ? 'Activate' : 'Deactivate' }}
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm {{ $club->status ? 'btn-danger' : 'btn-success' }} btn-status" data-form-action="{{ route('club.updateStatus', $club->id) }}">{{ $club->status ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                    <a class="btn btn-primary py-0 px-1"
                                                            href="{{ route('team.list', base64_encode($club->id)) }}"><i class="fa fa-list" title="Team"></i> </a><a
                                                            href="{{ route('club.edit', base64_encode($club->id)) }}"
                                                            class="btn btn-warning btn-sm"><i class="fa fa-edit" title="Edit"></i></a><button type="button"
                                                            class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            data-id="{{ base64_encode($club->id) }}"><i class="fa fa-trash" title="Delete"></i></button></td>
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
        </div>
    </div>
    <!-- Modal HTML -->
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