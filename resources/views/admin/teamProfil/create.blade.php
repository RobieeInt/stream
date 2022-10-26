@extends('admin.layouts.base');

@section('title', 'Blog Content')');

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
                <h3 class="card-title">Create Content</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.profile.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Yujang Lesmana"
                            value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="job">Jabatan</label>
                        <input type="text" class="form-control" id="job" name="job" placeholder="Programmer"
                            value="{{old('job')}}">
                    </div>

                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="https://www.facebook.com/robby.lesmana"
                            value="{{old('facebook')}}">
                    </div>

                    <div class="form-group">
                        <label for="Twitter">Twitter</label>
                        <input type="text" class="form-control" id="Twitter" name="Twitter" placeholder="https://twitter.com/robbyint"
                            value="{{old('Twitter')}}">
                    </div>

                    <div class="form-group">
                        <label for="Instagram">Instagram</label>
                        <input type="text" class="form-control" id="Instagram" name="Instagram" placeholder="https://www.instagram.com/robby"
                            value="{{old('Instagram')}}">
                    </div>

                    <div class="form-group">
                        <label for="Linkedin">Linkedin</label>
                        <input type="text" class="form-control" id="Linkedin" name="Linkedin" placeholder="https://www.linkedin.com/robbyhernowo"
                            value="{{old('Linkedin')}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Profil Team / Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image"
                                    name="image">
                                <label class="custom-file-label" for="image">MAsukkan Foto</label>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Status Team</label>
                        <select class="custom-select" name="status" value="{{old('status')}}">
                            <option value="0" {{ old('status'==='0' ? "selected" : "" ) }}>Tidak Aktif</option>
                            <option value="1" {{ old('status'==='1' ? "selected" : "" ) }}>Aktif</option>
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
{{-- //CKEDITOR --}}
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description', {tabSpaces: 8} );
</script>
@endsection
