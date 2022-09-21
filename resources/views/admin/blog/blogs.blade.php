@extends('admin.layouts.base');

@section('title', 'Blog');

@section('content')
    <div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Blogs</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="blogs" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($blogs as $blog )

                  <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->name}}</td>
                    <td>{{$blog->email}}</td>
                    <td>{{$blog->phone}}</td>
                    <td>{{$blog->role}}</td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
    <script>
        $('#blogs').DataTable();
    </script>
@endsection


