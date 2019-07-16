@extends('layouts.clock')

    @section('content')
    
    <div class="container-fluid">
        <input type="hidden" id="_url" value="{{url('/')}}">
    </div>

    @endsection

    @section('scripts')
    
    <script type="text/javascript">    
        localStorage.clear();
         var url = $("#_url").val();
         window.location = url + "/clock";                
    </script> 

    @endsection