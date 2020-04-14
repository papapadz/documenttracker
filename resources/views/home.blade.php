@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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

                    <form method="POST" action="{{ url('send-email') }}" enctype="multipart/form-data">
                        @csrf()
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label>Message Recepients: </label>
                                <select class="multiple-select form-control" name="contacts[]" multiple="multiple" >
                                    @foreach($users as $user)
                                        <option value="{{ $user->email }}">{{ $user->name }}</option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-8">
                                <label>Type of Communication: </label>
                                <select class="form-control" name="type" >
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->doc_type }}</option>
                                    @endforeach    
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>No.: </label>
                                <input type="number" class="form-control" name="no" value="{{old('no')}}" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>Control No.: </label>
                                <input type="text" class="form-control" name="control_no" value="{{old('control_no')}}" />
                            </div>
                            <div class="col-md-6">
                                <label>Date: </label>
                                <input type="date" class="form-control" name="doc_date" value="{{old('doc_date')}}" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label>Subject: </label>
                                <input type="text" class="form-control" name="subject" value="{{old('subject')}}" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label>Originator: </label>
                                <input type="texst" class="form-control" name="originator" value="{{old('originator')}}" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label>PDF File: </label>
                                <input type="file" class="form-control" name="file" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.multiple-select').select2();
});
</script>
@endsection