<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categories;
use App\Models\Writer;

class DataController extends Controller
{
    //
    public function getstories(){
    	$cat = Categories::where('slug','stories')->first();
    	if($cat != null){
    	$recs = Post::where('category_id',$cat->id)->paginate(100);
       $udata = array();
       $i=0;        
       foreach($recs as $rec){
            $udata[$i]['id'] = $rec->id;
            $udata[$i]['title'] = $rec->title;
            $udata[$i]['slug'] = $rec->slug;
            $udata[$i]['body'] = $rec->body;
            $author = Writer::where('id',$rec->writer_id)->first();
            if($author != null){
            $udata[$i]['author'] = $author->title;
            }

          if($rec->image != null){
            $udata[$i]['imgpath'] ="storage"."\\".$rec->image;
          }else{
            $udata[$i]['imgpath'] = '';
          }
          $i++;
        }
            $pagination['total'] = $recs->total();
            $pagination['count'] = $recs->count();
            $pagination['per_page'] = $recs->perPage();
            $pagination['current_page'] = $recs->currentPage();
            $pagination['from'] = $recs->firstItem();
            $pagination['to'] = $recs->lastItem();
            $pagination['first_page_url'] = $recs->url(1);
            $pagination['last_page_url'] = $recs->url($recs->lastPage());
            $pagination['next_page_url'] = $recs->nextPageUrl();
            $pagination['prev_page_url'] = $recs->previousPageUrl();
            $pagination['last_page'] = $recs->lastPage();
    	

        $data['records'] = $udata;
        $data['pagination'] = $pagination;
        return $data;
    }
}
    //
    public function getpoems(){
    	dd('p');
    }
    //
    public function gethistory(){
    	dd('h');
    }
    //
    public function getgraphics(){
    	dd('g');
    }
}
