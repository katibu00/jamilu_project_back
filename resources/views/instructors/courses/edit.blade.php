@extends('layouts.app')

@section('pageTitle', 'Edit Course')

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
                        <h5 class="mb-0">Create a New Course</h5>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary">
                           <-- Courses
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('courses.update', $course->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="form-group smalls">
                                        <label>Course Title*</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Enter Course Title" value="{{ old('title', $course->title) }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Short Description</label>
                                        <input type="text" class="form-control" name="short_description"
                                            value="{{ old('short_description', $course->short_description) }}">
                                        @error('short_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Description</label>
                                        <textarea id="description" name="description" class="form-control" cols="30" rows="10">{{ old('description', $course->description) }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Category*</label>
                                        <div class="simple-input">
                                            <select id="cates" class="form-control" name="category">
                                                <option value="" selected>&nbsp;</option>
                                                <option value="Web Development"
                                                    {{ old('category') == 'Web Development' ? 'selected' : '' }}>
                                                    Web Development</option>
                                                <option value="UX/UI Design"
                                                    {{ old('category') == 'UX/UI Design' ? 'selected' : '' }}>
                                                    UX/UI Design</option>
                                                <option value="Digital Marketing"
                                                    {{ old('category') == 'Digital Marketing' ? 'selected' : '' }}>
                                                    Digital Marketing</option>
                                                <option value="Graphics Design"
                                                    {{ old('category') == 'Graphics Design' ? 'selected' : '' }}>
                                                    Graphics Design</option>
                                                <option value="Video Editing"
                                                    {{ old('category') == 'Video Editing' ? 'selected' : '' }}>
                                                    Video Editing</option>
                                            </select>
                                        </div>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Level</label>
                                        <div class="simple-input">
                                            <select id="lvl" class="form-control" name="level">
                                                <option value="" selected>&nbsp;</option>
                                                <option value="Beginner"
                                                    {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                                <option value="Intermediate"
                                                    {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate
                                                </option>
                                                <option value="Advanced"
                                                    {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                                <option value="Expert" {{ old('level') == 'Expert' ? 'selected' : '' }}>
                                                    Expert</option>
                                            </select>
                                        </div>
                                        @error('level')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group smalls">
                                        <label>Tags/Keywords</label>
                                        <input type="text" class="form-control" name="tags"
                                            placeholder="Enter tags/keywords" value="{{ old('tags', $course->tags) }}">
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Language</label>
                                        <div class="simple-input">
                                            <select id="language" class="form-control" name="language">
                                                <option value="" selected>&nbsp;</option>
                                                <option value="English"
                                                    {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                                <option value="Hausa" {{ old('language') == 'Hausa' ? 'selected' : '' }}>
                                                    Hausa</option>
                                                <option value="Pidgin" {{ old('language') == 'Pidgin' ? 'selected' : '' }}>
                                                    Pidgin</option>
                                                <option value="Yoruba" {{ old('language') == 'Yoruba' ? 'selected' : '' }}>
                                                    Yoruba</option>
                                            </select>
                                        </div>
                                        @error('language')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group smalls">
                                        <input id="l2l" class="checkbox-custom" name="featured" type="checkbox"
                                            {{ old('featured', $course->featured) ? 'checked' : '' }}>
                                        <label for="l2l" class="checkbox-custom-label">Check this for featured
                                            course</label>
                                        @error('featured')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <div class="drios">
                                            <input id="l23" class="checkbox-custom" name="is_free" type="checkbox"
                                                {{ old('is_free', $course->is_free) ? 'checked' : '' }}>
                                            <label for="l23" class="checkbox-custom-label">Check this if Course is
                                                Free</label>
                                        </div>
                                        @error('is_free')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Course Price(NGN)</label>
                                        <input type="text" class="form-control" name="price" placeholder=""
                                            value="{{ old('price', $course->price) }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Discount Price(NGN)</label>
                                        <input type="text" class="form-control" name="discount_price" placeholder=""
                                            value="{{ old('discount_price', $course->discount_price) }}">
                                        <div class="drios">
                                            <input id="l22" class="checkbox-custom" name="has_discount"
                                                type="checkbox"
                                                {{ old('has_discount', $course->has_discount) ? 'checked' : '' }}>
                                            <label for="l22" class="checkbox-custom-label">Enable This
                                                Discount</label>
                                        </div>
                                        @error('discount_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Featured Video URL</label>
                                        <input type="text" class="form-control" name="video_url" placeholder=""
                                            value="{{ old('video_url', $course->video_url) }}">
                                        @error('video_url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group smalls">
                                        <label>Thumbnail</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="thumbnail">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        @if ($course->thumbnail)
                                            <img src="{{ asset($course->thumbnail) }}" width="200px" height="100px"
                                                class="img-fluid mt-2" alt="Current Thumbnail">
                                        @endif
                                        @error('thumbnail')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Course</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="/assets/js/components/tinymce/tinymce.min.js"></script>

    <script>
        jQuery(document).ready(function() {

            tinymce.init({
                selector: '#description',
                plugins: 'advlist autolink lists link charmap preview',
                toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | link',
                content_style: 'body { font-family: "Arial", sans-serif; font-size: 16px; }',
                menubar: false,
                setup: function(editor) {
                    editor.on('change', function(e) {
                        editor.save();
                    });
                }
            });

        });
    </script>
@endsection
