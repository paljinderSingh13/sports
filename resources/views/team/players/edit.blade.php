@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content team-form">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <div class="card rounded-5 mt-3">
                            <div class="card-header rounded-5">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="card-title fs-1 text-primary text-center text-uppercase">Edit Player</h3>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <form action="{{ route('player.update', $player->id) }}" method="POST" enctype="multipart/form-data" class="row">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="team_id" id="team_id" value="{{ $player->team_id }}">

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="picture" class="form-label">Picture</label>
                                        <input type="file" name="picture" id="picture" class="form-control form-control-lg" accept="image/*" onchange="previewImage(event)">
                                        <img id="picturePreview" src="{{ old('picture', isset($player) ? asset($player->picture) : '#') }}" alt="Picture Preview" 
                                             style="display: {{ isset($player) ? 'block' : 'none' }}; max-width: 300px; margin-top: 10px;">
                                        @error('picture')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name', $player->name ?? '') }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="type" class="form-label">Type</label>
                                        <select name="type" id="type" class="form-select" required onchange="togglePriorityDropdown(this.value)">
                                            <option value="permanent" {{ old('type', $player->type ?? '') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                            <option value="substitute" {{ old('type', $player->type ?? '') == 'substitute' ? 'selected' : '' }}>Substitute</option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select name="priority" id="priorityPermanent" class="form-select" {{ old('type', $player->type ?? '') == 'permanent' ? '' : 'style=display:none;' }}>
                                            @for($i = 1; $i <= 15; $i++)
                                                @if(!in_array($i, $players['permanent']))
                                                    <option value="{{ $i }}" {{ old('priority', $player->priority ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                        <select name="priority" id="prioritySubstitute" class="form-select" {{ old('type', $player->type ?? '') == 'substitute' ? '' : 'style=display:none;' }}>
                                            @for($i = 1; $i <= 15; $i++)
                                                @if(!in_array($i, $players['substitute']))
                                                    <option value="{{ $i }}" {{ old('priority', $player->priority ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endif
                                            @endfor
                                        </select>
                                        @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control form-control-lg" value="{{ old('dob', $player->dob ?? '') }}" required>
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="proof_id" class="form-label">Proof ID</label>
                                        <input type="file" name="proof_id" id="proof_id" class="form-control form-control-lg">
                                        @error('proof_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control form-control-lg" value="{{ old('phone', $player->phone ?? '') }}" required>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('email', $player->email ?? '') }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-2 col-lg-6 col-sm-12">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="1" {{ old('status', $player->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $player->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="container">
                                        <div class="row mt-3">
                                            <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">
                                                <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Submit</button>
                                            </div>
                                            <div class="col-lg-6 col-6 col-sm-6 mb-2">
                                                <a href="{{ route('team.list', base64_encode($player->team_id)) }}" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
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
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('picturePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function togglePriorityDropdown(type) {
        document.getElementById('priorityPermanent').style.display = type === 'permanent' ? 'block' : 'none';
        document.getElementById('prioritySubstitute').style.display = type === 'substitute' ? 'block' : 'none';
    }
</script>
@endsection
