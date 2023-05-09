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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">User Mobile</th>
                                <th scope="col">State</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $row_count = 1;
                            @endphp
                            @foreach ($applications as $application)
                                <tr>
                                    <th scope="row">{{ $row_count++ }}</th>
                                    <td>{{ $application->user->name }}</td>
                                    <td>{{ $application->user->email }}</td>
                                    <td>{{ $application->user->mobile }}</td>
                                    <td>{{ $application->state }}</td>
                                    <td>
                                        <a href="{{ route('company-application-user', ['id' => $application->user->id, 'application' => $application->id]) }}"
                                            class="btn btn-success py-1">View User</a>
                                        <button onclick="deleteApplication({{ $application->id }})"
                                            class="btn btn-danger py-1">Delet</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function deleteApplication(x) {

                const xhr = new XMLHttpRequest();
                const url = '/company-application-delete/' + x;
                const formData = new FormData();

                formData.append('id', x);

                xhr.open('POST', url);
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                xhr.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {

                    }
                };

                Swal.fire({
                    title: 'Are you sure?',
                    text: "If you delete a job application it will be gone forever. The user will be notified the application rejected.You won't be able to revert this!",
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
