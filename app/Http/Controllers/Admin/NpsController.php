<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Nps;
use App\Models\User;
use Illuminate\Http\Request;


class NpsController extends Controller
{
    public function list(Request $request)
    {
        $nps = Nps::all();

        return view('admin/nps/list', compact('nps'));
    }

    public function create(Request $request)
    {
        $location = new Nps();
        $location->name = $request->get('name');
        $location->location_number = $request->get('location_number');
        $location->save();

        return redirect()->back();
    }

    public function details($id)
    {
        $nps = Nps::findOrFail($id);
        $locations = Location::all();

        return view('admin/nps/view', compact('nps', 'locations'));
    }

    public function addLocation($id, Request $request)
    {
        $nps = Nps::findOrFail($id);
        $nps->locations()->syncWithoutDetaching([$request->get('location_id')]);
        $nps->save();

        return redirect()->back();
    }

    public function delete($id, $location_id)
    {
        $nps = Nps::findOrFail($id);
        $nps->locations()->detach($location_id);
        $nps->save();

        return redirect()->back();
    }

    public function smsHistory($id)
    {
        $user = User::find($id);
        $histories = UserSms::where('user_id', $id)->orderByDesc('id')->get();
        return view('admin/sms_history', compact('histories', 'user'));
    }

    public function paymentHistory($id)
    {
        $user = User::find($id);
        $payments = Payment::where('user_id', $id)->orderByDesc('id')->get();
        return view('admin/payment_history', compact('payments', 'user'));
    }

    public function toggleEnableUser(Request $request)
    {
        if ($request->filled(['active', 'id'])) {
            try {
                $moodle = new MoodleHelpers('core_user_update_users');

                $user = User::find($request->get('id'));
                $user->disable = $request->get('active');
                $user->save();
                foreach ($user->childrens as $children) {
                    if ($request->get('active') == 1) {
                        $moodle->deactivate_user($children->moodle_id);
                    } elseif ($request->get('active') == 0) {
                        $moodle->activate_user($children->moodle_id);
                    }
                }

                return response()->json(['status' => 'success']);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }

        return response()->json(['status' => 'error', 'message' => 'No mandatory parameters passed']);
    }
}
