@extends('layouts.master')
@section('content')


<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content">
<div class="container-xxl"> 

<div class="row">
   
    <div class="col-md-6 col-lg-12">
        <div class="card rounded-5 mt-3">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title fs-1 text-primary text-center text-uppercase">Administrator Form</h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form class="form row" action="{{ route('administrator.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="team_id" value="{{ $id }}" required>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" required placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select form-select-lg @error('type') is-invalid @enderror" name="type" required>
                            <option value="Head Coach" {{ old('type') == 'Head Coach' ? 'selected' : '' }}>Head Coach </option>
                            <option value="Assistant Coach" {{ old('type') == 'Assistant Coach' ? 'selected' : '' }}>Assistant Coach </option>
                            <option value="Team Manager" {{ old('type') == 'Team Manager' ? 'selected' : '' }}>Team Manager</option>
                        </select>
                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" required placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" required placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select form-select-lg @error('status') is-invalid @enderror" name="status" required>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="container">
                        <div class="row mt-3">
                            <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">
                                <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Save</button>
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
     <div class="col-md-6 col-lg-2">
    </div>                      
</div><!--end row-->

</div><!-- container -->

    
    
@endsection