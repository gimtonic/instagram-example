@extends('adminlte::page')

@section('title', 'Instagram example')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sx-10 col-lg-10">
                <div class="mesgs">
                    <div class="msg_history">
                        @foreach($items as $item)
                            <chat-message
                                    :item="{{ $item }}"
                                    :current-user-pk="{{ $currentUserPk }}"
                                    :answer-user="{{ $answerUser }}" >
                            </chat-message>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@stop