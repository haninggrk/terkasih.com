<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Http\UploadedFile;
use RuntimeException;

class ImageCompressor
{
    public function compressAndStore(UploadedFile $file, string $directory = 'memorial'): string
    {
        $imageInfo = getimagesize($file->getPathname());
        if ($imageInfo === false) {
            throw new RuntimeException('Unsupported image format.');
        }

        $sourceImage = match ($imageInfo['mime']) {
            'image/jpeg' => imagecreatefromjpeg($file->getPathname()),
            'image/png' => imagecreatefrompng($file->getPathname()),
            'image/webp' => function_exists('imagecreatefromwebp')
                ? imagecreatefromwebp($file->getPathname())
                : false,
            default => false,
        };

        if ($sourceImage === false) {
            throw new RuntimeException('Unable to read image file.');
        }

        $width = imagesx($sourceImage);
        $height = imagesy($sourceImage);
        $maxSide = 1800;
        $ratio = min(1, $maxSide / max($width, $height));
        $newWidth = max(1, (int) round($width * $ratio));
        $newHeight = max(1, (int) round($height * $ratio));

        $canvas = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($canvas, false);
        imagesavealpha($canvas, true);
        $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
        imagefilledrectangle($canvas, 0, 0, $newWidth, $newHeight, $transparent);

        imagecopyresampled($canvas, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $filename = sprintf(
            '%s/%s-%s.jpg',
            trim($directory, '/'),
            now()->format('YmdHis'),
            bin2hex(random_bytes(4))
        );

        $targetPath = storage_path('app/public/'.$filename);
        $targetDirectory = dirname($targetPath);
        if (is_dir($targetDirectory) === false) {
            mkdir($targetDirectory, 0755, true);
        }

        imagejpeg($canvas, $targetPath, 90);
        imagedestroy($canvas);
        imagedestroy($sourceImage);

        return $filename;
    }
}
