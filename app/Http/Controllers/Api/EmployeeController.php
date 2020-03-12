<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Employee;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //$emps = Employee::all();
        // return $emps;

        $emps = DB::table('emp_main')
            ->join('list_empjobtitle', 'emp_main.jobtitle', '=', 'list_empjobtitle.listid')
            ->join('list_empregistration', 'emp_main.registration', '=', 'list_empregistration.listid')
            ->select('emp_main.empid', 'emp_main.firstname', 'emp_main.lastname', 'list_empjobtitle.str1 as jobtitle', 'list_empregistration.str1 as registration')
            ->where('emp_main.empid', '>', '0')
            ->orderBy('emp_main.empid')
            ->get();
        return $emps;
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'jobtitle' => 'integer',
            'registration' => 'integer',
        ]);


        $emp = Employee::create($data);
        return response($emp, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Employee::find($id);
        return $emp;
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
    // public function update(Request $request,Employee $emp)
    // {
    //     $data = $request->validate([
    //         'firstname'=>'required|string',
    //         'lastname'=>'required|string',
    //         'jobtitle'=>'integer',
    //         'registration'=>'integer',
    //     ]);


    //     $emp->update($data);
    //     return response($emp, 200);
    // }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'jobtitle' => 'integer',
            'registration' => 'integer',
        ]);
        $emp = Employee::find($id);
        $emp->empid= $request->get('empid');
        $emp->firstname = $request->get('firstname');
        $emp->lastname = $request->get('lastname');
        $emp->jobtitle = $request->get('jobtitle');
        $emp->registration = $request->get('registration');
        $emp->save();
        return $emp;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp=Employee:: find($id);
        $emp->delete();
        return response('Deleted', 201) ;
    }
}
