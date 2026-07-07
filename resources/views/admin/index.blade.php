@extends('admin.layout.app')

@section('title', 'Admin List')

@section('content')
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Admin List</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Total: {{ $getRecord->total()}}</h3>
                    
                    <div class="card-tools">
                      <form method="get" action="" class="d-flex align-items-center" style="gap: 5px;">
                        <input type="text" name="name" class="form-control form-control-sm" style="width: 150px;" value="{{ request()->get('name') }}" placeholder="Name">
                        <input type="text" name="email" class="form-control form-control-sm" style="width: 150px;" value="{{ request()->get('email') }}" placeholder="Email">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        <a href="{{ url('admin/list') }}" class="btn btn-success btn-sm">Clear</a>
                        <a href="{{url('admin/add')}}" class="btn btn-primary btn-sm ms-3">Add New Admin</a>
                      </form>
                    </div>
                  </div>
                  @include('message')
                  
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{ $value->id}} </td>
                        <td> {{$value->name}} </td>
                        <td> {{$value->email}} </td>
                        <td> {{$value->created_at}} </td>
                        <td>
                          <a href="{{ url('admin/edit/' . $value->id) }}" class='btn btn-primary btn-sm'> Edit</a>
                          <a href="{{ url('admin/delete/' . $value->id) }}" class='btn btn-danger btn-sm'> Delete</a>
                         </td>
                       </tr>
                      @endforeach 
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="card-footer clearfix float-end">
                    {{ $getRecord->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

@endsection

