<?php

namespace Tests\Unit;

use Tests\TestCase;

class OSTAuthorizationTest extends TestCase
{

    public function testOSTRootPath()
    {
        $root = config('eqp.ost_root');
        $this->assertNotNull($root);
        $this->assertTrue(file_exists($root));
    }

    public function testOSTIncludePath()
    {
        $path = config('eqp.ost_root').'/include';
        $this->assertTrue(file_exists($path));
    }

    public function testStaffClassFileExists()
    {
        $path = config('eqp.ost_root').'/include/class.staff.php';
        $this->assertTrue(file_exists($path));

        $bootstrap = config('eqp.ost_root').'/bootstrap.php';
        $this->assertTrue(file_exists($bootstrap));

        require_once($bootstrap);

        global $ost;
        print_r($ost);
    }
}
