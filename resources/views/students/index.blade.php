@extends('layouts.app')

@section('title', 'Students List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Students</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>                
            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Students</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="15%">Student Id</th>
                                <th width="20%">Name</th>
                                <th width="15%">Class</th>
                                <th width="15%">Subject</th>
                                <th width="10%">Batch</th>
                                <th width="15%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <!--<td>{{ $student->full_name }}</td>-->
                                    <td>{{ $student->std_no }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td>{{ $student->subject }}</td>
                                    <!-- <td>{{ $student->roles ? $student->roles->pluck('name')->first() : 'N/A' }}</td> -->
                                    <td>{{ $student->batch }}</td>
                                    <td>
                                        @if ($student->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($student->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td style="display: flex">
                                        @if ($student->status == 0)
                                            <a href="{{ route('students.status', ['student_id' => $student->id, 'status' => 1]) }}"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($student->status == 1)
                                            <a href="{{ route('students.status', ['student_id' => $student->id, 'status' => 0]) }}"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('students.edit', ['student' => $student->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @include('students.delete-modal')

@endsection

@section('scripts')
    
@endsection
