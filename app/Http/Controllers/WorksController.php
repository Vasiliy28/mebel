<?php

namespace App\Http\Controllers;

use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.works.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $form = [
        'action' => [
          'WorksController@store',
        ],
        'files' => TRUE,
      ];

      $title = [
        'attributes' => [
          'class' => 'form-control',
          'placeholder' => '',
          'name' => 'title',
        ],
        'label' => [
          'attributes' => [
            'class' => 'h4',
          ],
          'value' => 'Название',
        ],
      ];

      $slug = [
        'attributes' => [
          'hidden'
        ],
      ];

      $description = [
        'attributes' => [
          'class' => 'form-control',
          'placeholder' => '',
          'name' => 'description',
        ],
        'label' => [
          'attributes' => [
            'class' => 'h4',
          ],
          'value' => 'Описание',
        ],
      ];

      $images = [
        'preview' => [
          'title' => 'Превью',
          'attributes' => [
            'class' => 'custom-file-input',
          ],
        ],
        'main_image' => [
          'title' => 'Основная картинка',
          'attributes' => [
            'class' => 'custom-file-input',
          ],
        ],
        'page_image' => [
          'title' => 'Картинка для страницы',
          'attributes' => [
            'class' => 'custom-file-input',
          ],
        ],
      ];

      return view('admin.works.create', [
        'model' => new Works(),
        'form' => $form,
        'title' => $title,
        'slug' => $slug,
        'description' => $description,
        'images' => $images
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->file('images');
        foreach ($fields as $file){
          $name = $file->getClientOriginalName();
          $image = Image::make($file)
            ->resize('1800', NULL, function (Constraint $constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
            })
            ->encode($file->getClientOriginalExtension(), 75);
          $te = Storage::disk('public')->put('./rrr.jpeg', $image,'public');

          $a = 2;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function show($type = NULL)
    {
      $title = $this->getTypeWork($type);

      if (!empty($title)) {
        $work = array(
          'menu' => $this->getTypeWork(),
          'data' => $this->getTypeWork($type),
        );

        return view('works.show', $work);
      }
      return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
