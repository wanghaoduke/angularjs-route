<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Wen;
use App\Comment;
class WenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $wens=Wen::get();
        return response()->json($wens);
    }
 

    public function showWens($page)
    {
        $num=($page-1)*5;
        $wens=Wen::skip($num)->take(5)->get();
        return response()->json($wens);
    }

    
    
    public function store(Request $request)
    {
        $wen=new Wen;
        $wen->title=$request->input('title');
        $wen->text=$request->input('text');
        $wen->save();
        return response()->json(array('success'=>true));
    }

    

    public function show ($id){
        $wen=Wen::find($id);
        
        return response()->json($wen);
    }

    public function storeNew (Request $request){

        $wen=Wen::find($request->input('id'));
        $wen->title=$request->input('title');
        $wen->text=$request->input('text');
        $wen->save();
        return response()->json(array('success'=>true));
    }
   
    public function destroy($id)
    {
        
        Wen::destroy($id);
        return response()->json(array('success'=>true));
    }


    public function showComm($wen_id){
        $comments=Wen::find($wen_id)->Comments;
        return response()->json($comments);
    }

    public function storeComm(Request $request ,$wen_id  ){
        $comment=new Comment;
        $comment->user=$request->input('user');
        $comment->comm=$request->input('comm');
        $comment->wen_id=$wen_id;
        $comment->save();
        return response()->json(array('success'=>true));
    }

    public function destroyComm($id){
        Comment::destroy($id);
        return response()->json(array('success'=>true));
    }
}
