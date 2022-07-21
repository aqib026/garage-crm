@extends('layouts.registerform')
@section('content')
    <section class="registration-form mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-lg">
                        @include('../partials.navigation')
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="user-detail vehicle-detail-title mb-5">
                                        <h5 class="text-uppercase mb-3">User Detail</h5>
                                        <div class="detail-text">
                                            <strong>Name:</strong>
                                            <span class="ml-3">{{ $complain->vehicle->name }}</span>
                                        </div>
                                        <div class="detail-text">
                                            <strong>Email:</strong>
                                            <span class="ml-3">{{ $complain->vehicle->email }}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="vehicle-detail vehicle-detail-title">
                                        <h5 class="text-uppercase mb-3">Vehicle Detail</h5>
                                        <div class="detail-text">
                                            <strong>License plate:</strong>
                                            <span class="ml-3">{{ $complain->vehicle->license_no }}</span>
                                        </div>
                                        <div class="detail-text">
                                            <strong>Vehicle Name:</strong>
                                            <span
                                                class="ml-3">{{ $complain->vehicle->make . ' ' . $complain->vehicle->model }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="vehicle-detail vehicle-detail-title">
                                        <h5 class="text-uppercase mb-3">Complain Details</h5>
                                        <div class="detail-text">
                                            <strong>Status:</strong>
                                            @if ($complain->status == 'Open')
                                                <span class="badge badge-success">{{ $complain->status }}</span>
                                            @elseif($complain->status == 'Paused')
                                                <span class="badge badge-warning">{{ $complain->status }}</span>
                                            @elseif($complain->status == 'Pending')
                                                <span class="badge badge-secondary">{{ $complain->status }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $complain->status }}</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post"  action="{{route('complain.update',$complain->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="vehicle_id"  value="{{$complain->vehicle->id}}">
                                        <div class="detail-text">
                                            <strong>Complain Description:</strong>
                                            <input type="text" name="complain_description"
                                                value="{{ $complain->complain }}" class="form-control  mt-2" id="">
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                    <textarea class="form-control" name="notes" id="notes" cols="30" rows="10">{{ $complain->note}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="notes">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">Select Status </option>

                                                        @foreach ($statuses as $key => $status)
                                                            <option value="{{ $key }}"     @if ($complain->status == $key) selected @endif>
                                                                {{ $status }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-2">
                                                    <label for="complaint">Upload Images</label>
                                                    <input type="file" value="" class="form-control "
                                                        name="file[]" id="file" multiple style="height: 43px;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success">update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-6">
                                    <div class="detail-text mb-4">
                                        <strong>Complain Files:</strong>
                                    </div>
                                   
                                    <div class="image-gallery">
                                        <div class="row pr-3">
                                            @foreach ($complain->files as $file)
                                                <div class="col-md-6 col-sm-6 col-6 mb-3">
                                                    <a class="d-block bg-white shadow-sm rounded-3 h-100"
                                                        href="#" onclick="popupImage('{{ asset('') }}files/{{ $file->filenames }}')">
                                                        <img class="d-block mx-auto"
                                                            src="{{ asset('') }}files/{{ $file->filenames }}"
                                                            style="max-width:100%; height:100%; object-fit: cover;  box-shadow: 2px 2px 1px #cac7c7;
                                                            " alt="{{$complain->complain}}">
                                                    </a>
                                                </div>
                                            @endforeach
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="card-title"></div>
                                @foreach ($vehicle->files as $file)
                                <div class="col-md-3  text-center">
                                    <div class="image-div">
                                        <img src="{{asset('')}}files/{{$file->filenames}}" alt="" style="max-width: 100px;">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img class="w-100" src="" alt="" id="popup-image">
        </div>
      </div>
    </div>
  </div>
@endsection

@section('complain-scripts')
<script>
    function popupImage(image){
        $('#popup-image').attr('src',image);
        $('#exampleModal').modal('show');
        // alert(image);
    }
</script>
@endsection

