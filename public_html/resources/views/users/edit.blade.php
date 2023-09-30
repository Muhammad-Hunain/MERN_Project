@extends('layouts.app')
@section('content')
    
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-1">
        <h1 class="h3 mb-0 text-gray-800">{{ $pageHead }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">


                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group">
                                    
                                    <label for="Name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control form-contol-sm" value="{{ old('name',$user->name) }}" />
                                    
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        
                                </div>

                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    
                                    <label for="Email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control form-contol-sm" value="{{ old('email',$user->email) }}" />

                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    
                                </div>

                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    
                                    <label for="Password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control form-contol-sm" value="{{ old('password',$user->password_txt) }}" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    
                                </div>

                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    
                                    <label for="ContactNo">Contact Number</label>
                                    <input type="number" name="contact_no" id="contact_no" class="form-control form-contol-sm" value="{{ old('contact_no',$user->contact_no) }}" />

                                    <x-input-error :messages="$errors->get('contact_no')" class="mt-2" />
                                    
                                </div>

                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    
                                    <label for="Designation">Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control form-contol-sm" value="{{ old('designation',$user->designation) }}" />

                                    <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                    
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection