@extends('layouts.master')
@section('content')
    <div id="invoice">
<div class="panel panel-default">
    <div class="panel-heading">
<div class="clearfix">
    <span class="panel-heading">Create Invoice</span>
    <a href="{{route('invoices.index')}}" class="btn btn-default pull-right">Back</a>
</div>
    </div>
    <div class="panel-body">
        @include('invoices.form')
    </div>
    <div class="panel-footer">
        <a href="{{route('invoices.index')}}" class="btn btn-default pull-right">Cancel</a>
        <a href="{{ route('invoices.create') }}">  <button  class="btn btn-success">Create</button></a>
    </div>
</div>
    </div>
@endsection
@push('scripts')
<script src="/js/vue.min.js"></script>
<script src="/js/vue-resource.min.js"></script>
<script type="text/javascript">
    Vue.http.headers.common['X-CSRF-TOKEN']='{{csrf_token()}}';
    window._form={
        invoice_no:'',
       client:'',
        client_address:'',
        title:'',
        discount:'0',
        items:[{
            name:'',
            price:'',
            quantity:'1'
        }]


    };
</script>
<script src="/js/app.js"></script>
@endpush