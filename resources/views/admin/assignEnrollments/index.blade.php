@extends('layouts.admin')
@section('content')
    @can('enrollment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.enrollments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.enrollment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.enrollment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Enrollment">
                    <thead>
                        <tr>
                            <th>
                                {{ trans('cruds.enrollment.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.enrollment.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.enrollment.fields.committee') }}
                            </th>
                            <th>
                                {{ trans('cruds.enrollment.fields.portfolio') }}
                            </th>
                            <th>
                                MUN Experience
                            </th><th>
                                MUN Achievements
                            </th>
                            <th>
                                {{ trans('cruds.enrollment.fields.status') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $key => $enrollment)
                            <tr data-entry-id="{{ $enrollment['id'] }}" class='table-row'>
                                <td class='table-data table-data-id'>
                                    {{ $enrollment['id'] ?? '' }}
                                </td>
                                <td class='table-data table-data-user-name' data-user-id='{{ $enrollment['user_id'] ?? '' }}'>
                                    {{ $enrollment['user_name'] ?? '' }}
                                </td>
                                <td class='table-data table-data-committee'>
                                    <select class="browser-default custom-select committee_id" >
                                        <option value ='0'>select committee</option>
                                        @foreach ($enrollment['committees'] as $committee1)
                                            <option value={{ $committee1['id'] }} {{ $committee1['selected'] == 1 ? 'selected' : '' }} > {{ $committee1['committee_name'] }} </option>
                                        @endforeach
                                        <option value ='manual' >Manual Select</option>
                                    </select>
                                </td>
                                <td class='table-data table-data-portfolio'>
                                    {{ $enrollment['portfolio_name'] ?? '' }}
                                </td>
                                <td class='table-data'>
                                    {{ $enrollment['user']['exp'] ?? '' }}
                                </td>
                                <td class='table-data'>
                                    {{ $enrollment['user']['ach'] ?? '' }}
                                </td>
                                <td class='table-data table-data-status'>
                                    <div class="dropdown">
                                        <button type="button" data-status={{$enrollment['status']}} class="btn {{$enrollment['status'] == 'awaiting' ? 'btn-danger':'btn-success' }} status">{{ucfirst($enrollment['status'])}}</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function (e){
            let $committees = "{{ $committees }}"
            let $portfolios = "{{ $portfolios }}"
            $committees = JSON.parse($committees.replace(/&quot;/g, '\"'));
            $portfolios = JSON.parse($portfolios.replace(/&quot;/g, '\"'));

            $(document).on('change','.committee_id',async function (){
                let $this = $(this);
                let $value = $this.val();
                let user_id = $this.closest('.table-row').find('.table-data-user-name').data('user-id');
                let status = $this.closest('.table-row').find('.status').data('status');
                if($value == 'manual'){
                    $(this).after(committe_dropdown($committees,'committee_second_id'))
                    $(this).closest('.table-row').find('.table-data-portfolio').html(portfolio_dropdown($portfolios))
                }else{
                    $(this).parent().find('.committee_second_id').remove()
                    let data = {
                        id : $value,
                        status : status,
                    }
                    await $.ajax({
                        url: "{{ url('/') }}" + "/admin/assign-enrollments/getPortfolio",
                        type: 'GET',
                        data:data,
                        success: function(result, status, xhr) {
                            $this.closest('.table-row').find('.table-data-portfolio').html(result.name)                                 
                        },
                        error: function(request, status, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                }
            })

            $(document).on('click','.status',async function (){
                $this = $(this);
                if($(this).data('status') == 'awaiting'){
                    $(this).data('status','accepted')
                    $(this).removeClass('btn-danger').addClass('btn-success')
                    $(this).html('Accepted')
                } else {
                    $(this).data('status','awaiting')
                    $(this).removeClass('btn-success').addClass('btn-danger')
                    $(this).html('Awaiting')
                }

                await $.ajax({
                        url: "{{ url('/') }}" + "/admin/assign-enrollments/updateStatus/"+ $this.closest('.table-row').find('.committee_id').val(),
                        type: 'PUT',
                        data:{
                            status : $this.data('status')
                        },
                        success: function(result, status, xhr) {
                            console.log(result);
                        },
                        error: function(request, status, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
            });

            $(document).on('click','.save',async function (){
                $this = $(this)
                $temp = $this.closest('.table-row')
                let user_id = $this.closest('.table-row').find('.table-data-user-name').data('user-id');
                data = {
                    'committee_id' : $temp.find('.committee_second_id').val(),
                    'portfolio_id' : $temp.find('.porfolio_id').val(),
                    'status' : $temp.find('.status').data('status'),
                    'user_id' : user_id,
                }
                $temp.find('.committee_second_id').remove()
                $temp.find('.table-data-portfolio').html('')
                await $.ajax({
                        url: "{{ url('/') }}" + "/admin/assign-enrollments/enrollmentSave",
                        type: 'POST',
                        data:data,
                        success: function(result, status, xhr) {
                            $committees = JSON.parse(result.committees.replace(/&quot;/g, '\"'));
                            console.log($committees)
                            $temp.find('.committee_id').html(committe_dropdown($committees,'committee_id'));
                            $temp.find('.portfolio_id').html(result.portfolio.name);
                        },
                        error: function(request, status, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
            });

            function portfolio_dropdown(data){
                $respose = "<div class=row><select class='col-10 browser-default custom-select porfolio_id'>"
                data?.forEach(function (item,index) {
                    $respose += `<option value=${item.id} >${item.name}</option>`
                })    
                return $respose += "</select><button type='button' class='col-2 btn btn-primary save'>Save</button></div>"
            }

            function committe_dropdown(data,$type){
                let $response = `<select class='browser-default custom-select ${$type}'>`
                    data?.forEach(function (item, index) {
                        selected = item.selected == 1? 'selected' : '';
                        $response += `<option value=${item.id} ${selected} >${ $type == 'committee_id' ? item.committee_name : item.name }</option>`
                    })
                    if($type == 'committee_id'){
                        $response += "<option value='manual' > Select Manual </option>"
                    }
                    return $response += "</select>"
            }
        })
    </script>
@endsection
