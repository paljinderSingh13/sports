@extends('layouts.master')
@section('content')

<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content designthree">
<div class="container-xxl"> 

<div class="row ">
   
    <div class="col-md-12 col-lg-12">
        <div class="card rounded-5 mt-3">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title text-center text-primary fs-1">Edit Club </h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                   <form id="form-validation-2" class="form row" action="{{ route('club.update', base64_encode($club->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT or PATCH method -->
                        
                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="logo" class="form-label">Logo <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="file" name="logo" id="logo" placeholder="Logo">
                            <img id="preview-image" src="{{asset($club->logo)}}" alt="Image Preview" style="display: {{ $club->logo ? 'block' : 'none' }}; max-height: 100px;max-width: 200px; margin-top: 10px;">
                            @error('logo')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="Name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="text" name="name" id="Name" placeholder="Name" value="{{ old('name', $club->name) }}" required>
                            @error('name')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="Address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="text" name="address" id="Address" placeholder="Address" value="{{ old('address', $club->address) }}" required>
                            @error('address')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="City" class="form-label">City <span class="text-danger">*</span></label>
                              <input class="form-control form-control-lg" type="text" name="city" id="City" placeholder="City" value="{{ old('city',$club->city) }}" required>
                            @error('city')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label class="col-form-label">State <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="text" name="state" id="State" placeholder="State" value="{{ old('state',$club->state) }}" readonly required>
                            @error('state')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label class="col-form-label">Country <span class="text-danger">*</span></label>
                             <input class="form-control form-control-lg" type="text" name="country" id="Country" placeholder="Country" value="{{ old('country',$club->country) }}" readonly required>
                            @error('country')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="PostalCode" class="form-label">Postal Code <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="text" name="postal_code" id="PostalCode" placeholder="Postal Code" value="{{ old('postal_code', $club->postal_code) }}" required>
                            @error('postal_code')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="ContactName" class="form-label">Contact Name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="text" name="contact_name" id="ContactName" placeholder="Contact Name" value="{{ old('contact_name', $club->contact_name) }}" required>
                            @error('contact_name')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="Phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="text" name="phone" id="Phone" placeholder="Phone" value="{{ old('phone', $club->phone) }}" required>
                            @error('phone')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-lg-6 col-sm-12">
                            <label for="Email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input class="form-control form-control-lg" type="email" name="email" id="Email" placeholder="Email" value="{{ old('email', $club->email) }}" required>
                            @error('email')
                                <small class="text-danger error">{{ $message }}</small>
                            @enderror
                        </div>
                         <div class="container">   
                        <div class="row mt-3">
                            <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">                            
                                <button type="submit"  class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Update</button>
                            </div>
                            <div class="col-lg-6 col-6 col-sm-6 mb-2">
                                <a href="{{ route('club.list') }}" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
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
    $(document).ready(function () {
        // Event listener for file input change
        $('#logo').change(function (event) {
            // Get the selected file
            var input = event.target;
            // Check if a file is selected and it's an image
            if (input.files && input.files[0]) {
                // Create a FileReader to read the selected file
                var reader = new FileReader();
                // Event listener for when the file is read
                reader.onload = function (e) {
                    // Set the src attribute of the img element to display the image
                    $('#preview-image').attr('src', e.target.result).show();
                };
                // Read the selected file as a Data URL
                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
<script>
$(document).ready(function() {
    // Autocomplete setup
    $('#City').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('club.get.city.suggestions') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    query: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2, // Minimum characters to trigger suggestions
        select: function(event, ui) {
            $('#City').val(ui.item.value);
            // Trigger AJAX to get state and country after selecting a city
            getLocation(ui.item.value);
            return false;
        }
    });

    // Function to get state and country based on city
    function getLocation(city) {
        $.ajax({
            url: "{{ route('club.get.location') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                city: city
            },
            success: function(response) {
                $('#State').val(response.state);
                $('#Country').val(response.country);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
});
</script>
@endsection