<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\UploadsManager;
use Illuminate\Support\Facades\File;


class UploadController extends Controller
{
    protected $manager;

    /**
     * 调用uploadsManage
     * UploadController constructor.
     * @param UploadsManager $manager
     */
    public function __construct(UploadsManager $manager) {
        $this->manager=$manager;
    }

    public function index(Request $request) {
        $folder=$request->get('folder');
        $data=$this->manager->folderInfo($folder);
        
        return view('admin.upload.index',$data);
        
    }

    public function createFolder(UploadNewFolderRequest $request) {
        $new_folder=$request->get('new_folder');
        $folder=$request->get('folder').'/'.$new_folder;
        $result=$this->manager->createDirectory($folder);
        if ($result===true){
            return redirect()
                ->back()
                ->withSuccess("「".$new_folder."」目录创建成功！");
        }
        $error=$result ? :"创建目录时出错了：";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    public function deleteFile(Request $request) {
        $del_file=$request->get('del_file');
        $path=$request->get('folder').'/'.$del_file;

        $result =$this->manager->deleteFile($path);
        if ($result===true){
            return redirect()
                ->back()
                ->withSuccess($del_file ."文件删除成功！");
        }
        $error=$result ? :"删除文件时出错了：";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    public function deleteFolder(Request $request) {
        $del_folder=$request->get('del_folder');
        $folder=$request->get('folder').'/'.$del_folder;

        $result =$this->manager->deleteDirectory($folder);
        if ($result===true){
            return redirect()
                ->back()
                ->withSuccess("「". $del_folder ."」目录已删除！");
        }
        $error=$result ? :"删除目录时出错了：";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    public function uploadFile(UploadFileRequest $request) {
        $file=$_FILES['file'];
        $fileName=$request->get('file_name');
        $fileName=$fileName ? : $file['name'];
        $path=str_finish($request->get('folder'),'/').$fileName;
        $content=File::get($file['tmp_name']);
        $result=$this->manager->saveFile($path,$content);
        if ($result===true){
            return redirect()
                ->back()
                ->withSuccess($fileName. "文件上传成功！");
        }
        $error=$result ? :"文件上传出错！";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }
}
