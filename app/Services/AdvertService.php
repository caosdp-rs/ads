<?php

namespace App\Services;

use App\Models\AdvertModel;
use CodeIgniter\Config\Factories;

class AdvertService
{
    private $user;
    private $advertModel;

    public const SITUATION_NEW = 'new';
    public const SITUATION_USED = 'used';

    public function __construct()
    {
        $this->user = service('auth')->user();

        $this->advertModel = Factories::models(AdvertModel::class);
    }

    public function getAllAdverts(
        bool $showBtnArchive = true,
        bool $showBtnViewAdvert = true,
        bool $showBtnQuestions = true,
        string $classBtnActions = 'btn btn-primary btn-sm',
        string $sizeImage = 'small'
    ): array {
        $adverts = $this->advertModel->getAllAdverts();

        $data = [];

        //dd($adverts); // Debug
        $baseRouteToEditImages = $this->user->isSuperadmin() ? 'adverts.manager.edit.images' : 'adverts.my.edit.images';
        $baseRouteToQuestions = $this->user->isSuperadmin() ? 'adverts.manager.edit.question' : 'adverts.my.edit.questions';

        foreach ($adverts as $advert) {
            if ($showBtnArchive) {
                $btnArchive = form_button(
                    [
                        'data-id' => $advert->id,
                        'id' => 'btnArchiveAdvert',
                        'class' => 'dropdown-item'
                    ],
                    lang('App.btn_archive')
                );
            }

            $btnEdit = form_button(
                [
                    'data-id' => $advert->id,
                    'id' => 'btnEditAdvert',
                    'class' => 'dropdown-item'
                ],
                lang('App.btn_edit')
            );

            $finalRouteToEditImages = route_to($baseRouteToEditImages, $advert->id);

            $btnEditImages = form_button(
                [
                    'class' => 'dropdown-item',
                    'onClick' => "location.href='{$finalRouteToEditImages}'",
                ],
                lang('Adverts.btn_edit_images')
            );

            if ($showBtnViewAdvert && $advert->is_published) {
                // 
                $routeToViewAdvert  = route_to('adverts.details', $advert->code);

                $btnViewAdvert = form_button(
                    [
                        'class' => 'dropdown-item',
                        'onClick' => "window.open('{$routeToViewAdvert}','_blank')",
                    ],
                    lang('Adverts.btn_view_advert')
                );
            }

            if ($showBtnQuestions && $advert->is_published) {
                // 
                $finalRouteToEditQuestions = route_to($baseRouteToQuestions, $advert->code);

                $btnViewQuestions = form_button(
                    [
                        'class' => 'dropdown-item',
                        'onClick' => "location.href='{$finalRouteToEditQuestions}'",
                    ],
                    lang('Adverts.btn_view_questions')
                );
            }


            $btnActions = '<div class="dropdown dropup">';

            $attrBtnActions = [
                'type'          => 'button',
                'id'            => 'actions',
                'class'         => "dropdown-toggle {$classBtnActions}",
                'data-bs-toggle'    => "dropdown", //Para BS5
                'data-toggle'    => "dropdown", //Para BS4
                'aria-haspopup' => "true",
                'aria-expanded' => "false"
            ];

            $btnActions .= form_button($attrBtnActions, lang('App.btn_actions'));

            $btnActions .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'; // abertura da div do dropdown menu

            $btnActions .= $btnEdit;

            $btnActions .= $btnEditImages;

            if ($showBtnViewAdvert && $advert->is_published) {
                $btnActions .= $btnViewAdvert;
            }

            if ($showBtnQuestions && $advert->is_published) {
                $btnActions .= $btnViewQuestions;
            }

            if ($showBtnArchive) {
                $btnActions .= $btnArchive;
            }
            $btnActions .= '</div>'; // Fechamento da div dropdown menu

            $btnActions .= '</div>';

            $data[] = [
                'image'        => $advert->image(),
                'title'        => $advert->title,
                'code'        => $advert->code,
                'category'        => $advert->category,
                'is_published'        => $advert->isPublished(),
                'address'        => $advert->address(),
                'actions'        => $btnActions,
            ];
        }

        return $data;
    }
}
