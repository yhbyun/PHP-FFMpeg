<?php

namespace FFMpeg\Filters\Video;

use FFMpeg\Format\VideoInterface;
use FFMpeg\Media\Video;

/**
 * Add custom Pixel Format
 * https://github.com/remiheens/PHP-FFmpeg/commit/16636f3392e843bc31df1e8d39062b282e28816e
 */

class PixelFormatFilter implements VideoFilterInterface
{
    private $priority;
    private $pixel_format;

    public function __construct($pixel_format = 'yuv444p', $priority = 12)
    {
        $this->priority = $priority;

        $this->pixel_format = $pixel_format;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getPixelFormat()
    {
        return $this->pixel_format;
    }

    public function apply(Video $video, VideoInterface $format)
    {
        return array('-pix_fmt', $this->pixel_format);
    }
}
