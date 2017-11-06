<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  protected function getTypeWork($type = NULL) {
    $data = [
      'kitchens' => [
        'title' => 'Кухни',
        'preview' => asset('images/type_work/kitchen.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'Кухня',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'Кухня',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'Кухня',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'Кухня',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'Кухня',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'Кухня',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
        ],
        'slag' => 'kitchens',
      ],
      'bedrooms' => [
        'title' => 'Спальни',
        'preview' => asset('images/type_work/bedroom.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
        ],
        'slag' => 'bedrooms',
      ],
      'beds' => [
        'title' => 'Кровати',
        'preview' => asset('images/type_work/bed.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
        ],
        'slag' => 'beds',
      ],
      'wardrobes' => [
        'title' => 'Шкафы Купе',
        'preview' => asset('images/type_work/wardrobes.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
        ],
        'slag' => 'wardrobes',
      ],
      'hallways' => [
        'title' => 'Прихожие',
        'preview' => asset('images/type_work/hallway.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
        ],
        'slag' => 'hallways',
      ],
      'playroom' => [
        'title' => 'Детские',
        'preview' => asset('images/type_work/playroom.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
          [
            'title' => 'спальни',
            'image' => asset('images/our_work/kitchens/kitchen_1.jpg'),
          ],
        ],
        'slag' => 'playroom',

      ],

    ];

    if (!empty($type) && array_key_exists($type, $data)) {
      return $data[$type];
    }
    return $data;
  }

  protected function getMaterials($material = NULL) {
    $data = [
      'dsp' => [
        'title' => 'ДСП',
        'preview' => asset('images/type_materials/dsp.jpg'),
        'header' => asset('images/material/dsp/header.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'Вишня Американская',
            'image' => asset('images/material/dsp/vishnya-amerikanskaya.jpg'),
          ],
          [
            'title' => 'Дуб Шамон',
            'image' => asset('images/material/dsp/dub-shamoni.jpg'),
          ],
          [
            'title' => 'Гавана',
            'image' => asset('images/material/dsp/havana.jpg'),
          ],
          [
            'title' => 'Артизан Перламутровый',
            'image' => asset('images/material/dsp/buk-artizan-perlamutrovyi.jpg'),
          ],
          [
            'title' => 'Венге Подлинный',
            'image' => asset('images/material/dsp/venge-podlinnii.jpg'),
          ],
          [
            'title' => 'Венге',
            'image' => asset('images/material/dsp/venge.jpg'),
          ],
          [
            'title' => 'Вишня Оксвор',
            'image' => asset('images/material/dsp/vishnya-oksvord.jpg'),
          ],
          [
            'title' => 'Зеленый Лайм',
            'image' => asset('images/material/dsp/green-lime.jpg'),
          ],
        ],
        'slag' => 'dsp',
      ],
      'counter' => [
        'title' => 'Столешница',
        'preview' => asset('images/type_materials/counter.jpg'),
        'header' => asset('images/material/counter/header.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'image' => asset('images/material/counter/1.jpg'),
          ],
          [
            'image' => asset('images/material/counter/2.jpg'),
          ],
          [
            'image' => asset('images/material/counter/3.jpg'),
          ],
          [
            'image' => asset('images/material/counter/1.jpg'),
          ],
          [
            'image' => asset('images/material/counter/2.jpg'),
          ],
          [
            'image' => asset('images/material/counter/3.jpg'),
          ],
        ],
        'slag' => 'counter',
      ],
      'facade_mdf' => [
        'title' => 'МДФ фасады',
        'preview' => asset('images/type_materials/facade_mdf.jpg'),
        'header' => asset('images/material/facade_mdf/header.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],
          [
            'image' => asset('images/material/facade_mdf/1.jpg'),
          ],

        ],
        'slag' => 'facade_mdf',
      ],
      'facade' => [
        'title' => 'Фасады',
        'preview' => asset('images/type_materials/facade.jpg'),
        'header' => asset('images/material/facade/facade_header.jpg'),
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto atque aut, consequuntur dolorum ducimus eaque expedita explicabo facilis impedit, ipsa molestiae molestias non numquam odit qui quibusdam quos, sapiente.',
        'items' => [
          [
            'title' => 'ЛДСП фасад',
            'image' => asset('images/material/facade/facade_ldsp.jpg'),
          ],
          [
            'title' => 'Рамочный фасад',
            'image' => asset('images/material/facade/facade_ramka.jpg'),
          ],
          [
            'title' => 'Профильный фасад',
            'image' => asset('images/material/facade/facade_profile.jpg'),
          ],
        ],
        'slag' => 'facade',
      ],


    ];

    if (!empty($material) && array_key_exists($material, $data)) {
      return $data[$material];
    }
    return $data;
  }
}
