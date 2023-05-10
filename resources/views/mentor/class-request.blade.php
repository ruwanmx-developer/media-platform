@extends('layouts.app')

@section('content')
    <div id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-title">Requests for the Classes</div>
                </div>
                @if (count($crequests) == 0)
                    <div class="col-12">
                        <div class="alert alert-light" role="alert">
                            There are no class requests show.
                        </div>
                    </div>
                @endif

                @foreach ($crequests as $crequest)
                    <div class="col-4 mb-4">
                        <div class="dashboard-details-card">
                            <div class="title"><span>User Name : </span>{{ $crequest->user->name }}</div>
                            <div class="location"><span>User Mobile : </span>{{ $crequest->user->mobile }}</div>
                            <div class="type"><span>User Email : </span>{{ $crequest->user->email }}</div>
                            <div class="state"><span>State : </span>{{ $crequest->state }}</div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('mentor-request-user', ['id' => $crequest->user->id, 'crequest' => $crequest->id]) }}"
                                    class="btn btn-success me-2">View User</a>
                                <button onclick="deleteRequest({{ $crequest->id }})" class="btn btn-danger ">Delete</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <script>
            function deleteRequest(x) {

                const xhr = new XMLHttpRequest();
                const url = '/mentor-request-delete/' + x;
                const formData = new FormData();

                formData.append('id', x);

                xhr.open('POST', url);
                xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                xhr.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        if (response.deleted == true) {
                            location.reload();
                        }
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
