<?php
/**
 * File containing the ezcImageAnalyzerHandler class.
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
 * This base class has to be extended by all ezcImageAnalyzerHandler classes.
 * An object of an ezcImageAnalyzerHandler class must implement this interface
 * to work properly as a handler for ezcImageAnalyzer.
 *
 * @package ImageAnalysis
 * @version //autogentag//
 */
abstract class ezcImageAnalyzerHandler
{
    /**
     * Image is built with a palette and consists of indexed values per pixel.
     */
    public const MODE_INDEXED = 1;

    /**
     * Image consists of RGB value per pixel.
     */
    public const MODE_TRUECOLOR = 2;

    /**
     * No parts of image is transparent.
     */
    public const TRANSPARENCY_OPAQUE = 1;

    /*
     * Selected palette entries are completely see-through.
     */
    public const TRANSPARENCY_TRANSPARENT = 2;

    /**
     * Transparency determined pixel per pixel with a fuzzy value.
     */
    public const TRANSPARENCY_TRANSLUCENT = 3;

    /**
     * Options for the handler.
     *
     * Usually this is empty, but some handlers need special options
     * e.g. {@link ezcImageAnalyzerImagemagickHandler}.
     *
     * @var array(string=>mixed)
     */
    protected $options = [];

    /**
     * Create an ezcImageAnalyzerHandler to analyze a file.
     *
     * The constructor can optionally receive an array of options. Which
     * options are utilized by the handler depends on it's implementation.
     * To determine this, please refer to the specific handler.
     *
     * @throws ezcImageAnalyzerException
     *         If the handler is not able to work.
     * @param array $options Possible options for the handler.
     */
    public function __construct( array $options = [] )
    {
        $this->options = $options;
    }

    /**
     * Checks wether the given handler is available for analyzing images.
     *
     * Each ezcImageAnalyzerHandler must implement this method in order to
     * check if the handler is available on the system. The method has to
     * return true, if the handle is currently available to analyze images
     * (e.g. if the GD extension is available, for the
     * {@link ezcImageAnalyzerPhpHandler}).
     *
     * @return bool True if the handler is available.
     */
    abstract public function isAvailable();

    /**
     * Analyzes the image type.
     *
     * This method analyzes image data to determine the MIME type. Each
     * ezcImageAnalyzerHandler must at least be capable of performing this
     * operation on a file. This method has to return the MIME type of the
     * file to analyze in lowercase letters (e.g. "image/jpeg") or false, if
     * the images MIME type could not be determined.
     *
     * @param string $file The file to analyze.
     * @return string|bool The MIME type if analyzation suceeded or false.
     */
    abstract public function analyzeType( $file );

    /**
     * Analyze the image for detailed information.
     *
     * This may return various information about the image, depending on it's
     * type and the implemented facilities of the handler. All information is
     * collected in the struct {@link ezcImageAnalyzerData}. Which information
     * is set about an image in the returned data struct, depends on the image
     * type and the capabilities of the handler. At least the
     * {@link ezcImageAnalyzerData::$mime} attribute must be set. Most handlers
     * also provide additional information like the image dimensions and the size
     * of the image file.
     *
     * @throws ezcImageAnalyzerFileNotProcessableException
     *         If image file can not be processed.
     * @param string $file The file to analyze.
     * @return ezcImageAnalyzerData
     */
    abstract public function analyzeImage( $file );

    /**
     * Returns if the handler can analyze a given MIME type.
     *
     * This method returns if the driver is capable of analyzing a given MIME
     * type. This method should be called before trying to actually analyze an
     * image using the drivers {@link self::analyzeImage()} method.
     *
     * @param string $mime The MIME type to check for.
     * @return bool True if the handler is able to analyze the MIME type.
     */
    abstract public function canAnalyze( $mime );
}
?>
