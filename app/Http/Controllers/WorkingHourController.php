<?php

namespace App\Http\Controllers;

use App\Models\WorkingHour;
use Illuminate\Http\Request;

class WorkingHourController extends Controller
{
    public function getWorkingHours()
    {
        $workingHours = WorkingHour::orderByRaw("FIELD(day, 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday')")->get();
        return response()->json($workingHours);
    }
    public function index()
    {
        $workingHours = WorkingHour::orderByRaw("FIELD(day, 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday')")->get();
        return view('admin.workingHour.index', compact('workingHours'));
    }

    public function edit()
    {
        $workingHours = WorkingHour::orderByRaw("FIELD(day, 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday')")->get();
        return view('admin.workingHour.edit', compact('workingHours'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'working_hours' => 'required|array',
            'working_hours.*.open_time' => 'nullable|date_format:H:i',
            'working_hours.*.close_time' => 'nullable|date_format:H:i',
            'working_hours.*.is_closed' => 'boolean'
        ]);

        foreach ($request->working_hours as $id => $data) {
            $workingHour = WorkingHour::findOrFail($id);

            $updateData = [
                'is_closed' => $data['is_closed'] ?? false,
            ];

            // Only set time fields if not closed
            if ($updateData['is_closed']) {
                $updateData['open_time'] = null;
                $updateData['close_time'] = null;
            } else {
                $updateData['open_time'] = $data['open_time'] ?? null;
                $updateData['close_time'] = $data['close_time'] ?? null;
            }

            $workingHour->update($updateData);
        }

        return redirect()->route('admin.workingHour.index')
            ->with('success', 'Working hours updated successfully.');
    }
}
