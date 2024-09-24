@extends('layouts.master')
@section('content')


 <div class="content-body">
               <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Team</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form enctype="multipart/form-data" action="{{ route('team.update', base64_encode($team->id)) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Include PUT method for updates -->
                                        <input type="hidden" class="form-control form-control-lg" id="club_id" value="{{ $team->club_id }}" name="club_id" required>

                                        <div class="row">
                                            <!-- Team Name Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Team Name <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Team Name" value="{{ old('name', $team->name) }}" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Age Group Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Age Group <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('age_group') is-invalid @enderror" placeholder="Age Group" id="age_group" name="age_group" value="{{ old('age_group', $team->age_group) }}" required>
                                                @error('age_group')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Season Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Season <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('season') is-invalid @enderror" id="season" name="season" placeholder="Season" value="{{ old('season', $team->season) }}" required>
                                                @error('season')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Status Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Status</label>
                                                <select id="inputState" name="status" class="default-select form-control wide @error('status') is-invalid @enderror">
                                                    <option value="" disabled>Choose...</option>
                                                    <option value="1" {{ old('status', $team->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $team->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="{{ route('team.list', base64_encode($team->club_id)) }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    
    
@endsection