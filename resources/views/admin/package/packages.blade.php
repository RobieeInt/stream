@extends('admin.layouts.base');

@section('title', 'Packages');

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Package</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('admin.package.create')}}" class="btn btn-info mb-2"><i class="fas fa-plus-square"></i> Create Package</a>
            </div>
          </div>

          @if(session()->has('success'))
            <div class="alert alert-success text-center">
              {{ session()->get('success') }}
            </div>
            @endif

          <div class="row">
            <div class="col-md-12">
              <table id="packages" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Casts</th>
                    <th>Duration</th>
                    <th>Rating</th>
                    <th>Featured</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($packages as $package )
                    <tr>
                      <td>{{$package->id}}</td>
                      <td>{{$package->name}}</td>
                      <td>{{$package->price}}</td>
                      <td>{{$package->max_days}}</td>
                      <td>{{$package->max_users}}</td>
                      <td>{{$package->is_downloaded === 1 ? "yes" : "No" }}</td>
                      <td>{{$package->is_4k === 1 ? "yes" : "No" }}</td>
                      <td>
                        <a href="{{ route('admin.package.edit', $package->id) }}" class="btn btn-secondary"><i class="fas fa-edit"></i>Edit</a>
                        <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          {{-- //giving modal before delete --}}
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-trash"></i>Delete
                            </button>
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete packages</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this package?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                      </td>
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
        $('#packages').DataTable();
    </script>
@endsection
