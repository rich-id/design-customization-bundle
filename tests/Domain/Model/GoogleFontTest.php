<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Model;

use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;
use RichId\DesignCustomizationBundle\Domain\Model\FontInterface;

/** @covers \RichId\DesignCustomizationBundle\Domain\Model\GoogleFont */
final class GoogleFontTest extends TestCase
{
    public function testModel(): void
    {
        $model = new GoogleFont();
        $model->setFamily('my_font_family');

        $this->assertInstanceOf(FontInterface::class, $model);
        $this->assertSame('my_font_family', $model->getFamily());
    }
}
