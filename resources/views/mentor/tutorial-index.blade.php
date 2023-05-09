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
                    <a href="{{ route('mentor-tutorial-add') }}" class="btn btn-primary">Add New Tutorial</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Content</th>
                                <th scope="col">Views</th>
                                <th scope="col">State</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $row_count = 1;
                            @endphp
                            @foreach ($tutorials as $tutorial)
                                <tr>
                                    <th scope="row">{{ $row_count++ }}</th>
                                    <td>{{ $tutorial->title }}</td>
                                    <td>{{ $tutorial->description }}</td>
                                    <td>{{ $tutorial->source_url }}</td>
                                    <td>{{ $tutorial->views }}</td>
                                    <td>{{ $tutorial->state }}</td>
                                    <td>

                                        <a href="{{ route('mentor-tutorial-edit', ['id' => $tutorial->id]) }}"
                                            class="btn btn-warning py-1">Edit</a>
                                        <button onclick="deleteClass({{ $tutorial->id }})"
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
                const url = '/mentor-tutorial-delete/' + x;
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
