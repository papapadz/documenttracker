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

                    <form method="POST" class="row" action="{{ url('send-email') }}" >
                        @csrf()
                        <select class="multiple-select form-control" name="contacts[]" multiple="multiple" >
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                        </select>
                        <input type="text" class="form-control" name="email" />
                        <button type="submit" class="btn btn-success">Send</button>
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
    $('.multiple-select').select2({
        width:100
    });
});
</script>
@endsection