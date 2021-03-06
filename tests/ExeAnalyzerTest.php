<?php
/**
 * File ExeAnalyzerTest
 *
 * @file     ExeAnalyzerTest
 * @category None
 * @package  Tests
 * @author   Enzo Borel <borelenzo@gmail.com>
 * @license  https://github.com/RUCD/webshell-detector/blob/master/LICENSE MIT
 * @link     https://github.com/RUCD/webshell-detector
 */
namespace RUCD\WebshellDetector;

use PHPUnit\Framework\TestCase;
/**
 * Class ExeAnalyzerTest extending TestCase. Performs tests on the class ExeAnalyzer
 *
 * @file     ExeAnalyzerTest
 * @category None
 * @package  Tests
 * @author   Enzo Borel <borelenzo@gmail.com>
 * @license  https://github.com/RUCD/webshell-detector/blob/master/LICENSE MIT
 * @link     https://github.com/RUCD/webshell-detector
 */
class ExeAnalyzerTest extends TestCase
{

    /**
     * Performs test on a the object ExeAnalyzer
     *
     * @param string $directory Name of the directory, by default __DIR__/res/
     *
     * @return void
     */
    public function testExeAnalyzer(
        $directory = __DIR__ . "/res/php-webshells-master/"
    ) {
        $analyzer = new ExeAnalyzer();
        $files = scandir($directory);
        $dirs = [];
        echo PHP_EOL."Scanning $directory";
        foreach ($files as $file) {
            if ($file === "." || $file === "..") {
                continue;
            }
            if (is_dir($directory.$file)) {
                array_push($dirs, $directory.$file.'/');
            } elseif (preg_match('/\.php$/', $file)) {
                $result = $analyzer->analyze(file_get_contents($directory.$file));
                if ($result != 0) {
                    echo PHP_EOL."Score: $result File: $file";
                }
                $this->assertTrue(
                    $result >= 0 && $result <= 1,
                    "Result should be between 0 and 1"
                );
            }
        }
        foreach ($dirs as $dir) {
            $this->testExeAnalyzer($dir);
        }
    }
}
