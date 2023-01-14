@extends('admin.layouts.base');

@section('title', 'Tags');

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
                <h3 class="card-title">Create Tag</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.tags.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Yujang Lesmana"
                            value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Profil Team / Deskripsi</label>
                        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
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
