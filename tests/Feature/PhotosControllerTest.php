<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PhotosControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get user photos. Must return status 200 and empty array.
     *
     * @return void
     */
    public function testGetUserPhotosEmpty()
    {
        $user = factory(\App\User::class)->make();

        $response = $this->get('/photos');

        $response->assertStatus(200);
    }

    /**
     * Get user photos. Must return status 200 and photo.
     *
     * @return void
     */
    public function testGetUserPhotosSuccess()
    {
        $user = factory(\App\User::class)->make();

        $user->photos()->createMany(
            factory(\App\Photo::class, 3)->make()->toArray()
        );

        $response = $this->get('/photos');

        $response->assertStatus(200);
    }

    /**
     * Upload user photo. Must return status 200.
     *
     * @return void
     */
    public function testUploadUserPhotosSuccess()
    {
        $response = $this->post('/photos');

        $response->assertStatus(200);
    }

    /**
     * Upload user photo. Must return status 422.
     *
     * @return void
     */
    public function testUploadUserPhotosIrregularPayload()
    {
        $response = $this->post('/photos');

        $response->assertStatus(422);
    }
}
