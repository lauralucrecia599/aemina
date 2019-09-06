<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use Image;
use File;
use Str;
class ApiController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        return $productos;
    }

    public function store(Request $request)
    {
        $datos = request()->all();
        $imagen =$this->uploadimg($datos['file']);
        $producto = Productos::create(array(
          'nombre'=>$datos['nombre'],
          'descripcion'=>$datos['descripcion'],
          'imagen'=>$imagen
        ));
        return array('success'=>'true','producto'=>$producto);
    }

    public function show($id){
      return Productos::find($id);
    }

    public function updateforpost($id){
      $producto = Productos::find($id);
      $datos = request()->all();
      if(isset($datos['file'])&& $datos['file']!="undefined"){
        if(file_exists('upload/'.$producto->imagen)){
          unlink('upload/',$producto->imagen);
        }

        $datos['imagen'] = $this->uploadimg($datos['file']);
      }
      $producto->fill($datos);
      $producto->save();
      return array('success'=>'true');
    }

    public function destroy($id)
    {
        $producto = Productos::find($id);
        if(file_exists('upload/'.$producto->imagen)){
          unlink('upload/',$producto->imagen);
        }
        $producto->delete();
        return array('success'=>'true');
    }

    private function uploadimg($img){
        ini_set('memory_limit',-1);

        if($img->getClientOriginalExtension() == "jpg" || $img->getClientOriginalExtension() == "png" || $img->getClientOriginalExtension() == "jpeg"){
            if( $img->getClientMimeType() == "image/jpeg" ||  $img->getClientMimeType() == "image/png"){
                if( $img->getClientSize() <= 11796912){ //APROX 11.8MB
                    $nombre = Str::random(10).'.'.$img->getClientOriginalExtension();
                    $respuesta =Image::make(file_get_contents($img))->resize(300, 150)->save('upload/'.$nombre);
                    return 'upload/'.$nombre;
                }
            }
        }
        return "";
    }





}
