<?php

namespace App\Http\Controllers;

use App\Models\TimesheetEntry;
use Illuminate\Http\Request;

class TimesheetEntryController extends Controller
{
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
        return $entry;
    }
}
