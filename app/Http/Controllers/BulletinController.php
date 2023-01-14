<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BulletinModel;
use Illuminate\Support\Facades\Auth;

class BulletinController extends Controller
{
//------------------------------------------Petakom Committee-------------------------------//
    //index bulletin for petakom
    public function indexPetakom()
    {
        $bulletin = BulletinModel::orderBy('created_at','desc')->get();
        return view ('buletin.bulletinPetakom')->with('bulletin', $bulletin);
    }

    //view news for petakom
    public function showNews($id)
    {
        $bulletin = BulletinModel::find($id);
        return view('buletin.petakomview')->with('bulletin', $bulletin);
    }

    //store news data
    public function storeNews(Request $request)
    {
        if(Auth::check())
        {
            BulletinModel::create([
                'committee_ID' => Auth::user()->id,
                'author_name' => $request->author_name,
                'news_title' => $request->news_title,
                'news_description' => $request->news_description,
            ]);
            return redirect('/committee/bulletin')->with('flash_message', 'News Created!');
        }
        else
        {
            return redirect('/committee/bulletin')->with('flash_message', 'Something went wrong,Try again later');;
        }
    }

    //edit existing news 
    public function editNews($id)
    {
        $Bulletin = BulletinModel::find($id);
        return view('buletin.editNews')->with('bulletin', $Bulletin);
    }

    //update edited news
    public function updateNews(Request $request, $id)
    {
        $Bulletin = BulletinModel::find($id);

        $Bulletin->author_name = $request->input('author_name');
        $Bulletin->news_title = $request->input('news_title');
        $Bulletin->news_description = $request->input('news_description');
        $Bulletin->updateBy = $request->input('updateBy');
 
        $Bulletin->save();
 
        return redirect('/committee/bulletin')->with('flash_message', 'News Updated!');
 
    }

    //delete existing news
    public function deleteNews($id)
    {
        $Bulletin  = BulletinModel ::find($id);
        $Bulletin  -> delete($Bulletin);
        return redirect('/committee/bulletin')->with('flash_message', 'News Deleted!');  
    }

    //search news for petakom committee
    public function searchNewsPetakom()
    {
        $search_text = $_GET['searchquery'];
        $searchNews = BulletinModel::where('news_title','LIKE','%'.$search_text.'%')
        ->orWhere('author_name','LIKE','%'.$search_text.'%')->get();
        return view('buletin.searchNewsPetakom', compact('searchNews'));
    }

//------------------------------------------User-------------------------------//
    //index bulletin for user
    public function indexUser()
    {
        $bulletin = BulletinModel::orderBy('created_at','desc')->get();
        return view ('buletin.bulletinUsers')->with('bulletin', $bulletin);
    }

    //view news for user
    public function showNewsUser($id)
    {
        $bulletin = BulletinModel::find($id);
        return view('buletin.userview')->with('bulletin', $bulletin);
    }

    //search news for petakom committee
    public function searchNewsUser()
    {
        $search_text = $_GET['searchquery'];
        $searchNews = BulletinModel::where('news_title','LIKE','%'.$search_text.'%')
        ->orWhere('author_name','LIKE','%'.$search_text.'%')->get();
        return view('buletin.searchNewsUser', compact('searchNews'));
    }
}
