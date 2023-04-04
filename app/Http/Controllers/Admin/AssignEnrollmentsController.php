<?php

namespace App\Http\Controllers\Admin;

use App\Committee;
use App\Portfolio;
use App\Enrollment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AssignEnrollmentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enrollment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $committees = Committee::select('id','name')->get()->makeHidden('photo')->toArray();
        $portfolios = Portfolio::select('id','name')->get()->makeHidden('logo')->toArray();
        $enrollments = Enrollment::select('id','status','selected','user_id','committee_id','portfolio_id')
                ->with(['committee:id,name','portfolio:id,name','user:id,name,exp,ach,school'])->get()->append(['committee_name','user_name','portfolio_name'])->toArray();
        $enrollments = collect($enrollments)->groupBy('user_id')->values()->all();
        $response = [];
        foreach($enrollments as $enrollment){
            $temp = $enrollment[0];
            $temp['status'] = in_array('accepted',collect($enrollment)->pluck('status')->values()->all()) ? 'accepted' : 'awaiting';
            unset($temp['committee']);
            unset($temp['portfolio']);
            $temp['committee_name'] = json_encode(collect($enrollment)->pluck('committee_name')->values()->all());   
            $selected = collect($enrollment)->where('selected',1)->first();
            $temp['portfolio_name'] = $selected ? $selected['portfolio_name'] : json_encode(collect($enrollment)->pluck('portfolio_name')->values()->all());
            $temp['committees'] = collect($enrollment)->map(function ($enroll) {
                return [
                    'selected' => $enroll['selected'],
                    'id' => $enroll['id'],
                    'committee_id' => $enroll['committee']['id'],
                    'committee_name' => $enroll['committee']['name'],
                ];
            });
            $response[] = $temp; 
        }

        return view('admin.assignEnrollments.index', [
            'enrollments' => $response,
            'committees' => json_encode($committees),
            'portfolios' => json_encode($portfolios),
        ]);
    }

    public function getPortfolio(){
        if(request()->filled('id')){
            $enrollment = Enrollment::with('portfolio')->find(request('id'));
            $this->updateStatus($enrollment->id);
            return response()->json([
                'id' => $enrollment->portfolio_id,
                'name' => $enrollment->portfolio->name
            ],200);
        }
    }  

    public function enrollmentSave(){
        if(request()->filled("user_id") && request()->filled("status") && request()->filled('committee_id') && request()->filled('portfolio_id')){
            $user_id = request('user_id');
            $update = [];
            if(request('status') == 'accepted'){
                $update['status'] = 'awaiting';
            }
            if(request('selected') == 1){
                $update['selected'] = 0;
            }
            if(request('selected') == 1 || request('status') == 'accepted'){
                Enrollment::where('user_id',$user_id)->update($update);
            }
            Enrollment::create([
                'user_id' => $user_id,
                'committee_id' => request('committee_id'),
                'portfolio_id' => request('portfolio_id'),
                'status' => request('status'),
                'selected' => 1,
            ]);
            $committees = Enrollment::join('committees', 'enrollments.committee_id', '=', 'committees.id')
            ->get(['enrollments.selected', 'enrollments.id','committees.name'])->map(function ($enroll) {
                return [
                    'selected' => $enroll['selected'],
                    'id' => $enroll['id'],
                    'committee_name' => $enroll['name']
                ];
            });
            $portfolio = Portfolio::find(request('portfolio_id'));
            return response()->json(['committees' => json_encode($committees) , 'portfolio' => $portfolio ],200);
        }else{
            return response()->json(['request' => request()->all()],400);
        }
        
    }  

    public function updateStatus($id){
        if(request()->filled('status')){
            $enrollment = Enrollment::find($id);
            if(request('status') == 'accepted'){
                Enrollment::where('user_id',$enrollment->user_id)->update([
                    'status' => 'awaiting',
                    'selected' => 0,
                ]);
            }
            $enrollment = Enrollment::find($id);
            $enrollment->status = request('status');
            $enrollment->selected = 1;
            $enrollment->save();
        }
        return response()->json(['message' => 'successful'],200);
    }
}
