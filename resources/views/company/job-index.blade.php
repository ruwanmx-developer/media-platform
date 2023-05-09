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
                    <a href="{{ route('company-job-add') }}" class="btn btn-primary">Add New Job Vcancy</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Location</th>
                                <th scope="col">Salary</th>
                                <th scope="col">State</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $row_count = 1;
                            @endphp
                            @foreach ($jobs as $job)
                                <tr>
                                    <th scope="row">{{ $row_count++ }}</th>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->type }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->state }}</td>
                                    <td>
                                        <a href="{{ route('company-job-edit', ['id' => $job->id]) }}"
                                            class="btn btn-warning py-1">Edit</a>
                                        <button onclick="deleteVacancy({{ $job->id }})"
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
            function deleteVacancy(x) {

                const xhr = new XMLHttpRequest();
                const url = '/company-job-delete/' + x;
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
