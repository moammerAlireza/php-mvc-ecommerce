<?php

namespace App\classes;


class UploadFile
{
    protected $filename;
    protected $max_filesize;
    protected $extension;
    protected $path;

    
    /**
     * getName
     * get the file name
     * @return void
     */
    public function getName()
    {
        return $this->filename;
    }

        
    /**
     * setName
     * set the name of the file
     * @param  mixed $file
     * @param  mixed $name
     * @return void
     */
    protected function setName($file,$name="")
    {
        if($name === "")
        {
            $name=pathinfo($file,PATHINFO_FILENAME);
        }
        $name=strtolower(str_replace(['_',' '],'-',$name));
        $hash= md5(microtime());
        $ext=$this->fileExtension($file);
        $this->filename="{$name}-{$hash}.{$ext}";
    }

        
    /**
     * fileExtension
     * set file extension
     * @param  mixed $file
     * @return void
     */
    protected function fileExtension($file)
    {
      return $this->extension = pathinfo($file,PATHINFO_EXTENSION);
    }

      
    /**
     * fileSize
     * validate file size
     * @param  mixed $file
     * @return void
     */
    public static function fileSize($file)
    {
        $fileobj= new static;
        return $file> $fileobj->max_filesize ? true : false ;
    }
    
    /**
     * Summary of isImage
     * validate file type
     * @param mixed $file
     * @return bool
     */
    public static function isImage($file)
    {
        $fileobj= new static;
        $ext= $fileobj->fileExtension($file);
        $validExt= array('jpg','jpeg','png','bmp','gif');

        if(!in_array(strtolower($ext),$validExt))
        {
            return false;
        }
        return true;
    }
    
        
    /**
     *  Get the path where file uploaded to
     * @return mixed
     */
    public function path()
    {
        return $this->path;
    }
    /**
     * move the file to intended location
     * @param mixed $temp_path
     * @param mixed $folder
     * @param mixed $file
     * @param mixed $new_filename
     * @return UploadFile|null
     */
    public static function move($temp_path,$folder,$file,$new_filename='')
    {
        $fileobj = new static;
        $ds = DIRECTORY_SEPARATOR;

        $fileobj->setName($file, $new_filename);
        $file_name = $fileobj->getName();

        if(!is_dir($folder))
        {
            mkdir($folder, 0777, true);
        }

        $fileobj->path = "{$folder}{$ds}{$file_name}";
        $absolute_path = BASE_PATH . "{$ds}public{$ds}$fileobj->path";

        if(move_uploaded_file($temp_path,$absolute_path))
        {
            return $fileobj;
        }
        return null;
    }
}