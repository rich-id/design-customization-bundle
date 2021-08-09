<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Model;

use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Model\Font;
use RichId\DesignCustomizationBundle\Domain\Model\FontInterface;

/** @covers \RichId\DesignCustomizationBundle\Domain\Model\Font */
final class FontTest extends TestCase
{
    public function testModel(): void
    {
        $model = new Font();
        $model->setFamily('my_font_family');
        $model->setUrl('my_url');

        $this->assertInstanceOf(FontInterface::class, $model);
        $this->assertSame('my_font_family', $model->getFamily());
        $this->assertSame('my_url', $model->getUrl());
    }
}
