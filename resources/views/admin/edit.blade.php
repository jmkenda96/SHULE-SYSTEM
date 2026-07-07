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
            <div class="row justify-content-center mt-3">
              <div class="col-md-8 col-lg-6">
                <div class="card card-primary card-outline shadow-sm mb-4">
                  <div class="card-header">
                    <h5 class="card-title m-0">Edit Admin</h5>
                  </div>
                  @include('message')
                  <form action="{{url('admin/update', $getRecord->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input
                          type="text"
                          class="form-control"
                          name="name"
                          id="name"
                          placeholder="Enter full name"
                          value="{{old('name', $getRecord->name)}}"
                          required
                        />

                        @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="mb-3">
                       <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input
                          type="email"
                          class="form-control"
                          name="email"
                          id="email"
                          placeholder="Enter email address"
                          value="{{ old('email', $getRecord->email) }}"
                          required
                          
                        />
                        @error('email')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <span class="">Leave blank to keep current password</span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Leave blank to keep current password" />

                        @error('password')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      
                      <!-- <div class="mb-3">
                        <label for="inputGroupFile02" class="form-label">Profile Picture (Optional)</label>
                        <input type="file" class="form-control" id="inputGroupFile02" />
                      </div>
                    </div> -->
                    <div class="card-footer text-end">
                      <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
@endsection

