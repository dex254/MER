<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    //
    public function stafflogin()
    {
        return view('staff.login'); // Assuming 'Staff.login' is the name of your login page view
    }
    public function index()
    {
        return view('staff.register');
    }
    //registration log
    public function store(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'name' => 'required|string',
            'idnumber' => 'required|string|unique:staff',
            'phone' => 'required|string|unique:staff',
            'email' => 'required|string|unique:staff',
            'department' => 'required|string',
            'campus' => 'required|string',
            'designation' => 'required|string',
            'password' => 'required|string',


                ]);
                $existingstaff = Staff::where('email', $validatedData['email'])
                ->orWhere('phone', $validatedData['phone'])
                ->orWhere('idnumber', $validatedData['idnumber'])
                ->first();

            if ($existingstaff) {
                // staff already exists, show error message
                return redirect()->back()->withErrors([
                    'email' => 'Do you already have an account?',
                    'idnumber' => 'Do you already have an account?',
                    'phone' => 'Do you already have an account?',
                ]);
            }


        $staff = new Staff();
        $staff->name = $validatedData['name'];
        $staff->idnumber = $validatedData['idnumber'];
        $staff->phone = $validatedData['phone'];
        $staff->email = $validatedData['email'];
        $staff->department = $validatedData['department'];
        $staff->designation = $validatedData['designation'];
        $staff->campus = $validatedData['campus'];

        $staff->password =  Hash::make($validatedData['password']);

        $staff->save();

        // Redirect back with a success message
        if ($staff->save()) {
            // Redirect back with a success message
            return redirect()->back()->with('success', 'You have regisatred to the KSG MER  system. Welcome!');
        } else {
            // Redirect back with an error message in case of failure
            return redirect()->back()->withErrors([
                'general' => 'An error occurred while storing data. Please try again later.',
            ]);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find Staff by email
        $staff = Staff::where('email', $credentials['email'])->first();

        // Check if Staff exists and password matches
        if  ($staff && Hash::check($credentials['password'], $staff->password)) {
            Auth::guard('staff')->login($staff);
        
            // Set status to online
            $staff->is_online = true;
            $staff->save();
            return redirect()->route('staff.Dashboard');
        } else {
            return redirect()->route('staff')->withErrors([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }
    }

    public function staffDashboard()
    {
        
        return view('staff.Dashboard'); // Example: Load Staff dashboard view
    }

    public function logout(Request $request)
    {

        $staff = Auth::guard('staff')->user();
        $staff = new Staff();
        if ($staff) {
        // Set status to offline
        $staff->is_online = false;
        $staff->save();
    }
        Auth::guard('staff')->logout();
        // Logout the Staff user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('/staff/Login'); // Redirect to Staff login page
    }
    public function destroy(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        
        if ($staff) {
        // Set status to offline
        
        $staff->is_online = false;
        $staff->save();
    }
        Auth::guard('staff')->logout(); // Logout the Staff user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('staff'); // Redirect to Staff login page
    }
    public function profile(Request $request)

    {
    $staff = $request->staff;


    // Return a response or pass the data to the view
    return view('staff.profile', compact('staff'));

    }
    public function passedit()
    {

        $staff = Auth::guard('staff')->user();

        return view('staff.passedit', compact('staff'));

    }

    public function passupdate(Request $request)
    {
        // Validate the input
        $request->validate([
            'cpassword' => 'required',
            'npassword' => 'required|string|min:8|confirmed',
        ]);

        $staff = Auth::guard('staff')->user();

        // Check if the current password is correct
        if (!Hash::check($request->cpassword, $staff->password)) {
            return back()->withErrors(['cpassword' => 'The current password is incorrect.']);
        }

        // Update the password
        $staff->password = Hash::make($request->npassword);
        
        $staff->save();

        return back()->with('success', 'Password updated successfully.');
    }
    public function userupdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
    
        
        $staff = Auth::guard('staff')->user();
    
        // Check if the provided current password matches the authenticated participant's password
        if (!Hash::check($request->current_password, $staff->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }
    
        // Update the participant's password
        $staff->password = Hash::make($request->password);
      
        $staff->save();
    
        return redirect()->route('staff')->with('success', 'Password updated successfully.');
    
    }

}
