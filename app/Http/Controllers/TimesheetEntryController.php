<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimesheetEntryRequest;
use App\Models\TimesheetEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetEntryController extends Controller
{

    public function storeEntry(Request $request)
    {

        TimesheetEntry::create([
            'date'=>$request->input('date'),
            'description'=>$request->input('description'),
            'developer_id'=>Auth::guard('dev')->id(),
            'project_id'=>$request->input('project_id'),
            'module_id'=>$request->input('module_id'),
            'task_id'=>$request->input('task_id'),
            'worked_time' => $request->input('worked_time'),
        ]);

        return \redirect()->route('developer.timesheet')->with('entry-created','Entry created successfully!');

    }
    public function updateEntry(Request $request,$id)
    {
        $dev = \Auth::guard('dev')->user();

        $entry = $dev->timesheetEntries()->with('task.module.project')->where('id',$id)->get();

        return view('timesheet.update-entry',['entry'=>$entry]);
    }

    public function update(Request $request,$id)
    {
        $entry = TimesheetEntry::find($id);

        $entry->update([
            'date'=>$request->input('date'),
            'description'=>$request->input('description'),
            'project_id'=>$request->input('project_id'),
            'module_id'=>$request->input('module_id'),
            'task_id'=>$request->input('task_id'),
            'worked_time'=>$request->input('worked_time'),
        ]);

        return redirect()->route('developer.timesheet')->with('entry-updated','Timesheet entry updated');
    }

    public function deleteEntry($id)
    {
        $entry = \DB::table('timesheet_entries')->where('id',$id)->delete();
        return redirect()->back()->with('entry-delete','Entry Deleted successfully');
    }
}
