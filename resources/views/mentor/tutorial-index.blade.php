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
                    <a href="{{ route('mentor-tutorial-add') }}" class="btn btn-primary mb-3">Add New Tutorial</a>
                    <div class="row">
                        @if (count($tutorials) == 0)
                            <div class="col-12">
                                <div class="alert alert-light" role="alert">
                                    There are no tutorials to show. <a href="{{ route('mentor-tutorial-add') }}"
                                        class="alert-link">Click here to
                                        add</a>.
                                </div>

                            </div>
                        @endif
                        @foreach ($tutorials as $tutorial)
                            <div class="col-4 mb-4">
                                <div class="dashboard-details-card">
                                    <div class="title"><span>Title : </span>{{ $tutorial->title }}</div>
                                    <div class="location"><span>Description : </span>{{ $tutorial->description }}</div>
                                    <div class="type"><span>Content : </span>{{ $tutorial->source_url }}</div>
                                    <div class="salary"><span>Views : </span>{{ $tutorial->views }}</div>
                                    <div class="state"><span>State : </span>{{ $tutorial->state }}</div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('mentor-tutorial-edit', ['id' => $tutorial->id]) }}"
                                            class="btn btn-warning me-2">Edit</a>
                                        <button onclick="deleteClass({{ $tutorial->id }})"
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
