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
                <h3 class="card-title">Create Content</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.blog.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Yujang Lesmana"
                            value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Yujang Lesmana"
                            value="{{old('author')}}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <label>Status Content</label>
                        <select class="custom-select" name="status" value="{{old('status')}}">
                            <option value="draft" {{ old('status'==='0' ? "selected" : "" ) }}>DRAFT</option>
                            <option value="1" {{ old('status'==='1' ? "selected" : "" ) }}>PUBLISH</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="meta_title">meta_title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                            placeholder="Pengacara Hukum, Pengacara Tangerang, etc ..." value="{{old('meta_title')}}">
                    </div>

                    <div class="form-group">
                        <label for="meta_Description">meta_Description</label>
                        <input type="text" class="form-control" id="meta_Description" name="meta_description"
                            placeholder="Pengacara adalah bla bla ..." value="{{old('meta_Description')}}">
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">meta_keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                            placeholder="Pengacara, Hukum, Pasal, etc ..." value="{{old('meta_keywords')}}">
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
    CKEDITOR.replace( 'content', {tabSpaces: 8} );
</script>
@endsection
