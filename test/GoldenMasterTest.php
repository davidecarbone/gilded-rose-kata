<?php

// This is the Golden Master Runner
// The first time it runs it will create a file under ./test/support named GOLDEN_MASTER
// The following runs it will use the content of that file to check if the behaviour of the code didn't change
// If you deliberately change the behaviour of the code then you can regenerate the GOLDEN_MASTER by deleting the file ./test/support/GOLDEN_MASTER

class GoldenMasterTest extends PHPUnit\Framework\TestCase {
    function testGoldenMaster() {
        global $argv;
        $daysToRun = 30;
        $scriptToRun = __DIR__ . '/../bin/fixture.php';
        $argv = [$scriptToRun, $daysToRun];

        ob_start();
        include $scriptToRun;
        $output = ob_get_clean();
        $this->assertGreaterThan(0, strlen($output), 'Seems like the run of golden master produced an empty output');

        $goldenMasterFile = __DIR__ . '/support/GOLDEN_MASTER';
        if (!file_exists($goldenMasterFile)) {
            file_put_contents($goldenMasterFile, $output);
        }

        $goldenMasterFileContent = file_get_contents($goldenMasterFile);
        $this->assertEquals($goldenMasterFileContent, $output);
    }
}
