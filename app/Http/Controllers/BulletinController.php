<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulletinModel;

class BulletinController extends Controller
{
//------------------------------------------Petakom Committee-------------------------------//
    //index bulletin for petakom
    public function indexPetakom()
    {
        $bulletin = Bulletin::orderBy('created_at','desc')->get();
        return view ('buletin.bulletinPetakom')->with('bulletin', $bulletin);
    }

    //view news for petakom
    public function showNews($id)
    {
        $bulletin = Bulletin::find($id);
        return view('buletin.petakomview')->with('bulletin', $bulletin);
    }

    //store news data
    public function storeNews(Request $request)
    {

        $Bulletin = new Bulletin();

        $Bulletin->author_name = $request->input('author_name');
        $Bulletin->news_title = $request->input('news_title');
        $Bulletin->news_description = $request->input('news_description');

        $Bulletin->save();

        return redirect('/petakom/bulletin')->with('flash_message', 'News Created!');
    }

    //edit existing news 
    public function editNews($id)
    {
        $Bulletin = Bulletin::find($id);
        return view('buletin.editNews')->with('bulletin', $Bulletin);
    }

    //update edited news
    public function updateNews(Request $request, $id)
    {
        $Bulletin = Bulletin::find($id);

        $Bulletin->author_name = $request->input('author_name');
        $Bulletin->news_title = $request->input('news_title');
        $Bulletin->news_description = $request->input('news_description');
        $Bulletin->updateBy = $request->input('updateBy');
 
        $Bulletin->save();
 
        return redirect('/petakom/bulletin')->with('flash_message', 'News Updated!');
 
    }

    //delete existing news
    public function deleteNews($id)
    {
        $Bulletin  = Bulletin ::find($id);
        $Bulletin  -> delete($Bulletin);
        return redirect('/petakom/bulletin')->with('flash_message', 'News Deleted!');  
    }

    //search news for petakom committee
    public function searchNewsPetakom()
    {
        $search_text = $_GET['searchquery'];
        $searchNews = Bulletin::where('news_title','LIKE','%'.$search_text.'%')
        ->orWhere('author_name','LIKE','%'.$search_text.'%')->get();
        return view('buletin.searchNewsPetakom', compact('searchNews'));
    }

//------------------------------------------User-------------------------------//
    //index bulletin for user
    public function indexUser()
    {
        $bulletin = Bulletin::orderBy('created_at','desc')->get();
        return view ('buletin.bulletinUsers')->with('bulletin', $bulletin);
    }

    //view news for user
    public function showNewsUser($id)
    {
        $bulletin = Bulletin::find($id);
        return view('buletin.userview')->with('bulletin', $bulletin);
    }

    //search news for petakom committee
    public function searchNewsUser()
    {
        $search_text = $_GET['searchquery'];
        $searchNews = Bulletin::where('news_title','LIKE','%'.$search_text.'%')
        ->orWhere('author_name','LIKE','%'.$search_text.'%')->get();
        return view('buletin.searchNewsUser', compact('searchNews'));
    }
}
