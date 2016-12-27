<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Agenda;
use App\Category;
use DB;

class AgendaController extends Controller
{
    public function index($id = null) 
    {

        $now = date('Y-m-d H:i:s');

        $categories = Category::all();

        if($id) {

            $agendas = DB::table('cbl_agenda')
                        ->select('*', 'cbl_agenda.id as id', 'cbl_agenda.name as name', 'cbl_category.name as category_name')
                        ->join('cbl_category', 'cbl_agenda.category_id', '=', 'cbl_category.id')
                        ->where('cbl_agenda.date', '>', $now)
                        ->where('cbl_category.id', '=', $id)
                        ->whereNull('cbl_agenda.deleted_at')
                        ->orderBy('cbl_category.name')
                        ->get();

        } else {
    	   
           $agendas = DB::table('cbl_agenda')
                        ->select('*', 'cbl_agenda.id as id', 'cbl_agenda.name as name', 'cbl_category.name as category_name')
                        ->join('cbl_category', 'cbl_agenda.category_id', '=', 'cbl_category.id')
                        ->where('cbl_agenda.date', '>', $now)
                        ->whereNull('cbl_agenda.deleted_at')
                        ->orderBy('cbl_agenda.date')
                        ->get();

        }

    	return view('admin.agenda.index', compact('agendas', 'categories', 'id'));
    }

    public function create() 
    {
        $categories = Category::all();
        return view('admin.agenda.create', compact('categories'));
    }

    public function createSave(Request $request) 
    {
        $agenda = new Agenda();
        $newdate = new \DateTime($request->date);
        $agenda->date = $newdate->format("Y-m-d H:i:s");
        $agenda->name = $request->name;
        $agenda->category_id = $request->category;
        $agenda->location = $request->location;
        $agenda->save();
        
        return redirect('/admin/agenda/index');
    }

    public function edit($agenda_id)
    {
        $agenda = Agenda::find($agenda_id);
        $categories = Category::all();

    	return view('admin.agenda.edit', compact('agenda', 'categories'));
    }

    public function editSave(Agenda $agenda, Request $request) 
    {   

        $categories = Category::all();
        $newdate = new \DateTime($request->date);
        $agenda->date = $newdate->format("Y-m-d H:i:s");
        $agenda->name = $request->name;
        $agenda->category_id = $request->category;
        $agenda->location = $request->location;
        $agenda->save();

        return view('admin.agenda.edit', compact('agenda', 'categories'));
    }

    public function delete(Agenda $agenda)
    {
        $agenda->delete();
        return redirect('/admin/agenda');
    }

}
