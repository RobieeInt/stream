@extends('admin.layouts.base');

@section('title', 'Transactions');

@section('content')
    <div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Transactions</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="transactions" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Package</th>
                  <th class="text-center">User</th>
                  <th class="text-center">Amount</th>
                  <th class="text-center">Transaction Code</th>
                  <th class="text-center">Status</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($transactions as $transaction )

                  <tr>
                    <td class="text-center">{{$transaction->id}}</td>
                    <td class="text-center">{{$transaction->package->name}}</td>
                    <td class="text-center">{{$transaction->user->name}}</td>
                    <td class="text-center">
                    {{ number_format($transaction->amount) }}
                    </td>
                    <td  class="text-maroon text-center">{{$transaction->transaction_code}}</td>
                    <td class="text-center {{$transaction->status == 'success' ?  "text-teal" : "text-orange"}}" >
                    {{-- //uppercase --}}
                    {{ strtoupper($transaction->status) }}
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
        $('#transactions').DataTable();
    </script>
@endsection


