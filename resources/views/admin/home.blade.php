@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            
                        @if(!(auth()->user()->roles[0]->id == 1) && !$enrollment_count)
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class='row'>
                                            <div class="col-4">
                                                Committee Preferance 1
                                            </div>
                                            <div class="col-4">
                                                Select Profolio
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-12">
                                        <div class='row'>
                                            <div class="col-4">
                                                <select class="browser-default custom-select dropdown" name='firstCommittee'>
                                                    <option value="0" selected>Committee Preferance 1</option>
                                                    @if (isset($committees) && count($committees))
                                                        @foreach ($committees as $committee)
                                                            <option value='{{ $committee->id }}'>{{ $committee->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="browser-default custom-select dropdown" name='firstPortfolio'>
                                                    <option value="0" selected>Select Portfolio</option>
                                                    @if (isset($protfolios) && count($protfolios))
                                                        @foreach ($protfolios as $protfolio)
                                                            <option value='{{ $protfolio->id }}'>{{ $protfolio->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-12">
                                        <div class='row'>
                                            <div class="col-4">
                                                Committee Preferance 2
                                            </div>
                                            <div class="col-4">
                                                Select Profolio
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-12">
                                        <div class='row'>
                                            <div class="col-4">
                                                <select class="browser-default custom-select dropdown" name='secondCommittee'>
                                                    <option value="0" selected>Committee Preferance 2</option>
                                                    @if (isset($committees) && count($committees))
                                                        @foreach ($committees as $committee)
                                                            <option value='{{ $committee->id }}'>{{ $committee->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="browser-default custom-select dropdown" name='secondPortfolio'>
                                                    <option value="0" selected>Select Portfolio</option>
                                                    @if (isset($protfolios) && count($protfolios))
                                                        @foreach ($protfolios as $protfolio)
                                                            <option value='{{ $protfolio->id }}'>{{ $protfolio->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-12">
                                        <div class='row'>
                                            <div class="col-4">
                                                Committee Preferance 3
                                            </div>
                                            <div class="col-4">
                                                Select Profolio
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-12">
                                        <div class='row'>
                                            <div class="col-4">
                                                <select class="browser-default custom-select dropdown" name='thirdCommittee'>
                                                    <option value="0" selected>Committee Preferance 3</option>
                                                    @if (isset($committees) && count($committees))
                                                        @foreach ($committees as $committee)
                                                            <option value='{{ $committee->id }}'>{{ $committee->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select class="browser-default custom-select dropdown" name='thirdPortfolio'>
                                                    <option value="0" selected>Select Portfolio</option>
                                                    @if (isset($protfolios) && count($protfolios))
                                                        @foreach ($protfolios as $protfolio)
                                                            <option value='{{ $protfolio->id }}'>{{ $protfolio->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                Delegation fees :- ₹2000  
                                <br/>
                                <br/>
                                <div class="col-4">
                                    <select class="browser-default custom-select dropdown" name='payment_mode' id='payment_mode'>
                                        <option value="1" selected>Offline</option>
                                        <option value='2'>Online</option>
                                    </select>
                                </div>
                                <br/>
                            <div id='message' > </div>
                                <br/>
                                <br/>
                                <button type="submit" class="btn btn-primary submit">Submit</button>
                                <button type="button" class="btn btn-secondary reset">Reset</button>
                            </form>  
                        @else
                            @if(auth()->user()->roles->pluck('id')[0] == 2)
                                You have aleardy submitted form successfully
                            @else
                                You are logged in
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var data = {};
                $.each($('form').serializeArray(), function(i, field) {
                    data[field.name] = field.value;
                });
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to update your form!",
                    icon: "warning",
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "{{ url('/') }}" + "/admin/submitform",
                            type: 'POST',
                            data:data,
                            beforeSend: (xhr) => {
                                return 'bsdb';
                            },
                            success: function(result, status, xhr) {
                                console.log(result);
                                if (status == 'success') {
                                    swal({
                                        title: 'Submitted!',
                                        text: result.message,
                                        icon: 'success'
                                    })
                                }
                            },
                            error: function(request, status, errorThrown) {
                                console.log(errorThrown);
                                swal({
                                    title: 'Error!',
                                    text: 'result.message',
                                    icon: 'error'
                                })
                            }
                        }).done(function() {
                            setTimeout(function() {
                                location.reload()
                            },2000);
                            
                        })
                    }
                })
            })

            $(document).on('click', '.reset', function(e) {
                $('.dropdown').val("0")
            })

            $(document).on('change', '#payment_mode', function(e) {
                if($(this).val() == 2){
                    $('#message').html('Kindly check your registered email for payment details.')
                } else {
                    $('#message').html('')
                }
            })
        })
    </script>
@endsection
