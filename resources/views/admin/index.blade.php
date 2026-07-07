@extends('admin.layout.app')

@section('title', 'Admin List')

@section('content')
                <div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title">Admin List</h3>
                    <div class="card-tools">
                      <a href="{{url('admin/add')}}" class="btn btn-primary btn-sm">Add New Admin</a>
                    </div>
                  </div>
                  @include('message')
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>name</th>
                          <th>email</th>
                          <th>created date</th>
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
                  <!-- /.card-body -->
                </div>

@endsection

