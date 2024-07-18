<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


trait HandleImageTrait
{
    protected string $path = 'public/upload/';

    /**
     * Verify if the request has an image.
     *
     * @param $request
     * @return bool
     */
    public function verify($request): bool
    {
        return $request->hasFile('image');
    }

    /**
     * Save the uploaded image.
     *
     * @param $request
     * @return string|null
     */
    public function saveImage($request)
    {
        if ($this->verify($request)) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $image = ImageManager::make($file)->resize(300, 300)->encode($file->getClientOriginalExtension());
            Storage::put($this->path . $name, $image);
            return $name;
        }
        return null;
    }

    /**
     * Update the image if a new one is uploaded.
     *
     * @param $request
     * @param $currentImage
     * @return string|null
     */
    public function updateImage($request, $currentImage): ?string
    {
        if ($this->verify($request)) {
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }

    /**
     * Delete the specified image.
     *
     * @param $imageName
     * @return void
     */
    public function deleteImage($imageName): void
    {
        if ($imageName && Storage::exists($this->path . $imageName)) {
            Storage::delete($this->path . $imageName);
        }
    }
}

?>