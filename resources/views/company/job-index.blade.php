@extends('layouts.app')

@section('content')
    <div id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('company-job-add') }}" class="btn btn-primary mb-3">Add New Job Vacancy</a>
                    <div class="row">
                        @foreach ($jobs as $job)
                            <div class="col-4 mb-4">
                                <div class="job-details-card">
                                    <div class="title"><span>Title : </span>{{ $job->title }}</div>
                                    <div class="location"><span>Location : </span>{{ $job->location }}</div>
                                    <div class="type"><span>Type : </span>{{ $job->type }}</div>
                                    <div class="salary"><span>Salary : </span>{{ $job->salary }} /=</div>
                                    <div class="state"><span>State : </span>{{ $job->state }}</div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('company-application-index', ['id' => $job->id]) }}"
                                            class="btn btn-success me-2">Applications</a>
                                        <a href="{{ route('company-job-edit', ['id' => $job->id]) }}"
                                            class="btn btn-warning me-2">Edit</a>
                                        <button onclick="deleteVacancy({{ $job->id }})"
                                            class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

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
