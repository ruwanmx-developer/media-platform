@extends('layouts.app')

@section('content')
    <div id="company-job-index">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <a href="{{ route('mentor-class-add') }}" class="btn btn-primary">Add New Class</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Class Name</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Day</th>
                                <th scope="col">Location</th>
                                <th scope="col">District</th>
                                <th scope="col">State</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $row_count = 1;
                            @endphp
                            @foreach ($classes as $class)
                                <tr>
                                    <th scope="row">{{ $row_count++ }}</th>
                                    <td>{{ $class->class_name }}</td>
                                    <td>{{ $class->time_from }}</td>
                                    <td>{{ $class->time_to }}</td>
                                    <td>{{ $class->day }}</td>
                                    <td>{{ $class->location }}</td>
                                    <td>{{ $class->district }}</td>
                                    <td>{{ $class->state }}</td>
                                    <td>
                                        <a href="{{ route('mentor-request-index', ['id' => $class->id]) }}"
                                            class="btn btn-success py-1">Requests</a>
                                        <a href="{{ route('mentor-class-edit', ['id' => $class->id]) }}"
                                            class="btn btn-warning py-1">Edit</a>
                                        <button onclick="deleteClass({{ $class->id }})"
                                            class="btn btn-danger py-1">Delete</button>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function deleteClass(x) {

                const xhr = new XMLHttpRequest();
                const url = '/mentor-class-delete/' + x;
                const formData = new FormData();

                formData.append('id', x);

                xhr.open('POST', url);
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                xhr.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        location.reload();
                    }
                };

                Swal.fire({
                    title: 'Are you sure?',
                    text: "If you delete a job vacancy it will remove all job all job applications also. if you want the applications just update the State to INACTIVE.You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        xhr.send(formData);
                    }
                })
            }
        </script>
    </div>
@endsection
