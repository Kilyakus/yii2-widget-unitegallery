<?php
namespace mrbig00\unitegallery;

use yii\base\Widget;

class UniteGallery extends Widget
{
    public $items;

    const THEME_GRID = 'grid';

    const SKIN_RIGHT_THUMB = 'right-thumb';

    public $theme = self::THEME_GRID;

    public $skin = self::SKIN_RIGHT_THUMB;

    public $options = [];

    public function run()
    {
        if (is_array($this->items) && count($this->items) > 0) {

            $view = $this->getView();

            UniteGalleryAsset::$theme = $this->theme;
            UniteGalleryAsset::register($view);

            return $this->render(
                'gallery',
                [
                    'galleryId' => $this->id,
                    'theme'     => $this->theme,
                    'items'     => $this->items,
                    'options'   => array_merge(
                        [
                            'gallery_theme'              => $this->theme,
                            'gallery_min_width'          => 120,
                            'theme_skin'                 => $this->skin,
                            'theme_preloading_height'    => 120,
                            'tiles_type'                 => 'justified',
                            'tiles_col_width'            => 120,
                            'tiles_enable_transition'    => false,
                            'tiles_justified_row_height' => 120,
                        ],
                        $this->options
                    ),
                ]
            );
        } else {
            return '';
        }
    }
}