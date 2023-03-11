@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                             <p style="font-family: initial;text-align: -webkit-center;font-size: x-large;font-weight: 700;">
                                 The registrations for Indore World Summit 2022 are now closed. <br>
                                 We look forward to hosting you next year.<br><br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class='row'>
                                        
                        <p style="font-family: auto"><span> Connect : <a href="https://wa.me/+919424536621" target="_blank">Whatsapp</a></p></span>
                                        
                                        <div class='col-6 text-right'>
                                            Already a User? <a href="{{ route('login') }}"> login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
