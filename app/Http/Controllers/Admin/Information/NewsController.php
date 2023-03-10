<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Requests\Information\NewsRequest;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Str;


class NewsController extends BaseController
{
    public function __construct(){
        parent::__construct('information','news');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['news'] = $this->db->orderBy('id','DESC')->get();
        return $this->view_admin('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view_admin('create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->except('_token');
        $data['uuid'] = Str::uuid();

        $data['created_at'] = new \DateTime();

        if($request->images != null){
            $imagesName = time() . '_' . $request->images->getClientOriginalName();
            $request->images->move(public_path('images'), $imagesName);
            $data['images'] = $imagesName;
        }

        $this->db->insert($data);

        return $this->route_admin('index', [], ['success' => 'Thêm tin thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->db->where('uuid', $id);

        if ($news->exists()) {
            $data['news'] = $news->first();
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news_current = $this->db->where('uuid', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();


        if (empty($request->images)) {
            $data['images'] = $news_current->images; 
        } else {
            $image_path = public_path('images') . "/" . $news_current->images;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time().'-'.$request->images->getClientOriginalName();  
            $request->images->move(public_path('images'), $imageName);
            $data['images'] = $imageName;
        }

        $this->db->where('uuid', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa tin thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = $this->db->where('uuid', $id);

        if ($news->exists()) {
            $news_current = $news->first();

            if (!empty($news_current->images)) {
                $image_path = public_path('images') . "/" . $news_current->images;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $news->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa tin thành công']);
        } else {
            abort(404);
        }
    }
}
