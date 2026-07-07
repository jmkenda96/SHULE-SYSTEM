@extends('admin.layout.app')

@section('title', 'Edit Admin')

@section('content')
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Edit Admin</h1>
              </div>
            </div>
          </div>
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <!-- Quick Example -->
              <div class="col-md-6">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">Edit Admin</div>
                  </div>
                  <form action="{{url('admin/update', $getRecord->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          name="name"
                          aria-describedby="emailHelp"
                          value={{ old('name', $getRecord->name) }}
                        />
                      </div>

                      <div class="mb-3">
                       <label for="email" class="form-label">Email</label>
                        <input
                          type="text"
                          class="form-control"
                          name="email"
                          aria-describedby="emailHelp"
                        value={{ old('email', $getRecord->email) }}/>
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" />
                      </div>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" />
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>

                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
@endsection

