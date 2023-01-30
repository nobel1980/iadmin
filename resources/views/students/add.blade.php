@extends('layouts.app')

@section('title', 'Add Students')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Students</h1>
        <a href="{{route('students.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Student</h6>
        </div>
        <form method="POST" action="{{route('students.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                  {{-- Student Id --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Student Id</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('std_no') is-invalid @enderror" 
                            id="std_no"
                            placeholder="Std Id" 
                            name="std_no" 
                            value="{{ old('std_no') }}">

                        @error('std_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    {{-- Student Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Student Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                            id="studentName"
                            placeholder="Student Name" 
                            name="name" 
                            value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Class</label>
                        <input 
                            type="class" 
                            class="form-control form-control-user @error('class') is-invalid @enderror" 
                            id="class"
                            placeholder="class" 
                            name="class" 
                            value="{{ old('class') }}">

                        @error('class')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Subject</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('subject') is-invalid @enderror" 
                            id="subject"
                            placeholder="Subject" 
                            name="subject" 
                            value="{{ old('subject') }}">

                        @error('subject')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Group --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Group</label>
                        <select class="form-control form-control-user @error('group') is-invalid @enderror" name="group">
                            <option selected disabled>Select Group</option>
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>

                        @error('group')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection