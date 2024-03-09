@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper mt-100">
                    <div class="pull-right">
                        <a class="btn btn-dark" href="{{ route('position.index') }}"> ወደ ኋላ</a>
                    </div>
                    <h5 class="hk-sec-title"> በአስተዳዳሪው የሚሞላ መረጃ </h5>
                    {{-- <p class="mb-25">Edit staff forms </p> --}}

                    <div class="row">
                        <div class="col-sm">
                            <form action="{{ route('position.update', $admin->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"> የስራ መደብ</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $admin->position }}"
                                            name="position"class="form-control @error('position') is-invalid @enderror"
                                            id="inputname" placeholder=" የስራ መደብ">
                                        @error('position')
                                            <span class=" error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="job_category_id" class="col-sm-2 col-form-label">የስራ ክፍል</label>
                                    <div class="col-sm-10">
                                        <select class="form-control custom-select  mt-15" name="job_category_id">

                                            @foreach ($job_category as $col)
                                                <option value="{{ $col->id }}"
                                                    {{ $col->id == $admin->job_category_id ? 'selected' : '' }}>
                                                    {{ $col->job_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="edu_level" class="col-sm-2 col-form-label">የትምህርት ደረጃ</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $admin->edu_level }}"
                                            name="edu_level"class="form-control @error('edu_level') is-invalid @enderror"
                                            id="edu_level" placeholder="የትምህርት ደረጃ ">
                                        @error('edu_level')
                                            <span class=" error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"> የስራ ልምድ </label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $admin->experience }}"
                                            name="experience"class="form-control @error('experience') is-invalid @enderror"
                                            id="inputname" placeholder=" ">
                                        @error('experience')
                                            <span class=" error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"> ብዛት </label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $admin->quantity }}"
                                            name="quantity"class="form-control @error('quantity') is-invalid @enderror"
                                            id="inputname" placeholder=" ">
                                        @error('quantity')
                                            <span class=" error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="position_type_id" class="col-sm-2 col-form-label">የስራ መደብ ዓይነት</label>
                                    <div class="col-sm-10">
                                        <select class="form-control custom-select  mt-15" name="position_type_id">

                                            @foreach ($pos as $col)
                                                <option value="{{ $col->id }}"
                                                    {{ $col->id == $admin->position_type_id ? 'selected' : '' }}>
                                                    {{ $col->position_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                 <div class="form-group row">
                                    <label for="education_type" class="col-sm-2 col-form-label"> የትምህርት ዝግጅት </label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $admin->education_type }}"
                                            name="education_type"class="form-control @error('education_type') is-invalid @enderror"
                                            id="education_type" placeholder="የትምህርት ዝግጅት ">
                                        @error('education_type')
                                            <span class=" error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="level" class="col-sm-2 col-form-label">ደረጃ</label>
                                    <div class="col-sm-10">
                                        <select class="form-control custom-select  mt-15" name="level">

                                            @foreach ($level as $col)
                                                <option value="{{ $col->level }}"
                                                    {{ $col->level == $admin->level ? 'selected' : '' }}>
                                                    {{ $col->level }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="position_type_id" class="col-sm-2 col-form-label">የስራ መደብ ክፍል</label>
                                    <div class="col-sm-10">
                                        <select class="form-control custom-select  mt-15" name="category_id">

                                            @foreach ($category as $col)
                                                <option value="{{ $col->id }}"
                                                    {{ $col->id == $admin->category_id ? 'selected' : '' }}>
                                                    {{ $col->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-0 pull-right">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
