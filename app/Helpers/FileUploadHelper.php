<?php

namespace App\Helpers;

class FileUploadHelper
{
    public static function handleFileUpload($request, $fieldName, $uploadPath, $studentOrCoach) {
        if ($request->hasFile($fieldName)) {
            self::deleteFileIfExists($uploadPath.$studentOrCoach->$fieldName);

            $studentOrCoach->$fieldName = self::uploadFile($request->file($fieldName), $uploadPath);
        }
        return $studentOrCoach;
    }

    private static function uploadFile($file, $path): string {
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path($path), $filename);
        return $filename;
    }

    private static function deleteFileIfExists($path): void {
        if (file_exists($path) && is_file($path)) {
            unlink($path);
        }
    }
}
