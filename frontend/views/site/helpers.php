<?php

function determineContentType($file_path)
{
    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    if (in_array($extension, ['mp3', 'wav', 'ogg'])) {
        return 'audio';
    } elseif (in_array($extension, ['mp4', 'avi', 'mov'])) {
        return 'video';
    } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        return 'image';
    } else {
        return 'unknown';
    }
}
?>