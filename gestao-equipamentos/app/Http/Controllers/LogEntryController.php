<?php 
namespace App\Http\Controllers;

use App\Models\LogEntry;
use Illuminate\Http\Request;

class LogEntryController extends Controller
{
    public function index()
    {
        return LogEntry::all();
    }

    public function store(Request $request)
    {
        return LogEntry::create($request->all());
    }
}
