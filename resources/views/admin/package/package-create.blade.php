@extends('admin.layouts.base');

@section('title', 'Packages');

@section('content')
<div class="row">
    <div class="col-md-12">

        {{-- Alert Here --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- <div class="alert alert-danger">
        </div> --}}

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Package</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.package.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="e.g Basic"
                            value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="e.g 1000000"
                            value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label for="max_days">max_days</label>
                        <input type="number" class="form-control" id="max_days" name="max_days" placeholder="30"
                            value="{{old('max_days')}}">
                    </div>

                    <div class="form-group">
                        <label for="max_users">max_users</label>
                        <input type="number" class="form-control" id="max_users" name="max_users" placeholder="30"
                            value="{{old('max_users')}}">
                    </div>

                    <div class="form-group">
                        <label>downloaded</label>
                        <select class="custom-select" name="is_downloaded" value="{{old('is_downloaded')}}">
                            <option value="0" {{ old('is_downloaded'==='0' ? "selected" : "" ) }}>No</option>
                            <option value="1" {{ old('is_downloaded'==='1' ? "selected" : "" ) }}>Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>4k</label>
                        <select class="custom-select" name="is_4k" value="{{old('is_4k')}}">
                            <option value="0" {{ old('is_4k'==='0' ? "selected" : "" ) }}>No</option>
                            <option value="1" {{ old('is_4k'==='1' ? "selected" : "" ) }}>Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>active</label>
                        <select class="custom-select" name="is_active" value="{{old('is_active')}}">
                            <option value="0" {{ old('is_active'==='0' ? "selected" : "" ) }}>No</option>
                            <option value="1" {{ old('is_active'==='1' ? "selected" : "" ) }}>Yes</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    //Date picker
    $('#release-date').datetimepicker({
      format: 'YYYY-MM-DD'
    });
</script>
@endsection
