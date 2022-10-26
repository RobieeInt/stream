@extends('admin.layouts.base');

@section('title', 'Review Client')');

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
                <h3 class="card-title">Create Review</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.review.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Yujang Lesmana"
                            value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="job">Pekerjaan</label>
                        <input type="text" class="form-control" id="job" name="job" placeholder="Programmer"
                            value="{{old('job')}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="robbyhernowo@gmail.com"
                            value="{{old('email')}}">
                    </div>


                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="08568780192"
                            value="{{old('phone')}}">
                    </div>

                    <div class="form-group">
                        <label for="review">Profil Team / Deskripsi</label>
                        <textarea name="review" id="review" cols="30" rows="10">{{ old('review') }}</textarea>
                    </div>

                    <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image"
                                    name="image">
                                <label class="custom-file-label" for="image">MAsukkan Foto</label>
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Status Review</label>
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
    CKEDITOR.replace( 'review', {tabSpaces: 8} );
</script>
@endsection
