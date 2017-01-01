<?php

use Illuminate\Database\Seeder;


class MenuSeed extends Seeder
{
    public function run()
    {
      //Content Management
      \webarq::addMenu([
        'parent_id'     => null,
        'title'         => 'Management Contents',
        'controller'    => '#',
        'slug'          => 'cms',
        'order'         => 1,
      ],[]);
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Slider',
            'controller'    => 'CMS\SliderController',
            'slug'          => 'slider',
            'order'         => '1'
          ],['index','create','update','view','delete']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'About',
            'controller'    => 'CMS\AboutController',
            'slug'          => 'about',
            'order'         => '2'
          ],['index']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Contest',
            'controller'    => 'CMS\ContestController',
            'slug'          => 'contest',
            'order'         => '3'
          ],['index','create','update','view','delete']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Day',
            'controller'    => 'CMS\DayController',
            'slug'          => 'day',
            'order'         => '4'
          ],['index','create','update','delete']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Program',
            'controller'    => 'CMS\ProgramController',
            'slug'          => 'program',
            'order'         => '5'
          ],['index','create','update','view','delete']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Gallery',
            'controller'    => 'CMS\GalleryController',
            'slug'          => 'gallery',
            'order'         => '6'
          ],['index','create','update','view','delete']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Winner',
            'controller'    => 'CMS\WinnerController',
            'slug'          => 'winner',
            'order'         => '7'
          ],['index','create','update','view','delete']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Prize',
            'controller'    => 'CMS\PrizeController',
            'slug'          => 'prize',
            'order'         => '8'
          ],['index']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Venue',
            'controller'    => 'CMS\VenueController',
            'slug'          => 'venue',
            'order'         => '9'
          ],['index']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Testimonial',
            'controller'    => 'CMS\TestimonialController',
            'slug'          => 'testimonial',
            'order'         => '10'
          ],['index','create','update','view','delete']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Testimonial Banner',
            'controller'    => 'CMS\TestimonialBannerController',
            'slug'          => 'testimonialbanner',
            'order'         => '11'
          ],['index']
          );
          \webarq::addMenu([
            'parent_id'     => 'cms',
            'title'         => 'Sponsor',
            'controller'    => 'CMS\SponsorController',
            'slug'          => 'sponsor',
            'order'         => '12'
          ],['index','create','update','delete']
          );

      //Content Management
      \webarq::addMenu([
        'parent_id'     => null,
        'title'         => 'Settings',
        'controller'    => '#',
        'slug'          => 'settings',
        'order'         => 10,
      ],[]);
          \webarq::addMenu([
            'parent_id'     => 'settings',
            'title'         => 'Global Config',
            'controller'    => 'Setting\ConfigController',
            'slug'          => 'config',
            'order'         => '1'
          ],['index']
          );
          \webarq::addMenu([
            'parent_id'     => 'settings',
            'title'         => 'Additional File',
            'controller'    => 'Setting\AddFileController',
            'slug'          => 'addfile',
            'order'         => '2'
          ],['index','create','update','delete']
          );
    }
}
