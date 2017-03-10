<?php

namespace App\Http\Controllers;

use App\Child;
use App\Fee;
use App\Member;
use App\Family;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = $request->user()->organization->members;
        return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'first_name'     => 'required',
           'last_name'      => 'required',
           'date_of_birth'  => 'required',
           'address'        => 'required',
           'postal_code'    => 'required',
           'city'           => 'required',
           'telephone'      => 'required',
           'email'          => 'required'
       ]);

        $family = new Family([
            'name'           => $request->last_name,
            'address'        => $request->address,
            'postal_code'    => $request->postal_code,
            'city'           => $request->city
        ]);
        $family->save();

        $member = new Member([
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'personnummer'   => $request->date_of_birth,
            'address'        => $request->address,
            'postal_code'    => $request->postal_code,
            'city'           => $request->city,
            'telephone'      => $request->telephone,
            'email'          => $request->email,
            'interests'      => serialize($request->interests),
            'membership'     => max($request->membership),
            'familiy_id'     => $family->id
        ]);

        if(!$member->save())
        {
            flash('Ett fel uppstod, medlemmen kunde inte registreras.', 'danger');
            return redirect()->back();
        }

        $member->organization_id = $request->user()->organization_id;
        $member->save();

        //Create fee
        $fee = new Fee([
            'member_id' => $member->id,
            'year' => date('Y'),
            'paid' => false
        ]);
        $fee->save();

        //If second person exists then validate and create second member
        if($request->first_name_2 != null)
        {
            $validator = Validator::make($request->all(), [
                'first_name_2'     => 'required',
                'last_name_2'      => 'required',
                'date_of_birth_2'  => 'required',
                'telephone_2'      => 'required',
                'email_2'          => 'required'
            ]);

            if (!$validator->fails())
            {
                $member = new Member([
                    'first_name'     => $request->first_name_2,
                    'last_name'      => $request->last_name_2,
                    'personnummer'   => $request->date_of_birth_2,
                    'address'        => $request->address,
                    'postal_code'    => $request->postal_code,
                    'city'           => $request->city,
                    'telephone'      => $request->telephone_2,
                    'email'          => $request->email_2,
                    'interests'      => serialize($request->interests),
                    'membership'     => max($request->membership),
                    'familiy_id'     => $family->id
                ]);

                $member->organization_id = $request->user()->organization_id;
                $member->save();

                //Create fee
                $fee = new Fee([
                    'member_id' => $member->id,
                    'year' => date('Y'),
                    'paid' => false
                ]);
                $fee->save();
            }

        }

        //Add children
        foreach ($request->child_first_name as $key => $child_first_name)
        {
            if($request->child_first_name[$key] && $request->child_last_name[$key] && $request->child_date_of_birth[$key])
            {
                $data = [
                    'first_name'     => $request->child_first_name[$key],
                    'last_name'      => $request->child_last_name[$key],
                    'personnummer'   => $request->child_date_of_birth[$key],
                    'address'        => $request->address,
                    'postal_code'    => $request->postal_code,
                    'city'           => $request->city,
                    'interests'      => serialize($request->interests),
                    'membership'     => max($request->membership),
                    'organization_id' => $request->user()->organization_id,
                    'familiy_id'     => $family->id
                ];
                $child = new Member($data);
                $child->save();
            }
        }

        flash('Formuläret har sparats!', 'success');
        return redirect('member');
    }

    /**
     * Display the specified resource.
     *
     * @param Member $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createPrintable()
    {

    }
}
