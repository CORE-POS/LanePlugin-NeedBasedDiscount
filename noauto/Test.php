<?php

use COREPOS\pos\lib\FormLib;

class Test extends PHPUnit_Framework_TestCase
{
    public function testPlugin()
    {
        $obj = new NeedBasedDiscount();
        $obj->plugin_transaction_reset();
    }

    public function testParser()
    {
        $p = new NeedDiscountParser();
        $this->assertEquals(false, $p->check('foo'));
        $this->assertEquals(true, $p->check('FF'));

        $json = $p->parse('FF');
        CoreLocal::set('isMember', 1);
        $json = $p->parse('FF');
        CoreLocal::set('NeedDiscountFlag', 1);
    }

    public function testFooter()
    {
        $f = new NeedDiscountFooter();
        $f->header_content();
        $f->display_content();
    }
}

