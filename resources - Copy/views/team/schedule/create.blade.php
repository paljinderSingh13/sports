@extends('layouts.master')
@section('content')

<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content">
<div class="container-xxl"> 

<div class="row ">
   
    <div class="col-md-12 col-lg-12">
        <div class="card rounded-5 mt-3">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title text-center text-primary fs-1 text-uppercase">Create Schedule </h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
               <form id="form-validation-2" class="form row" action="{{ route('schedule.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="team_id" value="{{$id}}">
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Type" class="form-label">Type <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg @error('type') is-invalid @enderror" id="Type" name="type" required>
                            <option selected>Select Type</option>
                            <option value="Tournaments" {{ old('type') == 'Tournaments' ? 'selected' : '' }}>Tournaments</option>
                            <option value="Game" {{ old('type') == 'Game' ? 'selected' : '' }}>Game</option>
                            <option value="Practice" {{ old('type') == 'Practice' ? 'selected' : '' }}>Practice</option>
                        </select>
                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-select-lg @error('status') is-invalid @enderror" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Tournaments Fields -->
                        <div class="mb-2 col-lg-6 col-sm-12 tournament-fields" style="display: none;">
                            <label for="Team" class="form-label">Opposing Team <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg @error('team') is-invalid @enderror" id="Team" name="opposing_team_id">
                                <option selected>Select Opposing Team</option>
                                @foreach($teams as $team)
                                <option value="{{$team->id}}" {{ old('team') == $team->id ? 'selected' : '' }}>{{$team->name}}</option>
                                @endforeach
                            </select>
                            @error('team')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 tournament-fields" style="display: none;">
                            <label for="Location" class="form-label">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg @error('location') is-invalid @enderror" id="Location" name="location" placeholder="Location">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 tournament-fields" style="display: none;">
                            <label for="City" class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg @error('city') is-invalid @enderror" id="City" name="city" placeholder="City">
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 tournament-fields game-fields" style="display: none;">
                            <label for="Date" class="form-label">Date <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg @error('date') is-invalid @enderror" type="date" id="Date" name="date" value="{{ old('date') }}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 tournament-fields game-fields" style="display: none;">
                            <label for="Time" class="form-label">Time <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg @error('time') is-invalid @enderror" type="time" id="Time" name="time" value="{{ old('time') }}">
                            @error('time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <!-- Practice Fields -->
                        <div class="mb-2 col-lg-6 col-sm-12 practice-fields game-fields" style="display: none;">
                            <label for="purposeD" class="form-label">Purpose Detail <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg @error('purpose_detail') is-invalid @enderror" type="text" id="purposeD" name="purpose_detail" value="{{ old('purpose_detail') }}">
                            @error('purpose_detail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 practice-fields" style="display: none;">
                            <label for="DateFrom" class="form-label">Date From <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg @error('date_from') is-invalid @enderror" type="date" id="DateFrom" name="date_from" value="{{ old('date_from') }}">
                            @error('date_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 practice-fields" style="display: none;">
                            <label for="Dateto" class="form-label">Date To <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg @error('date_to') is-invalid @enderror" type="date" id="Dateto" name="date_to" value="{{ old('date_to') }}">
                            @error('date_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 practice-fields" style="display: none;">
                            <label for="TimeFrom" class="form-label">Time From <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg @error('time_from') is-invalid @enderror" type="time" id="TimeFrom" name="time_from" value="{{ old('time_from') }}">
                            @error('time_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2 col-lg-6 col-sm-12 practice-fields" style="display: none;">
                            <label for="Timeto" class="form-label">Time To <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg @error('time_to') is-invalid @enderror" type="time" id="Timeto" name="time_to" value="{{ old('time_to') }}">
                            @error('time_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    

                    <!-- Submit and Cancel Buttons -->
                    <div class="container">
                        <div class="row mt-3">
                            <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">
                                <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Submit</button>
                            </div>
                            <div class="col-lg-6 col-6 col-sm-6 mb-2">
                                <a href="{{ route('team.info',base64_encode($id)) }}" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
<!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->
                       
</div><!--end row-->

</div><!-- container -->
@endsection
@section('js')

<script>
        $(document).on('change','#Type',function(){
           var selectedType = $('#Type').val();
            $('.tournament-fields').css('display','none');
            $('.practice-fields').css('display','none');
            $('.game-fields').css('display','none');

            if (selectedType === 'Tournaments') {
                $('.tournament-fields').css('display','block');
            } else if (selectedType === 'Practice') {
                $('.practice-fields').css('display','block');
            } else if (selectedType === 'Game') {
                $('.game-fields').css('display','block');
            }
        });
</script>
@endsection