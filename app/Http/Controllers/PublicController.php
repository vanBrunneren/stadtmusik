<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\Celebration;
use App\Category;
use App\Portrait;
use App\ContactForm;
use App\Http\Requests;
use DB;
use Mail;
use Gate;

class PublicController extends Controller
{
   	public function home() 
   	{
         $home = Home::first();

   		return view('public.home', compact('home'));
   	}

   	public function celebration() 
   	{
         $celebration = Celebration::first();

   		return view('public.celebration', compact('celebration'));
   	}

   	public function agenda() 
   	{

         $tempcat = Category::all();

         $agendas = DB::table('cbl_agenda')
                        ->select('*', 'cbl_agenda.id as id', 'cbl_agenda.name as name', 'cbl_category.name as category_name')
                        ->join('cbl_category', 'cbl_agenda.category_id', '=', 'cbl_category.id')
                        ->where('cbl_agenda.date', '>', date('Y-m-d H:i:s'))
                        ->orderBy('date')
                        ->get();


         $categories = array();
         foreach($tempcat as $cat) {
            foreach($agendas as $agenda) {
               if($agenda->category_id == $cat->id) {
                  if(!in_array($cat, $categories)) {
                     $categories[] = $cat;
                  }
               }
            }
         }

   		return view('public.agenda', compact('agendas', 'categories'));
   	}

   	public function contact() 
   	{
   		return view('public.contact');
   	}

      public function contactSave(Request $request) 
      {
         $this->validate($request, [
            'inputPrename' => 'required|max:255',
            'inputName' => 'required|max:255',
            'inputEmail' => 'required|email',
            'inputSubject' => 'required|max:255',
            'inputMessage' => 'required'
         ]);

         $contact_form = new ContactForm();
         $contact_form->prename = $request->inputPrename;
         $contact_form->name = $request->inputName;
         $contact_form->email = $request->inputEmail;
         $contact_form->subject = $request->inputSubject;
         $contact_form->text = $request->inputMessage;
         $contact_form->save();

         $emailform = array(
            'prename' => $request->inputPrename,
            'name' => $request->inputName,
            'email' => $request->inputEmail,
            'subject' => $request->inputSubject,
            'message' => $request->inputMessage
         );

         Mail::send('emails.sent_contact_form', ['emailform' => $emailform], function($message) {
            $message->from('info@concertband-lenzburg.ch', 'Concertband Lenzburg');
            $message->to("pascal.brunner@gmx.ch", "Pascal Brunner");
            $message->subject('Kontaktformular concertband-lenzburg.ch');
        });

         return redirect('/Kontakt')->with('message', 'Vielen Dank für Ihre Anfrage, wir werden uns in Kürze bei Ihnen melden');
      }

   	public function portrait() 
   	{
         $portrait = Portrait::all();

   		return view('public.portrait', compact('portrait'));
   	}

   	public function intern()
   	{
   		return view('public.intern');
   	}

      public function sml() 
      {
         return view('public.sml');
      }

}
















