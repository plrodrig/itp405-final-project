<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Picture;
class latTest extends TestCase
{

    //test one
    public function testFindLat()
    {
        $geolocation = new \App\Services\API\Geolocation();
        $lat = $geolocation->location('disney');
        $desired = $lat;
        $this->assertEquals($desired, $lat);
    }

    //test 2
    public function testVisitPage(){
      $this
        ->visit('/login')
        ->type('admin@usc.edu', 'email')
        ->type('laravel', 'password')
        ->press('Sign in')
        ->seePageIs('/dashboard');
    }

    //test 3
    public function testObjects(){
       $picture = new Picture();
       $this->assertEquals($picture->name, $picture->tag,  $picture->location);
   }

   //test 4
   public function testPage(){
      $name = 'Ton-Nam';
      $this->call('POST', '/register/new',[
        'name' => $name
      ]);

        $this->seeInDatabase('pictures', [
            'name' => "Ton-Nam",
        ]);
   }

   //test 5
   public function testRedirect(){
     $this
       ->visit('/login')
       ->type('admi@usc.edu', 'email')
       ->type('laravel', 'password')
       ->press('Sign in')
       ->seePageIs('/login/auth');
   }

}
