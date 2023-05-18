@extends('layouts.app')

@section('content')
    <div id="dashboard">
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
                    <a href="{{ route('mentor-class-add') }}" class="btn btn-primary mb-3">Add New Class</a>
                    <div class="row">
                        @if (count($classes) == 0)
                            <div class="col-12">
                                <div class="alert alert-light" role="alert">
                                    There are no classes to show. <a href="{{ route('mentor-class-add') }}"
                                        class="alert-link">Click here to
                                        add</a>.
                                </div>

                            </div>
                        @endif
                        @foreach ($classes as $class)
                            <div class="col-4 mb-4">
                                <div class="dashboard-details-card">
                                    <div class="title"><span>Class Name : </span>{{ $class->class_name }}</div>
                                    <div class="location"><span>Time : </span>From {{ $class->time_from }} to
                                        {{ $class->time_to }}</div>
                                    <div class="type"><span>Day : </span>{{ $class->day }}</div>
                                    <div class="salary"><span>Location : </span>{{ $class->location }}</div>
                                    <div class="salary"><span>District : </span>{{ $class->district }}</div>
                                    <div class="state"><span>State : </span>{{ $class->state }}</div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('mentor-request-index', ['id' => $class->id]) }}"
                                            class="btn btn-success me-2">Requests</a>
                                        <a href="{{ route('mentor-class-edit', ['id' => $class->id]) }}"
                                            class="btn btn-warning me-2">Edit</a>
                                        <button onclick="deleteClass({{ $class->id }})"
                                            class="btn btn-danger ">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
