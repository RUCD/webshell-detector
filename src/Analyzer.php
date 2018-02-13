<?php
/**
 * File Analyzer
 *
 * @file     Analyzer
 * @category None
 * @package  Source
 * @author   Thibault Debatty <thibault.debatty@gmail.com>
 * @license  https://raw.githubusercontent.com/RUCD/webshell-detector/master/LICENSE Webshell-detector
 * @link     https://github.com/RUCD/webshell-detector
 */
namespace RUCD\WebshellDetector;
/**
 * Interface Analyzer. Defines the main behavior of all analyzers
 *
 * @file     Analyzer
 * @category None
 * @package  Source
 * @author   Thibault Debatty <thibault.debatty@gmail.com>
 * @license  https://raw.githubusercontent.com/RUCD/webshell-detector/master/LICENSE Webshell-detector
 * @link     https://github.com/RUCD/webshell-detector
 */
interface Analyzer
{
    const EXIT_ERROR = -1;
    
    /**
     * Analyze a string and return a score between 0 (harmless) and 1 (highly suspicious).
     *
     * @param string $filecontent The contenet of the file to analyze
     * 
     * @return mixed The value returned by the implementation of the routine
     */
    public function analyze($filecontent);
}
