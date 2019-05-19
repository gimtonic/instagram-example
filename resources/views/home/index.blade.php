@extends('adminlte::page')

@section('title', 'Instagram example')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-sx-10 col-lg-10">
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <h3 class=" text-center">Messaging</h3>
                        </div>
                        <div class="inbox_chat">
                            @foreach($threads as $thread)
                                <user-chart-last-comment :thread="{{ $thread }}"></user-chart-last-comment>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@stop