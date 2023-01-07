@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h2 class="content-title mb-0 my-auto">{{ config('languageString.edit_language') }}</h2>

            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" data-parsley-validate="" id="addEditForm" role="form">
                        @csrf
                        <input type="hidden" id="edit_value" name="edit_value" value="{{ $language->id }}">
                        <input type="hidden" id="form-method" value="edit">
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">{{ config('languageString.name') }} <span
                                            class="error">*</span></label>
                                    <input type="text" class="form-control"
                                           name="name" value="{{$language->name}}"
                                           id="name"
                                           placeholder="Name" required/>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="is_rtl">{{ config('languageString.is_rtl') }}<span
                                            class="error">*</span></label>
                                    <select class="form-control select2" id="is_rtl" name="is_rtl">
                                        <option value="">{{ config('languageString.select_option') }}</option>
                                        <option value="0"
                                                @if($language->is_rtl==0) selected @endif>{{ config('languageString.ltr') }}</option>
                                        <option value="1"
                                                @if($language->is_rtl==1) selected @endif>{{ config('languageString.rtl') }}</option>
                                    </select>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="language_code">{{ config('languageString.language_code') }}<span
                                            class="error">*</span></label>
                                    <input type="text" class="form-control"
                                           name="language_code"
                                           id="language_code" value="{{$language->language_code}}"
                                           placeholder="Language Code" required/>
                                    <div class="help-block with-errors error"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">{{ config('languageString.image') }} <span
                                            class="error">*</span></label>
                                    <input type="file" class="form-control dropify"
                                           name="image" data-default-file="{{url($language->language_image)}}"
                                           id="image"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0 mt-3 justify-content-end">
                                    <div>
                                        <button type="submit"
                                                class="btn btn-success">{{ config('languageString.submit') }}
                                        </button>
                                        <a href="{{ route('admin.language.index') }}"
                                           class="btn btn-secondary">{{ config('languageString.cancel') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{URL::asset('assets/js/custom/language.js')}}?v={{ time() }}"></script>
@endsection