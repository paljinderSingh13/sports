@extends('layouts.master')
@section('content')
<div class="content-body">
               <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Schedule</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
               <form  action="{{ route('schedule.update', base64_encode($schedule->id)) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="team_id" value="{{ $schedule->team_id }}">

                                <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="Type" class="form-label">Type <span class="text-danger">*</span></label>
                                    <select class="default-select form-control wide @error('type') is-invalid @enderror" id="Type" name="type" required>
                                        <option selected>Select Type</option>
                                        <option value="Tournaments" {{ $schedule->type == 'Tournaments' ? 'selected' : '' }}>Tournaments</option>
                                        <option value="Game" {{ $schedule->type == 'Game' ? 'selected' : '' }}>Game</option>
                                        <option value="Practice" {{ $schedule->type == 'Practice' ? 'selected' : '' }}>Practice</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="default-select form-control wide @error('status') is-invalid @enderror" name="status" required>
                                        <option value="1" {{ $schedule->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $schedule->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Tournaments Fields -->
                                <div class="mb-3 col-md-6 tournament-fields" style="display: {{ $schedule->type == 'Tournaments' ? 'block' : 'none' }};">
                                    <label for="Team" class="form-label">Opposing Team <span class="text-danger">*</span></label>
                                    <select class="default-select form-control wide @error('opposing_team_id') is-invalid @enderror" id="Team" name="opposing_team_id">
                                        <option>Select Opposing Team</option>
                                        @foreach($teams as $team)
                                        <option value="{{$team->name}}" {{ $schedule->name == $team->name ? 'selected' : '' }}>{{$team->name}}</option>
                                         @endforeach
                                    </select>
                                    @error('opposing_team_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 tournament-fields" style="display: {{ $schedule->type == 'Tournaments' ? 'block' : 'none' }};">
                                    <label for="Location" class="form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="Location" name="location" value="{{ $schedule->location }}" placeholder="Location">
                                    @error('location')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 tournament-fields" style="display: {{ $schedule->type == 'Tournaments' ? 'block' : 'none' }};">
                                    <label for="City" class="form-label">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="City" name="city" value="{{ $schedule->city }}" placeholder="City">
                                    @error('city')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 tournament-fields game-fields" style="display: {{ $schedule->type == 'Game' ? 'block' : 'none' }};">
                                    <label for="Date" class="form-label">Date <span class="text-danger">*</span></label>
                                    <input class="form-control @error('date') is-invalid @enderror" type="date" id="Date" name="date" value="{{ $schedule->date }}">
                                    @error('date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 tournament-fields game-fields" style="display: {{ $schedule->type == 'Game' ? 'block' : 'none' }};">
                                    <label for="Time" class="form-label">Time <span class="text-danger">*</span></label>
                                    <input class="form-control @error('time') is-invalid @enderror" type="time" id="Time" name="time" value="{{ $schedule->time }}">
                                    @error('time')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Practice Fields -->
                                <div class="mb-3 col-md-6 practice-fields game-fields" style="display: {{ $schedule->type == 'Practice' ? 'block' : 'none' }};">
                                    <label for="purposeD" class="form-label">Purpose Detail <span class="text-danger">*</span></label>
                                    <input class="form-control @error('purpose_detail') is-invalid @enderror" type="text" id="purposeD" name="purpose_detail" value="{{ $schedule->purpose_detail }}">
                                    @error('purpose_detail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 practice-fields" style="display: {{ $schedule->type == 'Practice' ? 'block' : 'none' }};">
                                    <label for="DateFrom" class="form-label">Date From <span class="text-danger">*</span></label>
                                    <input class="form-control @error('date_from') is-invalid @enderror" type="date" id="DateFrom" name="date_from" value="{{ $schedule->date_from }}">
                                    @error('date_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 practice-fields" style="display: {{ $schedule->type == 'Practice' ? 'block' : 'none' }};">
                                    <label for="Dateto" class="form-label">Date To <span class="text-danger">*</span></label>
                                    <input class="form-control @error('date_to') is-invalid @enderror" type="date" id="Dateto" name="date_to" value="{{ $schedule->date_to }}">
                                    @error('date_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 practice-fields" style="display: {{ $schedule->type == 'Practice' ? 'block' : 'none' }};">
                                    <label for="TimeFrom" class="form-label">Time From <span class="text-danger">*</span></label>
                                    <input class="form-control @error('time_from') is-invalid @enderror" type="time" id="TimeFrom" name="time_from" value="{{ $schedule->timing_from }}">
                                    @error('time_from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6 practice-fields" style="display: {{ $schedule->type == 'Practice' ? 'block' : 'none' }};">
                                    <label for="Timeto" class="form-label">Time To <span class="text-danger">*</span></label>
                                    <input class="form-control @error('time_to') is-invalid @enderror" type="time" id="Timeto" name="time_to" value="{{ $schedule->timing_to }}">
                                    @error('time_to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Submit and Cancel Buttons -->
                                    <div class=" mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Update</button>
                                            <a href="{{ route('team.info',base64_encode($schedule->team_id)) }}" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
                                    </div>
                                </div>
                            </form>
<!--end form-->            
           </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection
@section('js')

<script>
    $(document).on('change', '#Type', function () {
        var selectedType = $('#Type').val();
        $('.tournament-fields').hide();
        $('.practice-fields').hide();
        $('.game-fields').hide();

        if (selectedType === 'Tournaments') {
            $('.tournament-fields').show();
        } else if (selectedType === 'Practice') {
            $('.practice-fields').show();
        } else if (selectedType === 'Game') {
            $('.game-fields').show();
        }
    });
</script>
@endsection