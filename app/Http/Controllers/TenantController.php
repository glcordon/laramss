<?php

namespace App\Http\Controllers;

use App\Course;
use Stripe\Plan;
use Stripe\Stripe;
use App\Tenant as Mentor;
use Stancl\Tenancy\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        dd($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $tenants = tenancy()->all();
        $all_tenants = $tenants->map(function($x){
            $is_active = true;
            return [
                'name' => $x->data['name'] ?? '', 
                'thumb' => $x->data['thumb'] ?? '', 
                'description' => $x->data['description'] ?? '',
                'domain' => $x->domains[0] ?? '',
                'is_active' => $is_active ?? '',
                ];
        });
        
        return view('main.index', compact('all_tenants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thumb_path = Storage::disk('public')->put('tenants',$request->mentor_thumb);
        $mentor = Tenant::new()
            ->withDomains([Str::slug($request->desired_name).'.mysportsshare.com'])
            ->withData(['thumb' => $thumb_path,
                    'name' => $request->mentor_name,
                    'email' => $request->mentor_email,
                    'description' => $request->mentor_description,
                ])
                ->save();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Plan::create(array("amount" => 3000, 
        "interval" => "month", 
        "product" =>array("name" => $request->mentor_name." Mentee"), "currency" => "usd", "id" => $request->desired_name));
        Session::flash('message', $request->desired_name.' Was Created Successfully!');
        return Redirect::back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
