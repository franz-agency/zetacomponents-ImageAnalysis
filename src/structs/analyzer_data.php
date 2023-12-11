<?php
/**
 * File containing the ezcImageAnalyzerData struct.
 *
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 * 
 *   http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
 * @package ImageAnalysis
 * @version //autogentag//
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @filesource
 */

/**
 * Struct to store the data retrieved from an image analysis.
 *
 * This class is used as a struct for the data retrieved from 
 * an {@link ezcImageAnalyzerHandler}. It stores various information about
 * an analyzed image and pre-fills it's attributes with sensible default
 * values, to make the usage as easy as possible.
 *
 * Ths struct class should not be accessed directly (except form 
 * {@link ezcImageAnalyzerHandler} classes, where it is created). From a 
 * users view it is transparently accessable through
 * {@link ezcImageAnalyzer::$data}, more specific using
 * <code>
 * $analyzer = new ezcImageAnalyzer( 'myfile.jpg' );
 * echo $analyzer->data->size;
 * </code>
 *
 * @see ezcImageAnalyzer
 * @see ezcImageAnalyzerHandler
 *
 * @package ImageAnalysis
 * @version //autogentag//
 */
class ezcImageAnalyzerData extends ezcBaseStruct
{
    /**
     * Create a new instance of ezcImageAnalyzerData.
     *
     * Create a new instance of ezcImageAnalyzerData to be used with
     * {@link ezcImageAnalyzer} objects.
     *
     * @see ezcImageAnalyzer::analyzeImage()
     * @see ezcImageAnalyzerHandler::analyzeImage()
     *
     * @param string $mime {@link ezcImageAnalyzerData::$mime}
     * @param array $exif {@link ezcImageAnalyzerData::$exif}
     * @param int $width {@link ezcImageAnalyzerData::$width}
     * @param int $height {@link ezcImageAnalyzerData::$height}
     * @param int $size {@link ezcImageAnalyzerData::$size}
     * @param int $mode {@link ezcImageAnalyzerData::$mode}
     * @param int $transparencyType {@link ezcImageAnalyzerData::$transparencyType}
     * @param bool $isColor {@link ezcImageAnalyzerData::$isColor}
     * @param int $colorCount {@link ezcImageAnalyzerData::$colorCount}
     * @param string $comment {@link ezcImageAnalyzerData::$comment}
     * @param array $commentList {@link ezcImageAnalyzerData::$commentList}
     * @param string $copyright {@link ezcImageAnalyzerData::$copyright}
     * @param int $date {@link ezcImageAnalyzerData::$date}
     * @param bool $hasThumbnail {@link ezcImageAnalyzerData::$hasThumbnail}
     * @param bool $isAnimated {@link ezcImageAnalyzerData::$isAnimated}
     */
    public function __construct(
        /**
         * Detected MIME type for the image.
         *
         */
        public $mime = null,
        /**
         * EXIF information retrieved from image.
         *
         * This will only be filled in for images which supports EXIF entries,
         * currently they are:
         * - image/jpeg
         * - image/tiff
         *
         * @link http://php.net/manual/en/function.exif-read-data.php
         *
         */
        public $exif = [],
        /**
         * Width of image in pixels.
         *
         */
        public $width = 0,
        /**
         * Height of image in pixels.
         *
         */
        public $height = 0,
        /**
         * Size of image file in bytes.
         *
         */
        public $size = 0,
        /**
         * The image mode.
         *
         * Can be one of:
         * - ezcImageAnalyzerHandler::MODE_INDEXED   - Image is built with a palette and consists of
         *                          indexed values per pixel.
         * - ezcImageAnalyzerHandler::MODE_TRUECOLOR - Image consists of RGB value per pixel.
         *
         */
        public $mode = ezcImageAnalyzerHandler::MODE_TRUECOLOR,
        /**
         * Type of transparency in image.
         *
         * Can be one of:
         * - ezcImageAnalyzerHandler::TRANSPARENCY_OPAQUE      - No parts of image is transparent.
         * - ezcImageAnalyzerHandler::TRANSPARENCY_TRANSPARENT - Selected palette entries are
         *                                    completely see-through.
         * - ezcImageAnalyzerHandler::TRANSPARENCY_TRANSLUCENT - Transparency determined pixel per
         *                                    pixel with a fuzzy value.
         *
         */
        public $transparencyType = null,
        /**
         * Does the image have colors?
         *
         */
        public $isColor = true,
        /**
         * Number of colors in image.
         *
         */
        public $colorCount = 0,
        /**
         * First inline comment for the image.
         *
         */
        public $comment = null,
        /**
         * List of inline comments for the image.
         *
         */
        public $commentList = [],
        /**
         * Copyright text for the image.
         *
         */
        public $copyright = null,
        /**
         * The date when the picture was taken as UNIX timestamp.
         *
         */
        public $date = null,
        /**
         * Does the image have a thumbnail?
         *
         */
        public $hasThumbnail = false,
        /**
         * Is the image animated?
         *
         */
        public $isAnimated = false
    )
    {
    }
}
?>
