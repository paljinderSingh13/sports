@extends('layouts.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <!-- Page Head -->
            <!-- <div class="page-head">
                        <div class="row">
                            <div class="col-sm-6 mb-sm-4 mb-3">
                                <h3 class="mb-0">List of team</h3>
                                
                            </div>
                            <div class="col-sm-6 mb-4 text-sm-end">
                                 <a href="javascript:voit(0);" class="btn btn-outline-secondary">Add Task</a>
                                <a href="javascript:voit(0);" class="btn btn-primary ms-2 cbtn">Create a Project</a>
                            </div>
                        </div>
                    </div> -->
            
            <div class="row">
               

                @if(auth()->user()->role != 'player')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Administrator List</h4>
                            <a href="{{ route('administrator.add') }}"
                                class="btn btn-primary ms-2 cbtn">Create Administrator</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Team</th>
                                            <th>Type</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($administrators as $admin)
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>
                                                    @if($admin->teamAdmin)
                                                    {{ $admin->teamAdmin['name'] }}
                                                    @endif
                                                </td>
                                                <td>{{ $admin->type }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->status ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <div class="dropdown ms-auto c-pointer">
                                                        <button type="button" class="btn btn-primary light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                        r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#activeModalCenterAdmin"
                                                                data-admin-id="{{ $admin->id }}"
                                                                data-admin-name="{{ $admin->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('administrator.edit', base64_encode($admin->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModalCenterAdmin"
                                                                data-admin-id="{{ $admin->id }}"
                                                                data-admin-name="{{ $admin->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="modal fade" id="deleteModalCenterAdmin" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                            <h3 id="delete-modal-title">Are you sure you want to delete this admin?</h3>
                            <p>You won't be able to revert this!</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <form method="POST" id="delete-formAdmin">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Yes, Delete It!</button>
                        </form>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Status Modal -->
        <div class="modal fade" id="activeModalCenterAdmin" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                            <h3 id="active-modal-title">Are you sure you want to change the status of this admin?</h3>
                            <p>You won't be able to revert this!</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <form method="POST" id="active-formAdmin">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary">Yes!</button>
                        </form>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    @endsection
    @section('js')
        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
                // Delete modal
                $('#deleteModalCenter').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + teamName + '?');
                    modal.find('#delete-form').attr('action', '{{ route('clubadm.destroy', ':id') }}'.replace(
                        ':id', btoa(teamId)));
                });

                $('#deleteModalCenterTeam').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + teamName + '?');
                    modal.find('#delete-form').attr('action', '{{ route('team.destroy', ':id') }}'.replace(
                        ':id', btoa(teamId)));
                });

                // Active status modal
                $('#activeModalCenter').on('show.bs.modal', function(event) {

                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name
                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        teamName + '?');
                    modal.find('#active-form').attr('action', '{{ route('clubadm.updateStatus', ':id') }}'
                        .replace(':id', teamId));
                });

                $('#activeModalCenterTeam').on('show.bs.modal', function(event) {

                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name
                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        teamName + '?');
                    modal.find('#active-form').attr('action', '{{ route('team.updateStatus', ':id') }}'
                        .replace(':id', teamId));
                    });

                 // player
                $('#deleteModalCenterPlayer').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var playerId = button.data('player-id'); // Extract player ID
                    var playerName = button.data('player-name'); // Extract player name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + playerName +
                        '?');
                    modal.find('#delete-formPlayer').attr('action', '{{ route('player.destroy', ':id') }}'.replace(
                        ':id', btoa(playerId)));
                });
                $('#activeModalCenterPlayer').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var playerId = button.data('player-id'); // Extract player ID
                    var playerName = button.data('player-name'); // Extract player name

                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        playerName + '?');
                    modal.find('#active-formPlayer').attr('action', '{{ route('player.updateStatus', ':id') }}'
                        .replace(':id', btoa(playerId)));
                });



            });
        </script>
    @endsection