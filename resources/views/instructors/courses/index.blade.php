@extends('layouts.app')
@section('pageTitle', 'Manage Courses')
@section('content')


    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">
                @if (session('success'))
                    <div class="container">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Course Management</h5>
                        <a href="{{ route('courses.create') }}" class="btn btn-primary">
                           + Add New Course
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordereld">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Language</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->category }}</td>
                                            <td>{{ $course->level }}</td>
                                            <td>{{ $course->language }}</td>
                                            <td>{{ $course->price }}</td>
                                            <td>{{ $course->featured ? 'Yes' : 'No' }}</td>
                                            <td>
                                                @if ($course->thumbnail)
                                                    <img src="{{ asset($course->thumbnail) }}" class="img-fluid"
                                                        width="40" alt="Course Image" />
                                                @else
                                                    No Image
                                                @endif
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{ route('courses.manage-content', $course->id) }}"
                                                                class="dropdown-item">
                                                                <i class="fas fa-cogs"></i> Create Content
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('courses.content.edit', ['id' => $course->id]) }}">
                                                                <i class="fas fa-pen"></i> Edit Content
                                                            </a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('courses.edit', $course->id) }}">
                                                                <i class="fas fa-edit"></i> Edit Course
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li> <a class="dropdown-item" href="#"
                                                                onclick="confirmDelete('{{ route('courses.destroy', $course->id) }}')">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js')

    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this course?')) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                form.style.display = 'none';

                var csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';

                var methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';

                form.appendChild(csrfToken);
                form.appendChild(methodField);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

@endsection
