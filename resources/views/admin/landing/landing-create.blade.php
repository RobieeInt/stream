@extends('admin.layouts.base');

@section('title', 'landings');

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
                <h3 class="card-title">Create landing</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.landing.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="hero_title">hero title</label>
                        <input type="text" class="form-control" id="hero_title" name="hero_title"
                            placeholder="e.g Pengacara & Konsultan Hukum" value="{{old('hero_title')}}">
                    </div>
                    <div class="form-group">
                        <label for="hero_image">Hero Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="hero_image"
                                    name="hero_image">
                                <label class="custom-file-label" for="hero_image">Change Hero Image</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hero_description">Hero Description</label>
                        <textarea name="hero_description" id="hero_description" cols="30"
                            rows="10">{{ old('hero_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="hero_video_link">hero_video_link</label>
                        <input type="text" class="form-control" id="hero_video_link" name="hero_video_link" placeholder="Video url"
                            value="{{old('hero_video_link')}}">
                    </div>
                    <div class="form-group">
                        <label for="footer_description">Footer Description</label>
                        <textarea name="footer_description" id="footer_description" cols="30"
                            rows="10">{{ old('footer_description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="address">address</label>
                        <textarea name="address" id="address" cols="30"
                            rows="10">{{ old('address') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="e.g Pengacara & Konsultan Hukum" value="{{old('phone')}}">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="e.g Pengacara & Konsultan Hukum" value="{{old('email')}}">
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

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'hero_description' );
    CKEDITOR.replace( 'footer_description' );
    CKEDITOR.replace( 'address' );
</script>

@endsection
