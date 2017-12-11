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
        return view('admin.works.index', ['works' => Works::all()]);
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
          'name' => Works::DESC,
        ],
        'label' => [
          'attributes' => [
            'class' => 'h4',
          ],
          'value' => 'Описание',
        ],
      ];

      $main_image = [
        'attributes' => [
          'class' => 'form-control-file main-image',

        ],
        'label' => [
          'attributes' => [
            'class' => 'h4',
          ],
          'value' => 'Основная картинка',
        ],
      ];


      return view('admin.works.create', [
        'model' => new Works(),
        'form' => $form,
        'title' => $title,
        'slug' => $slug,
        'description' => $description,
        'main_image' => $main_image
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
      $main_images = [];
      $examples = $request->file('examples');
      $new_work = Works::create([
        Works::TITLE => $request->{Works::TITLE},
        Works::DESC => $request->{Works::DESC},
      ]);
      $slug = $new_work->slug;
      if($new_work && !empty($slug)){
        $path = 'works/' . $slug;
        if (!Storage::disk('public')->exists($path)) {
          Storage::disk('public')->makeDirectory($path, 0777, TRUE);
        }
        $sizes = [
          'thumb' => [
            'width' => '300',
            'quality' => 75
          ],
          'full' => [
            'width' => '1920',
            'quality' => 100
          ]
        ];
        $file = $request->file(Works::IMAGE);
        $file_extension = $file->getClientOriginalExtension();
        $ext = $file->guessClientExtension();
        if(in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])){
          foreach ($sizes as $key => $size) {
            $image = Image::make($file)
              ->resize($size['width'], NULL, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
              })
              ->encode($file_extension, $size['quality']);
            $file_name = $slug . '-' . $key;
            $file_path = $path . '/' . $file_name . '.' . $file_extension;

            if( Storage::disk('public')->put($file_path, $image)){
              $main_images[$key] = $file_path;
            }
          }

          $new_work->{Works::IMAGE} = $main_images;
          $new_work->save();

        }

        if (!empty($examples)) {
          $example_path = array();
          $all_examples_path = array();
          foreach ($examples as $example) {
            $ext = $example->guessClientExtension();
            if(in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])){
              $file_extension = $example->getClientOriginalExtension();

              foreach ($sizes as $key => $size) {
                $image = Image::make($example)
                  ->resize($size['width'], NULL, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                  })
                  ->encode($file_extension, $size['quality']);
                $file_path = $path . '/' . uniqid($slug . '_') . '.' . $file_extension;

                if( Storage::disk('public')->put($file_path, $image)){
                  $example_path[$key] = $file_path;
                }

              }
            }

            $all_examples_path[] = [
              'path' => $example_path
            ];

          }
          $new_work->examples()->createMany($all_examples_path);
        }
      }
      return view('admin.works.index', ['works' => Works::all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function show($type = NULL)
    {
      $works = Works::where('slug', $type)->with('examples')->first();
      $menu = Works::select('title', 'slug')->get();
      if (!empty($works)) {
        $data = array(
          'menu' => $menu,
          'works' => $works,
        );
        return view('works.show', $data);
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
        $work = Works::where('id', $id)->with('examples')->firstOrFail();
      $form = [
        'route' => [
          'works.update', $id
        ],
        'method' => 'PUT',
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
          'name' => Works::DESC,
        ],
        'label' => [
          'attributes' => [
            'class' => 'h4',
          ],
          'value' => 'Описание',
        ],
      ];

      $main_image = [
        'attributes' => [
          'class' => 'form-control-file main-image',

        ],
        'label' => [
          'attributes' => [
            'class' => 'h4',
          ],
          'value' => 'Основная картинка',
        ],
      ];

      return view('admin.works.create', [
        'model' => $work,
        'form' => $form,
        'title' => $title,
        'slug' => $slug,
        'description' => $description,
        'main_image' => $main_image
      ]);
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
      Works::where('id', $id)->update([
        Works::TITLE => $request->{Works::TITLE},
        Works::DESC => $request->{Works::DESC}
      ]);
      if (isset($request->{Works::IMAGE}) || isset($request->{Works::EXAMPLES})) {
        $main_image = array();
        $work = Works::findOrFail($id);
        $slug = $work->slug;
        $path = 'works/' . $slug;
        $sizes = [
          'thumb' => [
            'width' => '300',
            'quality' => 75,
          ],
          'full' => [
            'width' => '1920',
            'quality' => 100,
          ],
        ];
        if(isset($request->{Works::IMAGE})){
          foreach ($work->{Works::IMAGE} as $path) {
            if (Storage::disk('public')->exists($path)) {
              Storage::disk('public')->delete($path);
            }
          }
          if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path, 0777, TRUE);
          }
          $file = $request->file(Works::IMAGE);
          $file_extension = $file->getClientOriginalExtension();
          $ext = $file->guessClientExtension();
          if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            foreach ($sizes as $key => $size) {
              $image = Image::make($file)
                ->resize($size['width'], NULL, function (Constraint $constraint) {
                  $constraint->aspectRatio();
                  $constraint->upsize();
                })
                ->encode($file_extension, $size['quality']);
              $file_name = $slug . '-' . $key;
              $file_path = $path . '/' . $file_name . '.' . $file_extension;

              if (Storage::disk('public')->put($file_path, $image)) {
                $main_image[$key] = $file_path;
              }
            }

            $work->{Works::IMAGE} = $main_image;

          }
        }
        if (isset($request->{Works::EXAMPLES})) {
          $example_path = [];
          $all_examples_path = [];
          $examples = $request->file(Works::EXAMPLES);
          foreach ($examples as $example) {
            $ext = $example->guessClientExtension();
            if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
              $file_extension = $example->getClientOriginalExtension();

              foreach ($sizes as $key => $size) {
                $image = Image::make($example)
                  ->resize($size['width'], NULL, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                  })
                  ->encode($file_extension, $size['quality']);
                $file_path = $path . '/' . uniqid($slug . '_') . '.' . $file_extension;

                if (Storage::disk('public')->put($file_path, $image)) {
                  $example_path[$key] = $file_path;
                }

              }
            }

            $all_examples_path[] = [
              'path' => $example_path,
            ];

          }
          $work->examples()->createMany($all_examples_path);
        }

      }

      return view('admin.works.index', ['works' => Works::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $work = Works::find($id);
      $work->delete();
      return view('admin.works.index', ['works' => Works::all()]);
    }
}
