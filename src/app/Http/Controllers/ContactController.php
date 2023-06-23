<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Rules\ZipCodeRule;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    // ------------------------------------------------------
    public function index() { return view('index'); }

    // ------------------------------------------------------
    public function contact() { return view('contact'); }

    public function confirm(ContactRequest $request) {
        $contact = $request->only(['family-name','given-name','gender','email','postcode','address','building_name','opinion']);
        // return $contact;
        return view('confirm', compact('contact'));
    }

    public function thanks(Request $request){
        $contact = $request->only(['fullname','gender','email','postcode','address','building_name','opinion']);
        Contact::create($contact);
        return view('thanks');
    }

    // ------------------------------------------------------
    public function manage() {
        $contacts = Contact::paginate(10);
        return view('manage', compact('contacts'));
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->delete(); 
        return redirect('manage');
    }

    public function search(Request $request)
    {
        //値の取得
        $key_name = $request->input('key-name');
        $key_gender = $request->input('key-gender');
        $key_start_date = $request->input('key-start-date');
        $key_end_date = $request->input('key-end-date');
        $key_email = $request->input('key-email');

        //クエリビルダ
        $contacts = Contact::query();

        //もし検索フォームにキーワードが入力されたら検索する
        if($key_name){$contacts = $contacts->where('fullname', 'like', '%'.$key_name.'%');}
        if($key_email){$contacts = $contacts->where('email', 'like', '%'.$key_email.'%');}
        if($key_start_date){$contacts = $contacts->whereDate('created_at', '>=', $key_start_date);}   
        if($key_end_date){$contacts = $contacts->whereDate('created_at', '<=', $key_end_date);} 
        if($key_gender){$contacts = $contacts->where('gender', '=', $key_gender);}
        $contacts = $contacts->paginate(10);
        
        return view('manage',compact('contacts'));
    }

}
